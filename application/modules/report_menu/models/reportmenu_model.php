<?php
class Reportmenu_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_category_menu() {
		$this -> db -> select('cid,cname FROM categories_tab WHERE ctype=1 AND cstatus=1');
		return $this -> db -> get() -> result();
	}
    
    function __get_menu($cid) {
		$this -> db -> select('* FROM menus_tab WHERE mstatus=1 AND mcid=' . $cid);
		return $this -> db -> get() -> result();
	}
	
	function __get_total_report_menu($id,$from,$to) {
		$this -> db -> select("SUM(a.wqty) as totalmenu FROM wishlist_detail_tab a LEFT JOIN wishlist_tab b ON a.wid=b.wid WHERE b.wstatus=3 AND DATE(a.wcdate)>='".$from."' AND DATE(a.wcdate)<='".$to."' AND wmid=" . $id, FALSE);
		return $this -> db -> get() -> result();
	}
}
