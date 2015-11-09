<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('report_transaction_model');
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
		$view['transaction'] = $this -> report_transaction_model -> __get_transaction($from,$to);
		$view['from'] = $from;
		$view['to'] = $to;
		$this->load->view('report_transaction', $view);
	}
	
	function cleanup() {
		$this -> report_transaction_model -> __clean_transaction();
		redirect(site_url('report_transaction'));
	}
	
	function export($type) {
		if ($type == 'excel') {
			ini_set('memory_limit', '-1');
			$sort = array($this -> input -> get('from'),$this -> input -> get('to'));
			if ($sort) {
				$from = date('Y-m-d',strtotime(str_replace('/','-',$sort[0])));
				$to = date('Y-m-d',strtotime(str_replace('/','-',$sort[1])));
				
				$this -> load -> library('excel');
				$data = $this -> report_transaction_model -> __get_transaction($from,$to);
				
				$arr = array();
				$tgl = '';
				$ntgl = '';
				$total = 0;
				$total2 = 0;
				$totalperson = 0;
				
				foreach($data as $K => $v) {
					$date = date('Y-m-d',strtotime($v -> wdate));
					if($tgl <> $date){
						$tgl = $date;
						$ntgl = __get_date(strtotime($tgl),1);
					}
					else $ntgl = '';
					$arr[] = array($ntgl,date('H:i',strtotime($v -> wdate)), $v -> tname, $v -> wname, $v -> person, $v -> wtotal, $v -> wtotalall,($v -> wstatus == 2 ? 'Cancel' : 'Approved'));
				
					$totalperson += $v -> person;
					$total += $v -> wtotal;
					$total2 += $v -> wtotalall;
				}
				$arr[] = array('','', '', 'Total', $totalperson, $total, $total2,'');
				
				$data = array('header' => array('Date', 'Time', 'Table','Customer Name','Person','Bruto','Netto','Status'), 'data' => $arr);

				$this -> excel -> sEncoding = 'UTF-8';
				$this -> excel -> bConvertTypes = false;
				$this -> excel -> sWorksheetTitle = 'Laporan Transaction Ayam Goreng / Bakar Presto Periode '.$from.' - ' . $to;
				
				$this -> excel -> addArray($data);
				$this -> excel -> generateXML('report_transaction'.$from.'_' . $to);
			}
		}
	}
}
