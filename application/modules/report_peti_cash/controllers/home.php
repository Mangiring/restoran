<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('report_peti_cash_model');
	}

	function index() {
		$bulan = date('m');
		$tahun = date('Y');
		if ($_POST) {
			$sort = $this -> input -> post('sort');
			if ($sort) {
				$sort = explode('/',$sort);
				$bulan = $sort[0];
				$tahun = $sort[1];
			}
		}
		$view['peti_cash'] = $this -> report_peti_cash_model -> __get_peti_cash($bulan,$tahun);
		$view['kasbesar'] = $this -> report_peti_cash_model -> get_kas_besar($bulan,$tahun);
		$view['kaskecil'] = $this -> report_peti_cash_model -> get_kas_kecil($bulan,$tahun);
		$view['operasional'] = $this -> report_peti_cash_model -> get_biaya_semua($bulan,$tahun);
		$view['bulan'] = $bulan;
		$view['tahun'] = $tahun;
		$this->load->view('report_peti_cash', $view);
	}
}
