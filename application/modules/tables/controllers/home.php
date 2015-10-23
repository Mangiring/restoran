<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('categories_tables/categories_tables_lib');
		$this -> load -> model('tables_model');
	}

	function index() {
		$pager = $this -> pagination_lib -> pagination($this -> tables_model -> __get_tables(),3,10,site_url('tables'));
		$view['tables'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$this->load->view('tables', $view);
	}
	
	function tables_add() {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$cid = (int) $this -> input -> post('cid');
			$status = (int) $this -> input -> post('status');
			
			if (!$name || !$desc) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('tables' . '/' . __FUNCTION__));
			}
			else if (!$cid) {
				__set_error_msg(array('error' => 'Kategori table harus di isi !!!'));
				redirect(site_url('tables' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('tcid' => $cid,'tname' => $name, 'tdesc' => $desc, 'tstatus' => $status);
				if ($this -> tables_model -> __insert_tables($arr)) {
					$arr = $this -> tables_model -> __get_suggestion();
					$this -> memcachedlib -> __regenerate_cache('__tables_suggestion', $arr, $_SERVER['REQUEST_TIME']+60*60*24*100);
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('tables'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('tables'));
				}
			}
		}
		else {
			$view['category'] = $this -> categories_tables_lib -> __get_categories(0);
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function tables_update($id) {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$cid = (int) $this -> input -> post('cid');
			$status = (int) $this -> input -> post('status');
			$id = (int) $this -> input -> post('id');
			
			if ($id) {
				if (!$name || !$desc) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('tables' . '/' . __FUNCTION__ . '/' . $id));
				}
				else if (!$cid) {
					__set_error_msg(array('error' => 'Kategori table harus di isi !!!'));
					redirect(site_url('tables' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('tcid' => $cid,'tname' => $name, 'tdesc' => $desc, 'tstatus' => $status);
					if ($this -> tables_model -> __update_tables($id, $arr)) {	
						$arr = $this -> tables_model -> __get_suggestion();
						$this -> memcachedlib -> __regenerate_cache('__tables_suggestion', $arr, $_SERVER['REQUEST_TIME']+60*60*24*100);
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('tables'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('tables'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('tables'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> tables_model -> __get_tables_detail($id);
			$view['category'] = $this -> categories_tables_lib -> __get_categories($view['detail'][0] -> tcid);
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
		$get_tables = $this -> memcachedlib -> get('__tables_suggestion', true);

		if (!$get_tables) {
			$arr = $this -> tables_model -> __get_suggestion();
			$this -> memcachedlib -> set('__tables_suggestion', $arr, 3600,true);
			$get_tables = $this -> memcachedlib -> get('__tables_suggestion', true);
		}
		
		foreach($get_tables as $k => $v) $a[] = array('name' => $v['name'], 'id' => $v['cid']);
		
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
	
	function tables_search() {
		$keyword = urlencode($this -> input -> post('keyword', true));
		
		if ($keyword)
			redirect(site_url('tables/tables_search_result/'.$keyword));
		else
			redirect(site_url('tables'));
	}
	
	function tables_search_result($keyword) {
		$pager = $this -> pagination_lib -> pagination($this -> tables_model -> __get_tables_search(urldecode($keyword)),3,10,site_url('tables/tables_search_result/' . $keyword));
		$view['tables'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$this -> load -> view('tables', $view);
	}
	
	function tables_delete($id) {
		if ($this -> tables_model -> __delete_tables($id)) {
			$arr = $this -> tables_model -> __get_suggestion();
			$this -> memcachedlib -> __regenerate_cache('__tables_suggestion', $arr, $_SERVER['REQUEST_TIME']+60*60*24*100);
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('tables'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('tables'));
		}
	}
}
