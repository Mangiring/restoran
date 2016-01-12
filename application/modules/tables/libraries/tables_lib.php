<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tables_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('tables/tables_model');
        $this->_ci->load->model('categories_tables/categories_tables_model');
    }
    
    function __get_tables($id='') {
		$categories = $this -> _ci -> categories_tables_model -> __get_categories_tables();
		$res = '<option value="0">-- Choose Table --</option>';
		foreach($categories as $k => $v) :
			$res .= '<option value="0">**'.$v -> cname.'</option>';
			$tables = $this -> _ci -> tables_model -> __get_tables($v -> cid);
			foreach($tables as $k1 => $v1) :
				if ($id == $v1 -> tid)
					$res .= '<option value="'.$v1 -> tid.'" selected>--'.$v1 -> tname.'</option>';
				else
					$res .= '<option value="'.$v1 -> tid.'">--'.$v1 -> tname.'</option>';
			endforeach;
			$tables = array();
		endforeach;
		return $res;
	}
}
