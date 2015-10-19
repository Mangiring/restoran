<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> model('raw_material_model');
	}

	function index() {
		$pager = $this -> pagination_lib -> pagination($this -> raw_material_model -> __get_raw_material(),3,10,site_url('raw_material'));
		$view['raw_material'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$this->load->view('raw_material', $view);
	}
	
	function raw_material_add() {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$status = (int) $this -> input -> post('status');
			
			if (!$name || !$desc) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('raw_material' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('rname' => $name, 'rdesc' => $desc, 'rstatus' => $status);
				if ($this -> raw_material_model -> __insert_raw_material($arr)) {
					$arr = $this -> raw_material_model -> __get_suggestion();
					$this -> memcachedlib -> __regenerate_cache('__raw_material_suggestion', $arr, $_SERVER['REQUEST_TIME']+60*60*24*100);
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('raw_material'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('raw_material'));
				}
			}
		}
		else {
			$this->load->view(__FUNCTION__, '');
		}
	}
	
	function raw_material_update($id) {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$status = (int) $this -> input -> post('status');
			$id = (int) $this -> input -> post('id');
			
			if ($id) {
				if (!$name || !$desc) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('raw_material' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('rname' => $name, 'rdesc' => $desc, 'rstatus' => $status);
					if ($this -> raw_material_model -> __update_raw_material($id, $arr)) {	
						$arr = $this -> raw_material_model -> __get_suggestion();
						$this -> memcachedlib -> __regenerate_cache('__raw_material_suggestion', $arr, $_SERVER['REQUEST_TIME']+60*60*24*100);
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('raw_material'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('raw_material'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('raw_material'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> raw_material_model -> __get_raw_material_detail($id);
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
		$get_raw_material = $this -> memcachedlib -> get('__raw_material_suggestion', true);

		if (!$get_raw_material) {
			$arr = $this -> raw_material_model -> __get_suggestion();
			$this -> memcachedlib -> set('__raw_material_suggestion', $arr, 3600,true);
			$get_raw_material = $this -> memcachedlib -> get('__raw_material_suggestion', true);
		}
		
		foreach($get_raw_material as $k => $v) $a[] = array('name' => $v['name'], 'id' => $v['cid']);
		
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
	
	function raw_material_search() {
		$keyword = urlencode($this -> input -> post('keyword', true));
		
		if ($keyword)
			redirect(site_url('raw_material/raw_material_search_result/'.$keyword));
		else
			redirect(site_url('raw_material'));
	}
	
	function raw_material_search_result($keyword) {
		$pager = $this -> pagination_lib -> pagination($this -> raw_material_model -> __get_raw_material_search(urldecode($keyword)),3,10,site_url('raw_material/raw_material_search_result/' . $keyword));
		$view['raw_material'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$this -> load -> view('raw_material', $view);
	}
	
	function raw_material_delete($id) {
		if ($this -> raw_material_model -> __delete_raw_material($id)) {
			$arr = $this -> raw_material_model -> __get_suggestion();
			$this -> memcachedlib -> __regenerate_cache('__raw_material_suggestion', $arr, $_SERVER['REQUEST_TIME']+60*60*24*100);
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('raw_material'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('raw_material'));
		}
	}
}
