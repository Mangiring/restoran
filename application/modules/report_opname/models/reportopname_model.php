<?php
class Reportopname_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_reportopname($from,$to) {
		$this -> db -> select("a.*,c.rname FROM opname_tab a LEFT JOIN inventory_tab b ON a.oidid=b.iid RIGHT JOIN raw_material_tab c ON b.irid=c.rid WHERE a.ostatus=1 AND DATE(FROM_UNIXTIME( a.odate, '%Y-%m-%d' ))>='".$from."' AND DATE(FROM_UNIXTIME( a.odate, '%Y-%m-%d' ))<='".$to."' ORDER BY a.oid DESC", FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __clean_opname() {
        $this -> db -> where('ostatus', 1);
        return $this -> db -> update('opname_tab', array('ostatus' => 0));
	}
}
