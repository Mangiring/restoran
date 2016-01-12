<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('categories/categories_lib');
		$this -> load -> model('menus_model');
	}

	function index() {
		//~ $cid = array(1,6,8,7,2);
		//~ foreach($cid as $v) {
			//~ $sql = mysql_query('SELECT * FROM menus_tab WHERE mstatus=1 AND mcid=' . $v);
			//~ $i = 1;
			//~ while($r = mysql_fetch_array($sql)) {
				//~ $upd = mysql_query("UPDATE menus_tab SET mposition=".$i." WHERE mid=" . $r['mid']);
				//~ ++$i;
			//~ }
		//~ }
		//~ die;
		$view['categories'] = $this -> menus_model -> __get_category_menu();
		$this->load->view('menus', $view);
	}
	
	function menus_add() {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$cid = $this -> input -> post('cid', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$disc = $this -> input -> post('disc', TRUE);
			$price = str_replace(',','',$this -> input -> post('price', TRUE));
			$status = (int) $this -> input -> post('status');
			
			if (!$name || !$desc || !$price) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('menus' . '/' . __FUNCTION__));
			}
			else {
				$lastposition = $this -> menus_model -> __get_last_postiton_menus($cid);
				$arr = array('mcid' => $cid, 'mname' => $name, 'mdesc' => $desc, 'mdisc' => $disc, 'mharga' => $price, 'mstatus' => $status, 'mposition' => ($lastposition[0] -> mposition + 1));
				if ($this -> menus_model -> __insert_menus($arr)) {
					$arr = $this -> menus_model -> __get_suggestion();
					$this -> memcachedlib -> __regenerate_cache('__menus_suggestion', $arr, $_SERVER['REQUEST_TIME']+60*60*24*100);
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('menus'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('menus'));
				}
			}
		}
		else {
			$view['category'] = $this -> categories_lib -> __get_categories(0);
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function menus_update($id) {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$cid = $this -> input -> post('cid', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$disc = $this -> input -> post('disc', TRUE);
			$price = str_replace(',','',$this -> input -> post('price', TRUE));
			$status = (int) $this -> input -> post('status');
			$id = (int) $this -> input -> post('id');
			
			if ($id) {
				if (!$name || !$desc || !$price) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('menus' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('mcid' => $cid, 'mname' => $name, 'mdesc' => $desc, 'mdisc' => $disc, 'mharga' => $price, 'mstatus' => $status);
					if ($this -> menus_model -> __update_menus($id, $arr)) {	
						$arr = $this -> menus_model -> __get_suggestion();
						$this -> memcachedlib -> __regenerate_cache('__menus_suggestion', $arr, $_SERVER['REQUEST_TIME']+60*60*24*100);
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('menus'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('menus'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('menus'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> menus_model -> __get_menus_detail($id);
			$view['category'] = $this -> categories_lib -> __get_categories($view['detail'][0] -> mcid);
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function get_suggestion() {
		header('Content-type: application/javascript');
		$hint = array();
		$a = array();
		$q = urldecode($_SERVER['QUERY_STRING']);
		if (strlen($q) < 2) return false;
		$q = str_replace('-',' ',$q);
		$get_menus = $this -> memcachedlib -> get('__menus_suggestion', true);

		if (!$get_menus) {
			$arr = $this -> menus_model -> __get_suggestion();
			$this -> memcachedlib -> set('__menus_suggestion', $arr, 3600,true);
			$get_menus = $this -> memcachedlib -> get('__menus_suggestion', true);
		}
		
		foreach($get_menus as $k => $v) $a[] = array('name' => $v['name'], 'id' => $v['cid']);
		
		if (strlen($q) > 0) {
			for($i=0; $i<count($a); $i++) {
				$a[$i]['name'] = trim($a[$i]['name']);
				$num_words = substr_count($a[$i]['name'],' ')+1;
				$pos = array();
				$is_suggestion_added = false;
				
				for ($cnt_pos=0; $cnt_pos<$num_words; $cnt_pos++) {
					if ($cnt_pos==0)
						$pos[$cnt_pos] = 0;
					else
						$pos[$cnt_pos] = strpos($a[$i]['name'],' ', $pos[$cnt_pos-1])+1;
				}
				
				if (strtolower($q)==strtolower(substr($a[$i]['name'],0,strlen($q)))) {
					$hint[] = array('d' => $i, 'i' => $a[$i]['id'], 'n' => $a[$i]['name']);
					$is_suggestion_added = true;
				}
				for ($j=0;$j<$num_words && !$is_suggestion_added;$j++) {
					if(strtolower($q)==strtolower(substr($a[$i]['name'],$pos[$j],strlen($q)))){
						$hint[] = array('d' => $i, 'i' => $a[$i]['id'], 'n' => $a[$i]['name']);
						$is_suggestion_added = true;                                        
					}
				}
			}
		}
		
		echo json_encode($hint);
	}
	
	function menus_search() {
		$keyword = urlencode($this -> input -> post('keyword', true));
		
		if ($keyword)
			redirect(site_url('menus/menus_search_result/'.$keyword));
		else
			redirect(site_url('menus'));
	}
	
	function menus_search_result($keyword) {
		$pager = $this -> pagination_lib -> pagination($this -> menus_model -> __get_menus_search(urldecode($keyword)),3,10,site_url('menus/menus_search_result/' . $keyword));
		$view['menus'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$this -> load -> view('menus', $view);
	}
	
	function menus_delete($id) {
		$det = $this -> menus_model -> __get_menus_detail($id);
		if ($this -> menus_model -> __delete_menus($id)) {
			$raw = $this -> menus_model -> __get_raw_menus($det[0] -> mcid);
			$i = 1;
			foreach($raw as $k => $v) {
				$this -> menus_model -> __update_menus($v -> mid, array('mposition' => $i));
				++$i;
			}
			
			$arr = $this -> menus_model -> __get_suggestion();
			$this -> memcachedlib -> __regenerate_cache('__menus_suggestion', $arr, $_SERVER['REQUEST_TIME']+60*60*24*100);
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('menus'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('menus'));
		}
	}
	
	function setposition() {
		$pos = $this -> input -> get('pos');
		$cid = (int) $this -> input -> get('cid');
		$mid = (int) $this -> input -> get('mid');
		$mposition = (int) $this -> input -> get('mposition');
		
		if ($cid && $mposition) {
			if ($pos == 'up') {
				$ck = $this -> menus_model -> __get_menus_position($mposition - 1, $cid);
				$arr = array('mposition' => $mposition - 1);
				$this -> menus_model -> __update_menus($mid, $arr);
				
				$arr2 = array('mposition' => $mposition);
				$this -> menus_model -> __update_menus($ck[0] -> mid, $arr2);
				
				__set_error_msg(array('info' => 'Posisi berhasil diubah.'));
				redirect(site_url('menus#tcid_' . $cid));
			}
			if ($pos == 'down') {
				$ck = $this -> menus_model -> __get_menus_position($mposition + 1, $cid);
				$arr = array('mposition' => $mposition + 1);
				$this -> menus_model -> __update_menus($mid, $arr);
				
				$arr2 = array('mposition' => $mposition);
				$this -> menus_model -> __update_menus($ck[0] -> mid, $arr2);
				
				__set_error_msg(array('info' => 'Posisi berhasil diubah.'));
				redirect(site_url('menus#tcid_' . $cid));
			}
		}
	}
}
