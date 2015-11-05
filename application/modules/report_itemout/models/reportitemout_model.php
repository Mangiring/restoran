<?php
class Reportitemout_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_reportitemout($from,$to) {
		$this -> db -> select("a.*,b.istock as sfinal,c.rname FROM itemout_tab a LEFT JOIN inventory_tab b ON a.iidid=b.iid RIGHT JOIN raw_material_tab c ON b.irid=c.rid WHERE a.istatus=1 AND DATE(FROM_UNIXTIME( a.idate, '%Y-%m-%d' ))>='".$from."' AND DATE(FROM_UNIXTIME( a.idate, '%Y-%m-%d' ))<='".$to."' ORDER BY a.iid DESC", FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __clean_itemout() {
        $this -> db -> where('istatus', 1);
        return $this -> db -> update('itemout_tab', array('istatus' => 0));
	}
}
