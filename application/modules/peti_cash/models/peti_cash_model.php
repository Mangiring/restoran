<?php
class Peti_cash_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_peti_cash() {
		return 'SELECT * FROM peticash_tab WHERE pstatus=1 ORDER BY pid DESC';
	}
	
	function __get_peti_cash_detail($id) {
		$this -> db -> select('* FROM peticash_tab WHERE pstatus=1 AND pid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __get_current_saldo($bulan,$tahun) {
		$this -> db -> select("psaldo FROM `peticash_tab` where MONTH(FROM_UNIXTIME( pdate,  '%Y-%m-%d' ))=".$bulan." and YEAR(FROM_UNIXTIME( pdate,  '%Y-%m-%d' ))=".$tahun." order by pid desc LIMIT 0,1", FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __insert_peti_cash($data) {
        return $this -> db -> insert('peticash_tab', $data);
	}
	
	function __update_peti_cash($id, $data) {
        $this -> db -> where('pid', $id);
        return $this -> db -> update('peticash_tab', $data);
	}
}
