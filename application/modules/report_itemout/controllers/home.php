<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> model('reportitemout_model');
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
		
		$view['report_itemout'] = $this -> reportitemout_model -> __get_reportitemout($from,$to);
		$view['from'] = $from;
		$view['to'] = $to;
		$this->load->view('report_itemout', $view);
	}
	
	function cleanup() {
		$this -> reportitemout_model -> __clean_itemout();
		redirect(site_url('report_itemout'));
	}
}
