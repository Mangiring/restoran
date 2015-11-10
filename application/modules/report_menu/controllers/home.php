<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> model('reportmenu_model');
	}

	function index() {
		$view['category'] = array();
		$from = '';
		$to = '';
		
		if ($_POST) {
			$sort = $this -> input -> post('sort');
			if ($sort) {
				$sort = explode(' - ',$sort);
				$from = date('Y-m-d',strtotime(str_replace('/','-',$sort[0])));
				$to = date('Y-m-d',strtotime(str_replace('/','-',$sort[1])));
			}
			$view['category'] = $this -> reportmenu_model -> __get_category_menu();
		}
		
		$view['from'] = $from;
		$view['to'] = $to;
		$this->load->view('report_menu', $view);
	}
	
	function export($type) {
		if ($type == 'excel') {
			ini_set('memory_limit', '-1');
			$sort = array($this -> input -> get('from'),$this -> input -> get('to'));
			if ($sort) {
				$from = date('Y-m-d',strtotime(str_replace('/','-',$sort[0])));
				$to = date('Y-m-d',strtotime(str_replace('/','-',$sort[1])));
				
				$this -> load -> library('excel');
				$data = $this -> reportmenu_model -> __get_category_menu();
				
				$dsc = 0;
				$rtotal = 0;
				$arr = array();
				$menus = array();				
				foreach($data as $K => $v) {
					$arr[] = array($v -> cname,'','','','');
					$arr[] = array('','','','','');
					$arr[] = array('Name','Harga','Discount','Description','Total');
					$menus = $this -> reportmenu_model -> __get_menu($v -> cid);
					foreach($menus as $k1 => $v1) {
						$total = $this -> reportmenu_model -> __get_total_report_menu($v1 -> mid,$from,$to);
						if ($total[0] -> totalmenu > 0) {
							$arr[] = array($v1 -> mname, $v1 -> mharga, $v1 -> mdisc, $v1 -> mdesc, $total[0] -> totalmenu);
							
							$dsc = ($v1 -> mharga * $v1 -> mdisc) / 100;
							$htotal += ($v1 -> mharga - $dsc) * $total[0] -> totalmenu;
							$rtotal += $total[0] -> totalmenu;
						}
					}
					$arr[] = array('Total',$htotal,'','',$rtotal);
					$arr[] = array('','','','','');
				}
				$data = array('header' => false, 'data' => $arr);

				$this -> excel -> sEncoding = 'UTF-8';
				$this -> excel -> bConvertTypes = false;
				$this -> excel -> sWorksheetTitle = 'Laporan Menu Keluar Ayam Goreng / Bakar Presto';
				
				$this -> excel -> addArray($data);
				$this -> excel -> generateXML('report_menu_'.$from.'_' . $to);
			}
		}
	}
}
