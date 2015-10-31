<?php
class Raw_material_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_raw_material() {
		return 'SELECT * FROM raw_material_tab WHERE (rstatus=1 OR rstatus=0) ORDER BY rid DESC';
	}

	function __get_raw_material_by_id($ids) {
		$this -> db -> select("rid,rname,rdesc FROM raw_material_tab WHERE (rstatus=1 OR rstatus=0) AND rid IN (".$ids.") ORDER BY rid DESC", FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_raw_material_search($keyword) {
		return "SELECT * FROM raw_material_tab WHERE (rstatus=1 OR rstatus=0) AND (rname LIKE '%".$keyword."%' OR rdesc LIKE '%".$keyword."%') ORDER BY rid DESC";
	}
    
    function __get_suggestion() {
		$this -> db -> select('rid,rname as name FROM raw_material_tab WHERE (rstatus=1 OR rstatus=0) ORDER BY rid DESC');
		return $this -> db -> get() -> result();
	}
	
	function __get_raw_material_detail($id) {
		$this -> db -> select('* FROM raw_material_tab WHERE (rstatus=1 OR rstatus=0) AND rid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_raw_material($data) {
        return $this -> db -> insert('raw_material_tab', $data);
	}
	
	function __update_raw_material($id, $data) {
        $this -> db -> where('rid', $id);
        return $this -> db -> update('raw_material_tab', $data);
	}
	
	function __delete_raw_material($id) {
		return $this -> db -> query('UPDATE raw_material_tab SET rstatus=2 WHERE rid=' . $id);
	}
}
