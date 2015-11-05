<?php
class Wishlist_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_wishlist() {
		return 'SELECT * FROM wishlist_tab WHERE (wstatus=1 OR wstatus=0) ORDER BY wid DESC';
	}

	function __get_wishlistz() {
		$this -> db -> select(" *,
		(select wname from wishlist_tab where wtid=tid order by wid desc limit 1) as wname,
		(select person from wishlist_tab where wtid=tid  order by wid desc limit 1) as person
		FROM tables_tab,categories_tab WHERE  tstatus <>2 and cid=tcid ORDER BY tid DESC");
		return $this -> db -> get() -> result();
	}	
	
	function __last_wishlist_by_wtid($wtid) {
		$queryd = $this->db->query("SELECT wid FROM wishlist_tab WHERE wtid='$wtid' and wstatus='1'	ORDER BY wid DESC");
			 $queryd = $queryd-> result();
			 $wid=$queryd[0] -> wid;
			 return $wid;
	}
	
	function __get_wishlistx($wid) {
		return "SELECT *,(select tname from tables_tab d where d.tid=a.wtid) as tname FROM wishlist_tab a,wishlist_detail_tab b, menus_tab c WHERE a.wid=b.wid and b.wmid=c.mid and (a.wstatus=1 OR a.wstatus=0) and a.wid='".$wid."' ORDER BY a.wid DESC";
	
	}
	
	function __get_wishlist_search($keyword) {
		return "SELECT * FROM wishlist_tab WHERE ctype=1 AND (cstatus=1 OR cstatus=0) AND (cname LIKE '%".$keyword."%' OR cdesc LIKE '%".$keyword."%') ORDER BY cid DESC";
	}
    
    function __get_suggestion() {
		$this -> db -> select('cid,cname as name FROM wishlist_tab WHERE ctype=1 AND (cstatus=1 OR cstatus=0) ORDER BY cid DESC');
		return $this -> db -> get() -> result();
	}
	
	function __get_wishlist_select() {
		$this -> db -> select('cid,cname FROM wishlist_tab WHERE ctype=1 AND (cstatus=1 OR cstatus=0) ORDER BY cname ASC');
		return $this -> db -> get() -> result();
	}
	
	function __get_wishlist_detail($id) {
		return "SELECT * FROM wishlist_tab WHERE (wstatus='1' OR wstatus='0' ) AND wid='".$id."' ORDER BY wid DESC'";
	}
	
	function __insert_wishlist($data) {
        return $this -> db -> insert('wishlist_tab', $data);
	}
	function __insert_wishlist_detail($data){
		return $this -> db -> insert('wishlist_detail_tab', $data);
	}	
	
	function __update_wishlist($id, $data) {
        $this -> db -> where('wid', $id);
        return $this -> db -> update('wishlist_tab', $data);
	}

	function __cancel_wishlist($id) {
		$uid=$this->memcachedlib->sesresult['uid'];
		$wudate=date('Y-m-d h:i:s');
		$data=array('wstatus'=>2,'wupdateby'=>$uid,'wudate'=>$wudate);
        $this -> db -> where('wid', $id);
        return $this -> db -> update('wishlist_tab', $data);
	}	

	function __cancel_table($wtid) {
		$dat = array('tstatus'=>1);
        $this -> db -> where('tid', $wtid);
        return $this -> db -> update('tables_tab', $dat);
	}
	
	function __update_wishlist_detail($id, $data) {
        $this -> db -> where('wdid', $id);
        return $this -> db -> update('wishlist_detail_tab', $data);
	}	
	function __delete_wishlist($id) {
		return $this -> db -> query('UPDATE wishlist_tab SET cstatus=2 WHERE cid=' . $id);
	}
}
