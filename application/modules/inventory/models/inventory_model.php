<?php
class Inventory_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_inventory() {
		return 'SELECT a.*,b.rname FROM inventory_tab a LEFT JOIN raw_material_tab b ON a.irid=b.rid WHERE b.rstatus=1';
	}
}
