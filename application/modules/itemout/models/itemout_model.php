<?php
class Itemout_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_inventory() {
		return 'SELECT a.*,b.rname FROM inventory_tab a LEFT JOIN raw_material_tab b ON a.irid=b.rid WHERE b.rstatus=1';
	}
	
	function __get_inventory_detail($id) {
		$this -> db -> select('a.*,b.rname FROM inventory_tab a LEFT JOIN raw_material_tab b ON a.irid=b.rid WHERE b.rstatus=1 AND a.iid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_itemout($data) {
        return $this -> db -> insert('itemout_tab', $data);
	}
	
	function __update_inventory($id, $data) {
        $this -> db -> where('iid', $id);
        return $this -> db -> update('inventory_tab', $data);
	}
}
