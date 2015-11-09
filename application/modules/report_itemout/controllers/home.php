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
	
	function export($type) {
		if ($type == 'excel') {
			ini_set('memory_limit', '-1');
			$sort = array($this -> input -> get('from'),$this -> input -> get('to'));
			if ($sort) {
				$from = date('Y-m-d',strtotime(str_replace('/','-',$sort[0])));
				$to = date('Y-m-d',strtotime(str_replace('/','-',$sort[1])));
				
				$this -> load -> library('excel');
				$data = $this -> reportitemout_model -> __get_reportitemout($from,$to);
				$arr = array();
				
				$tgl = '';
				$ntgl = '';
				foreach($data as $K => $v) {
					$date = date('Y-m-d',$v -> idate);
					if($tgl <> $date){
						$tgl = $date;
						$ntgl = __get_date(strtotime($tgl),1);
					}
					else $ntgl = '';
					$arr[] = array($ntgl,date('H:i',$v -> idate),$v -> rname,$v -> istockout,$v -> istock,$v -> iadjust,$v -> idesc);
				}
				
				$data = array('header' => array('Date', 'Time', 'Raw Material','Stock Out','Stock Final','Material Left','Description'), 'data' => $arr);

				$this -> excel -> sEncoding = 'UTF-8';
				$this -> excel -> bConvertTypes = false;
				$this -> excel -> sWorksheetTitle = 'Laporan Item Out Ayam Goreng / Bakar Presto';
				
				$this -> excel -> addArray($data);
				$this -> excel -> generateXML('report_itemout_'.$from.'_' . $to);
			}
		}
	}
}
