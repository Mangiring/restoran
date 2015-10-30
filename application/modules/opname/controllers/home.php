<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> model('opname_model');
	}

	function index() {
		$pager = $this -> pagination_lib -> pagination($this -> opname_model -> __get_inventory(),3,10,site_url('opname'));
		$view['opname'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$this->load->view('opname', $view);
	}
	
	function opname_adjust($id) {
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
				redirect(site_url('opname/opname_adjust/' . $id));
			}
			else if (!$amin && !$aplus) {
				__set_error_msg(array('error' => 'Adjust min dan plus salah satu harus di isi !!!'));
				redirect(site_url('opname/opname_adjust/' . $id));
			}
			else if (!$desc) {
				__set_error_msg(array('error' => 'Keterangan harus di isi !!!'));
				redirect(site_url('opname/opname_adjust/' . $id));
			}
			else {
				if ($aplus) $sfinal = $sfinal2 + $aplus;
				else $sfinal = $sfinal2 - $amin;
				
				$arr = array('istock' => $sfinal);
				if ($this -> opname_model -> __update_inventory($id, $arr)) {
					$oarr = array('oidid' => $id, 'odate' => time(), 'ostockbegining' => $sbegin2, 'ostockin' => $sin2, 'ostockout' => $sout2, 'ostockretur' => $sretur2, 'ostock' => $sfinal2, 'oadjustmin' => $amin, 'oadjustplus' => $aplus, 'odesc' => $desc);
					$this -> opname_model -> __insert_opname($oarr);
					
					__set_error_msg(array('info' => 'Stock berhasil diubah.'));
					redirect(site_url('opname'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal mengubah stock !!!'));
					redirect(site_url('opname'));
				}
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> opname_model -> __get_inventory_detail($id);
			$this->load->view('opname_adjust', $view);
		}
	}
}
