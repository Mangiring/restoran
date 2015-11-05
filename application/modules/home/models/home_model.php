<?php
class home_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_recent_menus() {
		$this -> db -> select('a.*,b.cname FROM menus_tab a LEFT JOIN categories_tab b ON a.mcid=b.cid WHERE (a.mstatus=1 OR a.mstatus=0) ORDER BY a.mid DESC LIMIT 0,5', FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_recent_transaction() {
		$this -> db -> select("a.*,b.tname FROM wishlist_tab a LEFT JOIN tables_tab b ON a.wtid=b.tid ORDER BY a.wid DESC LIMIT 0,5", FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_total($type) {
		if ($type == 1)
			$sql = $this -> db -> query('SELECT * FROM menus_tab WHERE mstatus=1');
		else if ($type == 2)
			$sql = $this -> db -> query('SELECT * FROM wishlist_tab WHERE wstatus=3');
		else if ($type == 3)
			$sql = $this -> db -> query('SELECT * FROM wishlist_tab');
		else
			$sql = $this -> db -> query('SELECT * FROM raw_material_tab WHERE rstatus=1');
		return $sql -> num_rows();
	}
}
