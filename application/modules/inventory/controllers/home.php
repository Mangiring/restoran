<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> model('inventory_model');
	}

	function index() {
		$pager = $this -> pagination_lib -> pagination($this -> inventory_model -> __get_inventory(),3,10,site_url('inventory'));
		$view['inventory'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$this->load->view('inventory', $view);
	}
}
