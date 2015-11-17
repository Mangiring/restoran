<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> model('categories_model');
	}

	function index() {
		$view['categories'] = $this -> categories_model -> __get_categories();
		$this->load->view('categories', $view);
	}
	
	function categories_add() {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$status = (int) $this -> input -> post('status');
			$position = (int) $this -> input -> post('position');
			
			if (!$name || !$desc || !$position) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('categories' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('ctype' => 1,'cname' => $name, 'cdesc' => $desc, 'cstatus' => $status, 'cposition' => $position);
				if ($this -> categories_model -> __insert_categories($arr)) {
					$arr = $this -> categories_model -> __get_suggestion();
					$this -> memcachedlib -> __regenerate_cache('__categories_suggestion', $arr, $_SERVER['REQUEST_TIME']+60*60*24*100);
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('categories'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('categories'));
				}
			}
		}
		else {
			$this->load->view(__FUNCTION__, '');
		}
	}
	
	function categories_update($id) {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$status = (int) $this -> input -> post('status');
			$position = (int) $this -> input -> post('position');
			$id = (int) $this -> input -> post('id');
			
			if ($id) {
				if (!$name || !$desc || !$position) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('categories' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('cname' => $name, 'cdesc' => $desc, 'cstatus' => $status, 'cposition' => $position);
					if ($this -> categories_model -> __update_categories($id, $arr)) {	
						$arr = $this -> categories_model -> __get_suggestion();
						$this -> memcachedlib -> __regenerate_cache('__categories_suggestion', $arr, $_SERVER['REQUEST_TIME']+60*60*24*100);
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('categories'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('categories'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('categories'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> categories_model -> __get_categories_detail($id);
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
		$get_categories = $this -> memcachedlib -> get('__categories_suggestion', true);

		if (!$get_categories) {
			$arr = $this -> categories_model -> __get_suggestion();
			$this -> memcachedlib -> set('__categories_suggestion', $arr, 3600,true);
			$get_categories = $this -> memcachedlib -> get('__categories_suggestion', true);
		}
		
		foreach($get_categories as $k => $v) $a[] = array('name' => $v['name'], 'id' => $v['cid']);
		
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
	
	function categories_search() {
		$keyword = urlencode($this -> input -> post('keyword', true));
		
		if ($keyword)
			redirect(site_url('categories/categories_search_result/'.$keyword));
		else
			redirect(site_url('categories'));
	}
	
	function categories_search_result($keyword) {
		$view['categories'] = $this -> categories_model -> __get_categories_search(urldecode($keyword));
		$this -> load -> view('categories', $view);
	}
	
	function categories_delete($id) {
		if ($this -> categories_model -> __delete_categories($id)) {
			$arr = $this -> categories_model -> __get_suggestion();
			$this -> memcachedlib -> __regenerate_cache('__categories_suggestion', $arr, $_SERVER['REQUEST_TIME']+60*60*24*100);
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('categories'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('categories'));
		}
	}
}
