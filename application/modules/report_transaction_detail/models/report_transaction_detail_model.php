<?php
class Report_transaction_detail_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_transaction_detail($wid) {
		$this -> db -> select("a.*,b.*,c.*  FROM wishlist_detail_tab a , wishlist_tab b,menus_tab c WHERE a.wid=b.wid AND a.wmid=c.mid  AND b.wstatus='3' AND a.wid='$wid'  ORDER BY a.wid DESC", FALSE);
		return $this -> db -> get() -> result();
	}
}
