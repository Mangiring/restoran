<?php
class Report_transaction_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_transaction($from,$to) {
		$this -> db -> select("a.*,b.tname FROM wishlist_tab a LEFT JOIN tables_tab b ON a.wtid=b.tid WHERE (a.wstatus=3 OR a.wstatus=2) AND DATE(a.wdate)>='".$from."' AND DATE(a.wdate)<='".$to."' ORDER BY a.wdate ASC", FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __clean_transaction() {
        $this -> db -> where('wstatus', 3);
        $this -> db -> or_where('wstatus', 2);
        return $this -> db -> update('wishlist_tab', array('wstatus' => 4));
	}
}
