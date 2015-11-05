<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> model('itemreceiving_model');
		$this -> load -> model('raw_material/raw_material_model');
		$this -> load -> model('inventory/inventory_model');
	}

	function index() {
		(!$this -> memcachedlib -> get('__receiving_raw_material') ? '' : $this -> memcachedlib -> delete('__receiving_raw_material'));
		$pager = $this -> pagination_lib -> pagination($this -> itemreceiving_model -> __get_itemreceiving(),3,10,site_url('itemreceiving'));
		$view['itemreceiving'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$this->load->view('itemreceiving', $view);
	}
	
	function itemreceiving_add() {
		if ($_POST) {
			$qty = $this -> input -> post('qty', TRUE);
			$rid = $this -> input -> post('rid', TRUE);
			$title = $this -> input -> post('title', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$status = (int) $this -> input -> post('status');

			if (!$title || !$desc) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('itemreceiving' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('rtitle' => $title, 'rdate' => time(), 'rdesc' => $desc, 'rstatus' => $status);
				if ($this -> itemreceiving_model -> __insert_itemreceiving($arr)) {
					$lastID = $this -> db -> insert_id();
					for($i=0;$i<count($rid);++$i) {
						$this -> itemreceiving_model -> __insert_receiving_raw_material(array('rrid' => $lastID,'rrrid' => $rid[$i], 'rqty' => $qty[$i], 'rstatus' => 1));
					}
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('itemreceiving'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('itemreceiving'));
				}
			}
		}
		else {
			$view['material'] = array();
			$mids = $this -> memcachedlib -> get('__receiving_raw_material');
			if ($mids) {
				$view['material'] = $this -> raw_material_model -> __get_raw_material_by_id(implode(',',$mids));
			}
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function itemreceiving_update($id) {
		if ($_POST) {
			$app = (int) $this -> input -> post('app', TRUE);
			$qty = $this -> input -> post('qty', TRUE);
			$rrrid = $this -> input -> post('rrrid', TRUE);
			$rid = $this -> input -> post('rid', TRUE);
			$title = $this -> input -> post('title', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$status = (int) $this -> input -> post('status');
			$id = (int) $this -> input -> post('id');

			if ($id) {
				if (!$title || !$desc) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('itemreceiving' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('rtitle' => $title, 'rdesc' => $desc, 'rstatus' => ($app == 1 ? 3 : $status));
					if ($this -> itemreceiving_model -> __update_itemreceiving($id, $arr)) {
						for($i=0;$i<count($rid);++$i) {
							$this -> itemreceiving_model -> __update_receiving_raw_material($rid[$i], array('rqty' => $qty[$i]));
							if ($app == 1) {
								$inv = $this -> inventory_model -> __get_inventory_detail($rrrid[$i]);
								$this -> inventory_model -> __update_inventory($rrrid[$i], array('istockin' => ($inv[0] -> istockin + $qty[$i]), 'istock' => ($inv[0] -> istock + $qty[$i])));
								$inv = '';
							}
						}
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('itemreceiving'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('itemreceiving'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('itemreceiving'));
			}
		}
		else {
			$rqty = array();
			$rids = array();
			$view['id'] = $id;
			$view['detail'] = $this -> itemreceiving_model -> __get_itemreceiving_detail($id);
			$view['material'] = $this -> itemreceiving_model -> __get_itemreceiving_rawmaterial_detail($id);
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function itemreceiving_delete($id) {
		if ($this -> itemreceiving_model -> __delete_itemreceiving($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('itemreceiving'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('itemreceiving'));
		}
	}
	
	function receiving_rawmaterial_add($type) {
		$rid = $this -> input -> post('rid');
		if (!$rid) {
			__set_error_msg(array('error' => 'Material harus dipilih !!!'));
			redirect(site_url('itemreceiving/receiving_list_books/' . $type));
		}
		else {
			if ($type == 1) {
				$DidN = (!$this -> memcachedlib -> get('__receiving_raw_material') ? array() : $this -> memcachedlib -> get('__receiving_raw_material'));
				$this -> memcachedlib -> set('__receiving_raw_material', array_unique(array_merge($DidN,$rid)), 900);
			}
			else {
				$did = (int) $this -> input -> post('did');
				foreach($rid as $k => $v)
					$this -> itemreceiving_model -> __insert_receiving_raw_material(array('rrid' => $did,'rrrid' => $v, 'rstatus' => 1));
			}

			__set_error_msg(array('info' => 'Material berhasil ditambahkan.'));
			redirect(site_url('itemreceiving/receiving_list/' . $type));
		}
	}
	
	function receiving_rawmaterial_delete($type) {
		$rid = (int) $this -> input -> get('rid');

		if ($rid) {
			if ($type == 1) {
				$rawmaterial = $this -> memcachedlib -> get('__receiving_raw_material');
				$arr = array();
				foreach($rawmaterial as $v)
					if ($v <> $rid) $arr[] = $v;
				$this -> memcachedlib -> set('__receiving_raw_material', $arr, 900);
			}
			else
				$this -> itemreceiving_model -> __delete_receiving_raw_material($did,$rid);
			__set_error_msg(array('info' => 'Material berhasil dihapus.'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function receiving_list($type,$rid) {
		$pager = $this -> pagination_lib -> pagination($this -> raw_material_model -> __get_raw_material(),3,10,site_url('raw_material'));
		$view['raw_material'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$view['type'] = $type;
		$view['rid'] = $rid;
		$this->load->view('tmp/' . __FUNCTION__, $view, FALSE);
	}
}
