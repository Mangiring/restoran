<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('report_peti_cash_model');
	}

	function index() {
		$view['peti_cash'] = array();
		$view['kasbesar'] = array();
		$view['kaskecil'] = array();
		$view['operasional'] = array();
		$from = '';
		$to = '';
		
		if ($_POST) {
			$sort = $this -> input -> post('sort');
			if ($sort) {
				$sort = explode(' - ',$sort);
				$from = date('Y-m-d',strtotime(str_replace('/','-',$sort[0])));
				$to = date('Y-m-d',strtotime(str_replace('/','-',$sort[1])));
			}
			$view['peti_cash'] = $this -> report_peti_cash_model -> __get_peti_cash($from,$to);
			$view['kasbesar'] = $this -> report_peti_cash_model -> get_kas_besar($from,$to);
			$view['kaskecil'] = $this -> report_peti_cash_model -> get_kas_kecil($from,$to);
			$view['operasional'] = $this -> report_peti_cash_model -> get_biaya_semua($from,$to);
		}
		
		$view['from'] = $from;
		$view['to'] = $to;
		$this->load->view('report_peti_cash', $view);
	}
	
	function cleanup() {
		$this -> report_peti_cash_model -> __clean_peti_cash();
		redirect(site_url('report_peti_cash'));
	}
	
	function export($type) {
		if ($type == 'excel') {
			ini_set('memory_limit', '-1');
			$sort = array($this -> input -> get('from'),$this -> input -> get('to'));
			if ($sort) {
				$from = date('Y-m-d',strtotime(str_replace('/','-',$sort[0])));
				$to = date('Y-m-d',strtotime(str_replace('/','-',$sort[1])));
				
				$this -> load -> library('excel');
				$data = $this -> report_peti_cash_model -> __get_peti_cash($from,$to);
				$kasbesar = $this -> report_peti_cash_model -> get_kas_besar($from,$to);
				$kaskecil = $this -> report_peti_cash_model -> get_kas_kecil($from,$to);
				$operasional = $this -> report_peti_cash_model -> get_biaya_semua($from,$to);
				
				$arr = array();
				$tgl = '';
				$ntgl = '';
				foreach($data as $K => $v) {
					$date = date('Y-m-d',$v -> pdate);
					if($tgl <> $date){
						$tgl = $date;
						$ntgl = __get_date(strtotime($tgl),1);
					}
					else $ntgl = '';
					$arr[] = array($ntgl,date('H:i',$v -> pdate), $v -> pdesc, ($v -> ptype == 1 ? $v -> pnominal : '-'), ($v -> ptype != 1 ? $v -> pnominal : '-'), $v -> psaldo);
				}
				$arr[] = array('','', 'Kas Besar:', '', '', $kasbesar[0] -> total);
				$arr[] = array('','', 'Kas Kecil:', '', '', $kaskecil[0] -> total);
				$arr[] = array('','', 'Biaya Operasional:', '', '', $operasional[0] -> total);
				
				$data = array('header' => array('Date', 'Time', 'Description','Debit','Credit','Balance'), 'data' => $arr);

				$this -> excel -> sEncoding = 'UTF-8';
				$this -> excel -> bConvertTypes = false;
				$this -> excel -> sWorksheetTitle = 'Laporan Peti Cash Ayam Goreng / Bakar Presto Periode '.$from.' - ' . $to;
				
				$this -> excel -> addArray($data);
				$this -> excel -> generateXML('report_peticash'.$from.'_' . $to);
			}
		}
	}
}
