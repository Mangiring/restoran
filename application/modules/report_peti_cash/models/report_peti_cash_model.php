<?php
class Report_peti_cash_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_peti_cash($from,$to) {
		$this -> db -> select("* FROM peticash_tab WHERE pstatus=1 AND DATE(FROM_UNIXTIME( pdate,  '%Y-%m-%d' ))>='".$from."' AND DATE(FROM_UNIXTIME( pdate,  '%Y-%m-%d' ))<='".$to."' ORDER BY pid DESC", FALSE);
		return $this -> db -> get() -> result();
	}
	function get_kas_besar($from,$to) {
		$this -> db -> select("sum(pnominal) as total from peticash_tab where pstatus=1 AND ptype=1 and DATE(FROM_UNIXTIME( pdate,  '%Y-%m-%d' ))>='".$from."' and DATE(FROM_UNIXTIME( pdate,  '%Y-%m-%d' ))<='".$to."'", FALSE);
		return $this -> db -> get() -> result();
	}
	
	function get_kas_kecil($from,$to) {
		$this -> db -> select("psaldo as total FROM `peticash_tab` where pstatus=1 AND DATE(FROM_UNIXTIME( pdate,  '%Y-%m-%d' ))>='".$from."' and DATE(FROM_UNIXTIME( pdate,  '%Y-%m-%d' ))<='".$to."'", FALSE);
		return $this -> db -> get() -> result();
	}
	
	function get_biaya_semua($from,$to) {
		$this -> db -> select("sum(pnominal) as total from peticash_tab where pstatus=1 AND ptype=2 and DATE(FROM_UNIXTIME( pdate,  '%Y-%m-%d' ))>='".$from."' and DATE(FROM_UNIXTIME( pdate,  '%Y-%m-%d' ))<='".$to."'", FALSE);
		return $this -> db -> get() -> result();
	}
}
