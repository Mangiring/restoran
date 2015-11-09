<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function __get_date($str, $type=1) {
	if (!$str) return '-';
	if ($type == 1) return date('d/m/Y', $str);
	elseif ($type == 2) return date('d', $str).' '.__get_month(date('m',$str)).' '.date('Y',$str);
	elseif ($type == 3) return date('d/m/Y H:i', $str);
	else return date('d ').__get_month(date('m',$str)).date(' Y H:i',$str);
}

function __get_month($id) {
	$id = (int) $id;
	$month = array('Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	return $month[($id + 1)];
}
