<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> model('reportopname_model');
	}

	function index() {
		$view['report_opname'] = array();
		$from = '';
		$to = '';
		
		if ($_POST) {
			$sort = $this -> input -> post('sort');
			if ($sort) {
				$sort = explode(' - ',$sort);
				$from = date('Y-m-d',strtotime(str_replace('/','-',$sort[0])));
				$to = date('Y-m-d',strtotime(str_replace('/','-',$sort[1])));
			}
			$view['report_opname'] = $this -> reportopname_model -> __get_reportopname($from,$to);
		}
		
		$view['from'] = $from;
		$view['to'] = $to;
		$this->load->view('report_opname', $view);
	}
	
	function cleanup() {
		$this -> reportopname_model -> __clean_opname();
		redirect(site_url('report_opname'));
	}
	
	function export($type) {
		if ($type == 'excel') {
			ini_set('memory_limit', '-1');
			$sort = array($this -> input -> get('from'),$this -> input -> get('to'));
			if ($sort) {
				$from = date('Y-m-d',strtotime(str_replace('/','-',$sort[0])));
				$to = date('Y-m-d',strtotime(str_replace('/','-',$sort[1])));
				
				$this -> load -> library('excel');
				$data = $this -> reportopname_model -> __get_reportopname($from,$to);
				$arr = array();
				$tgl = '';
				$ntgl = '';
				foreach($data as $K => $v) {
					$date = date('Y-m-d',$v -> odate);
					if($tgl <> $date){
						$tgl = $date;
						$ntgl = __get_date(strtotime($tgl),1);
					}
					else $ntgl = '';
					$arr[] = array($ntgl,date('H:i',$v -> odate),$v -> rname,$v -> ostockbegining,$v -> ostockin,$v -> ostockout,$v -> ostock,$v -> oadjustmin,$v -> oadjustplus,$v -> odesc);
				}
				
				$data = array('header' => array('Date', 'Time', 'Raw Material','Stock Begining','Stock In','Stock Out','Stock Final','Adjust (-)','Adjust (+)','Description'), 'data' => $arr);

				$this -> excel -> sEncoding = 'UTF-8';
				$this -> excel -> bConvertTypes = false;
				$this -> excel -> sWorksheetTitle = 'Laporan Opname Ayam Goreng / Bakar Presto';
				
				$this -> excel -> addArray($data);
				$this -> excel -> generateXML('report_opname'.$from.'_' . $to);
			}
		}
	}
}
