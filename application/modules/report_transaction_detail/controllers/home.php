<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('report_transaction_detail_model');
	}

	function index($wid) {
		$from = date('Y-m-d', strtotime('-1 month'));
		$to = date('Y-m-d');
		
		if ($_POST) {
			$sort = $this -> input -> post('sort');
			if ($sort) {
				$sort = explode('/',$sort);
				$from = date('Y-m-d',strtotime($sort[0]));
				$to = date('Y-m-d',strtotime($sort[1]));
			}
		}
		$view['transaction'] = $this -> report_transaction_detail_model -> __get_transaction_detail($wid);
		$view['wid'] = $wid;
		$this->load->view('report_transaction_detail', $view);
	}
}
