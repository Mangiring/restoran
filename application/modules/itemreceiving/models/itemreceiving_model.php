<?php
class Itemreceiving_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_itemreceiving() {
		return 'SELECT * FROM receiving_tab WHERE (rstatus=1 OR rstatus=0 OR rstatus=3) ORDER BY rid DESC';
	}
	
	function __get_itemreceiving_detail($id) {
		$this -> db -> select('* FROM receiving_tab WHERE (rstatus=1 OR rstatus=0 OR rstatus=3) AND rid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_itemreceiving($data) {
        return $this -> db -> insert('receiving_tab', $data);
	}
	
	function __update_itemreceiving($id, $data) {
        $this -> db -> where('rid', $id);
        return $this -> db -> update('receiving_tab', $data);
	}
	
	function __delete_itemreceiving($id) {
		return $this -> db -> query('UPDATE receiving_tab SET rstatus=2 WHERE rid=' . $id);
	}
	
	function __delete_receiving_raw_material($id) {
		return $this -> db -> query('UPDATE receiving_material_tab SET rstatus=2 WHERE rid=' . $id);
	}
	
	function __insert_receiving_raw_material($data) {
        return $this -> db -> insert('receiving_material_tab', $data);
	}
	
	function __update_receiving_raw_material($id,$data) {
        $this -> db -> where('rid', $id);
        return $this -> db -> update('receiving_material_tab', $data);
	}
	
	function __get_itemreceiving_rawmaterial_detail($id) {
		$this -> db -> select('a.rid,a.rrrid,a.rqty,b.rname,b.rdesc FROM receiving_material_tab a LEFT JOIN raw_material_tab b ON a.rrrid=b.rid WHERE a.rstatus=1 AND a.rrid=' . $id);
		return $this -> db -> get() -> result();
	}
}
