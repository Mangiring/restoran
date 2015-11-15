<?php
class Tables_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_tables($id) {
		$this -> db -> select('* FROM tables_tab WHERE (tstatus=1 OR tstatus=0) AND tcid='.$id.' ORDER BY tid DESC');
		return $this -> db -> get() -> result();
	}

	function __get_tables_list() {
		$this -> db -> select(' * FROM tables_tab,categories_tab WHERE (tstatus=1 OR tstatus=0 OR tstatus=3 ) AND cid=tcid ORDER BY tid DESC');
		return $this -> db -> get() -> result();
	}
	
	function __get_tables_search($keyword) {
		return "SELECT * FROM tables_tab WHERE (tstatus=1 OR tstatus=0) AND (tname LIKE '%".$keyword."%' OR tdesc LIKE '%".$keyword."%') ORDER BY tid DESC";
	}
    
    function __get_suggestion() {
		$this -> db -> select('tid,tname as name FROM tables_tab WHERE (tstatus=1 OR tstatus=0) ORDER BY tid DESC');
		return $this -> db -> get() -> result();
	}
	
	function __get_tables_select() {
		$this -> db -> select('tid,tname FROM tables_tab WHERE (tstatus=1 OR tstatus=0) ORDER BY tname ASC');
		return $this -> db -> get() -> result();
	}
	
	function __get_tables_detail($id) {
		$this -> db -> select('* FROM tables_tab WHERE (tstatus=1 OR tstatus=0) AND tid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_tables($data) {
        return $this -> db -> insert('tables_tab', $data);
	}

	function __cek_tables($id) {
			$queryd = $this->db->query("SELECT tstatus FROM tables_tab  where tid = '$id'");
			$queryd = $queryd-> result();	 
			$jmember=$queryd[0] -> tstatus;
			return $jmember;
	}
	
	function __update_tables($id, $data) {
        $this -> db -> where('tid', $id);
        return $this -> db -> update('tables_tab', $data);
	}
	
	function __delete_tables($id) {
		return $this -> db -> query('UPDATE tables_tab SET tstatus=2 WHERE tid=' . $id);
	}
}
