<?php
class Menus_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_menus($cid) {
		$this -> db -> select('* FROM menus_tab WHERE (mstatus=1 OR mstatus=0) AND mcid='.$cid.' ORDER BY mid DESC');
		return $this -> db -> get() -> result();
	}
	
	function __get_category_menu() {
		$this -> db -> select('* FROM categories_tab WHERE cstatus=1 AND ctype=1 ORDER BY cid DESC');
		return $this -> db -> get() -> result();
	}
	
	function __get_menus_search($keyword) {
		return "SELECT a.*,b.cname FROM menus_tab a LEFT JOIN categories_tab b ON a.mcid=b.cid WHERE (a.mstatus=1 OR a.mstatus=0) AND (a.mname LIKE '%".$keyword."%' OR a.mdesc LIKE '%".$keyword."%') ORDER BY a.mid DESC";
	}
    
    function __get_suggestion() {
		$this -> db -> select('mid,mname as name FROM menus_tab WHERE (mstatus=1 OR mstatus=0) ORDER BY mid DESC');
		return $this -> db -> get() -> result();
	}
	
	function __get_menus_detail($id) {
		$this -> db -> select('* FROM menus_tab WHERE (mstatus=1 OR mstatus=0) AND mid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_menus($data) {
        return $this -> db -> insert('menus_tab', $data);
	}
	
	function __update_menus($id, $data) {
        $this -> db -> where('mid', $id);
        return $this -> db -> update('menus_tab', $data);
	}
	
	function __delete_menus($id) {
		return $this -> db -> query('UPDATE menus_tab SET mstatus=2 WHERE mid=' . $id);
	}
}
