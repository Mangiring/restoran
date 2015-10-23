<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> model('peti_cash_model');
	}

	function index() {
		$pager = $this -> pagination_lib -> pagination($this -> peti_cash_model -> __get_peti_cash(),3,10,site_url('peti_cash'));
		$view['peti_cash'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$this->load->view('peti_cash', $view);
	}
	
	function peti_cash_add() {
		if ($_POST) {
			$nominal = $this -> input -> post('nominal', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$type = (int) $this -> input -> post('type');
			
			if (!$nominal || !$desc || !$type) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('peti_cash' . '/' . __FUNCTION__));
			}
			else {
				$csaldo = $this -> peti_cash_model -> __get_current_saldo(date('m'), date('Y'));
				if ($type == 1) $saldo = $csaldo[0] -> psaldo + $nominal;
				else $saldo = $csaldo[0] -> psaldo - $nominal;
				
				$arr = array('pdate' => time(), 'ptype' => $type, 'pdesc' => $desc, 'pnominal' => $nominal, 'psaldo' => $saldo, 'pstatus' => 1);
				if ($this -> peti_cash_model -> __insert_peti_cash($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('peti_cash'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('peti_cash'));
				}
			}
		}
		else {
			$this->load->view(__FUNCTION__, '');
		}
	}
}
