<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('report_peti_cash_model');
	}

	function index() {
		$from = date('Y-m-d', strtotime('-1 month'));
		$to = date('Y-m-d');
		
		if ($_POST) {
			$sort = $this -> input -> post('sort');
			if ($sort) {
				$sort = explode(' - ',$sort);
				$from = date('Y-m-d',strtotime(str_replace('/','-',$sort[0])));
				$to = date('Y-m-d',strtotime(str_replace('/','-',$sort[1])));
			}
		}
		
		$view['peti_cash'] = $this -> report_peti_cash_model -> __get_peti_cash($from,$to);
		$view['kasbesar'] = $this -> report_peti_cash_model -> get_kas_besar($from,$to);
		$view['kaskecil'] = $this -> report_peti_cash_model -> get_kas_kecil($from,$to);
		$view['operasional'] = $this -> report_peti_cash_model -> get_biaya_semua($from,$to);
		$view['from'] = $from;
		$view['to'] = $to;
		$this->load->view('report_peti_cash', $view);
	}
	
	function cleanup() {
		$this -> report_peti_cash_model -> __clean_peti_cash();
		redirect(site_url('report_peti_cash'));
	}
}
