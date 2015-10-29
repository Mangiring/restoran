<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('home_model');
	}

	function index() {
		$view['menus'] = $this -> home_model -> __get_recent_menus();
		$view['transaction'] = $this -> home_model -> __get_recent_transaction();
		$view['totalmenu'] = $this -> home_model -> __get_total(1);
		$view['totalbilling'] = $this -> home_model -> __get_total(2);
		$view['totalwislist'] = $this -> home_model -> __get_total(3);
		$view['totalstock'] = $this -> home_model -> __get_total(4);
		$this->load->view('index', $view);
	}
}
