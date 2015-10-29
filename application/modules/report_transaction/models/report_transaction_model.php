<?php
class Report_transaction_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_transaction($from,$to) {
		$this -> db -> select("a.*,b.tname FROM wishlist_tab a LEFT JOIN tables_tab b ON a.wtid=b.tid WHERE a.wstatus=3 AND DATE(a.wdate)>='".$from."' AND DATE(a.wdate)<='".$to."' ORDER BY a.wid DESC", FALSE);
		return $this -> db -> get() -> result();
	}
}
