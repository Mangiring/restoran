<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wishlist_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('wishlist/wishlist_model');
    }
    
    function __get_wishlist($id='') {
		$parent = $this -> _ci -> wishlist_model -> __get_wishlist_select();
		$res = '<option value="0">-- Choose Category --</option>';
		foreach($parent as $k => $v) :
			if ($id == $v -> cid)
				$res .= '<option value="'.$v -> cid.'" selected>'.$v -> cname.'</option>';
			else
				$res .= '<option value="'.$v -> cid.'">'.$v -> cname.'</option>';
		endforeach;
		return $res;
	}

}
