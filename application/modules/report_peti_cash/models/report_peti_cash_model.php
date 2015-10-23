<?php
class Report_peti_cash_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_peti_cash($bulan,$tahun) {
		$this -> db -> select("* FROM peticash_tab WHERE pstatus=1 AND MONTH(FROM_UNIXTIME( pdate,  '%Y-%m-%d' ))=".$bulan." AND YEAR(FROM_UNIXTIME( pdate,  '%Y-%m-%d' ))=".$tahun." ORDER BY pid DESC", FALSE);
		return $this -> db -> get() -> result();
	}
	function get_kas_besar($bulan,$tahun) {
		$this -> db -> select("sum(pnominal) as total from peticash_tab where pstatus=1 AND ptype=1 and MONTH(FROM_UNIXTIME( pdate,  '%Y-%m-%d' ))=".$bulan." and YEAR(FROM_UNIXTIME( pdate,  '%Y-%m-%d' ))=".$tahun, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function get_kas_kecil($bulan,$tahun) {
		$this -> db -> select("psaldo as total FROM `peticash_tab` where pstatus=1 AND MONTH(FROM_UNIXTIME( pdate,  '%Y-%m-%d' ))=".$bulan." and YEAR(FROM_UNIXTIME( pdate,  '%Y-%m-%d' ))=".$tahun, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function get_biaya_semua($bulan,$tahun) {
		$this -> db -> select("sum(pnominal) as total from peticash_tab where pstatus=1 AND ptype=2 and MONTH(FROM_UNIXTIME( pdate,  '%Y-%m-%d' ))=".$bulan." and YEAR(FROM_UNIXTIME( pdate,  '%Y-%m-%d' ))=".$tahun, FALSE);
		return $this -> db -> get() -> result();
	}
}
