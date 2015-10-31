<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> model('itemout_model');
	}

	function index() {
		$pager = $this -> pagination_lib -> pagination($this -> itemout_model -> __get_inventory(),3,10,site_url('itemout'));
		$view['itemout'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$this->load->view('itemout', $view);
	}
	
	function itemout_adjust($id) {
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$amin = (int) $this -> input -> post('amin');
			$aplus = (int) $this -> input -> post('aplus');
			$desc = $this -> input -> post('desc');
			
			$sbegin2 = (int) $this -> input -> post('sbegin2');
			$sin2 = (int) $this -> input -> post('sin2');
			$sout2 = (int) $this -> input -> post('sout2');
			$sfinal2 = (int) $this -> input -> post('sfinal2');
			$sretur2 = (int) $this -> input -> post('sretur2');
			
			if ($aplus && $amin) {
				__set_error_msg(array('error' => 'Adjust min dan plus salah satu harus di isi !!!'));
				redirect(site_url('itemout/itemout_adjust/' . $id));
			}
			else if (!$amin && !$aplus) {
				__set_error_msg(array('error' => 'Adjust min dan plus salah satu harus di isi !!!'));
				redirect(site_url('itemout/itemout_adjust/' . $id));
			}
			else if (!$desc) {
				__set_error_msg(array('error' => 'Keterangan harus di isi !!!'));
				redirect(site_url('itemout/itemout_adjust/' . $id));
			}
			else {
				if ($aplus) $sfinal = $sfinal2 + $aplus;
				else $sfinal = $sfinal2 - $amin;
				
				$arr = array('istockout' => $sout2 + $amin,'istock' => $sfinal);
				if ($this -> itemout_model -> __update_inventory($id, $arr)) {
					$oarr = array('iidid' => $id, 'idate' => time(), 'istockbegining' => $sbegin2, 'istockin' => $sin2, 'istockout' => $sout2, 'istockretur' => $sretur2, 'istock' => $sfinal2, 'iadjust' => $amin, 'idesc' => $desc);
					$this -> itemout_model -> __insert_itemout($oarr);
					
					__set_error_msg(array('info' => 'Stock berhasil diubah.'));
					redirect(site_url('itemout'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal mengubah stock !!!'));
					redirect(site_url('itemout'));
				}
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> itemout_model -> __get_inventory_detail($id);
			$this->load->view('itemout_adjust', $view);
		}
	}
}
