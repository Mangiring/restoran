<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> model('wishlist_model');
		$this -> load -> model('tables/tables_model');
		$this -> load -> model('menus/menus_model');
		$this -> load -> model('categories_tables/categories_tables_model');
	}

	function index() {
		$view['wishlist'] = $this -> wishlist_model -> __get_wishlist();
		$view['tables'] = $this -> tables_model -> __get_tables_list();
		$view['cat'] = $this -> categories_tables_model -> __get_categories_list();
		$this->load->view('table_list', $view);
	}

	function billing() {
		$view['wishlist'] = $this -> wishlist_model -> __get_wishlist();
		$view['tables'] = $this -> wishlist_model -> __get_wishlistz();
		$view['cat'] = $this -> categories_tables_model -> __get_categories_list();
		$this->load->view('table_list2', $view);
	}

	function wishlist_listx($wtid) {
		$uid=$this->memcachedlib->sesresult['uid'];
		$jtid=$this -> tables_model -> __cek_tables($wtid);
		if($jtid == 1){
			$arr = array('tstatus'=>3);
			$this -> tables_model -> __update_tables($wtid, $arr);
			$wdate = date('Y-m-d');
			$dt = array('wid'=>'','wname'=>'','wtid'=>$wtid,'wtotal'=>'','wdis'=>'','wtotalall'=>'','wdate'=>$wdate,'wstatus'=>1,'wcreateby'=>$uid,'wcdate'=>date('Y-m-d h:i:s'));	
			
			if($this -> wishlist_model ->__insert_wishlist($dt)) {
				$wid = $this->db->insert_id();
				redirect('wishlist/home/wishlist_list/'.$wid.'/'.$wtid);
			}
		}
		else {	
			$wid = $this -> wishlist_model ->__last_wishlist_by_wtid($wtid);
			redirect('wishlist/home/wishlist_list/'.$wid.'/'.$wtid);
		}
	}

	function billing_list($wtid) {
		$wid= $this -> wishlist_model ->__last_wishlist_by_wtid($wtid);
		redirect('wishlist/home/wishlist_list2/'.$wid);
	}

	function wishlist_list2($id) {
		$uid=$this->memcachedlib->sesresult['uid'];
		if($_POST) {
			$discc = $this -> input -> post('discc');
			$wppn = $this -> input -> post('ppn');
			$wpayment = str_replace(',','',$this -> input -> post('wpayment', TRUE));
			$t=0;
			$jwdid = count($_POST['wdid']);	
			$hargax = 0;
			
			if($jwdid>0) {
				for($j=0;$j<$jwdid;$j++){	
					$wdid = $_POST['wdid'][$j];
					$wqty = $_POST['qty'][$j];
					$wqty = $_POST['qty'][$j];
					$wharga = $_POST['harga'][$j];
					$wdisc = $_POST['wdisc'][$j];
					$t=$t+(($wharga*$wqty)-($wharga*$wqty*$wdisc/100));
				
					$dtx = array('wharga'=>$wharga,'wqty'=>$wqty,'wstatus'=>1,'bupdateby'=>$uid,'budate'=>date('Y-m-d h:i:s'));	
					$this -> wishlist_model -> __update_wishlist_detail($wdid,$dtx);
				}
				$wtotal=$t;
				$tall=$t-($t*$discc/100)+($t*$wppn/100);
				$wbackpayment=$wpayment-$tall;
			}
			
			$dta = array('wtotal'=>$wtotal,'wppn'=>$wppn,'wdis'=>$discc,'wtotalall'=>$tall,'wpayment'=>$wpayment,'wbackpayment'=>$wbackpayment,'bupdateby'=>$uid,'budate'=>date('Y-m-d h:i:s'));
			
			if($this -> wishlist_model -> __update_wishlist($id,$dta)){
				__set_error_msg(array('info' => 'Data berhasil di simpan'));
				redirect(site_url('wishlist/home/wishlist_list2/'.$id));
			}
		}
		else {
			$view['wishlist'] = $this -> wishlist_model -> __get_wishlistx($id);
			$view['id']=$id;
			$this->load->view('billing', $view);
		}
	}

	function billing2($id) {
		$view['wishlist'] = $this -> wishlist_model -> __get_wishlistx($id);
		$view['id']=$id;
		$wtid=$view['wishlist'][0]->wtid;		
		$this->load->view('billing2', $view,FALSE);
	}	

	function billing_approve($id) {
		$uid = $this->memcachedlib->sesresult['uid'];
		$view['wishlist'] = $this -> wishlist_model -> __get_wishlistx($id);
		$view['id'] = $id;
		$wtid = $view['wishlist'][0]->wtid;
		$arr = array('tstatus'=>1);
		$this -> tables_model -> __update_tables($wtid, $arr);
		$dta = array('wstatus'=>3,'bcreateby'=>$uid,'bcdate'=>date('Y-m-d h:i:s'),'bupdateby'=>$uid,'budate'=>date('Y-m-d h:i:s'));
		$this -> wishlist_model -> __update_wishlist($id,$dta);
		__set_error_msg(array('info' => 'Billing sudah di bayar'));
		redirect(site_url('wishlist/home/billing'));
	}

	function wishlist_list($id,$wtid) {
		$uid=$this->memcachedlib->sesresult['uid'];
		if($_POST) {
			$wname = $this -> input -> post('wname', TRUE);
			$person = $this -> input -> post('person', TRUE);
			$jwdid=count($this -> input -> post('wdid', TRUE));	
			$hargax=0;
			$wnotes = $this -> input -> post('notes', TRUE);
			
			if (!$wname || !$person) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('wishlist' . '/home/' . __FUNCTION__.'/'.$id.'/'.$wtid));
			}
			
			if($jwdid>0) {
				for($j=0;$j<$jwdid;$j++) {
					$wdid = $_POST['wdid'][$j];
					$wqty = $_POST['qty'][$j];
					$wharga = $_POST['harga'][$j];
					$wnote = $_POST['note'][$j];
					$dta=array('wname'=>$wname,'person'=>$person,'wnotes'=>$wnotes);
					$this -> wishlist_model -> __update_wishlist($id,$dta);
					$dtx=array('wharga'=>$wharga,'wqty'=>$wqty,'wstatus'=>1,'wnote'=>$wnote,'wupdateby'=>$uid,'wudate'=>date('Y-m-d h:i:s'));	
					$this -> wishlist_model -> __update_wishlist_detail($wdid,$dtx);
				}
				__set_error_msg(array('info' => 'Data berhasil di simpan'));
				redirect(site_url('wishlist' . '/home/' . __FUNCTION__.'/'.$id.'/'.$wtid));
			}
		}	
		
		$view['wishlist'] = $this -> wishlist_model -> __get_wishlistx($id);
		$view['id']=$id;
		$view['wtid']=$wtid;
		
		$this->load->view('wishlist', $view);
	}	
	
	function wishlist_print($id,$wtid){
		$view['wishlist'] = $this -> wishlist_model -> __get_wishlistx($id);
		$view['id']=$id;
		$view['wtid']=$wtid;
		$this->load->view('wishlist_print', $view,FALSE);
	}
	
	function wishlist_cancel($id,$wtid) {
		$this -> wishlist_model -> __cancel_wishlist($id);
		$this -> wishlist_model -> __cancel_table($wtid);
		__set_error_msg(array('error' => 'Wishlist berhasil di cancel'));
		redirect(site_url('wishlist'));
	}

	
	function wishlist_add($id) {
		$uid=$this->memcachedlib->sesresult['uid'];
		if ($_POST) {
			$wname = $this -> input -> post('wname', TRUE);
			
			$jumt = count($_POST['mid']);	
			$hargax = 0;
			$uid = $this->memcachedlib->sesresult['uid'];
			$wcdate = date('Y-m-d h:i:s');
			if($jumt>0){
				for($j=0;$j<$jumt;$j++){	
					$mids = explode("-",$_POST['mid'][$j]);
					$mid = $mids[0];
					$harga = $mids[1];
					$dis = $mids[2];
					$hargax = $harga+$hargax;
					$arr = array('wdid'=>'','wid'=>$id,'wmid'=>$mid,'wharga'=>$harga,'wdisc'=>$dis,'wstatus'=>1,'wcreateby'=>$uid,'wcdate'=>$wcdate);
					$this -> wishlist_model -> __insert_wishlist_detail($arr);
				}
				
				$dtx=array('wtotal'=>$hargax,'wdis'=>'','wtotalall'=>$hargax,'wdate'=>date('Y-m-d h:i:s'),'wstatus'=>1,'wupdateby'=>$uid,'wudate'=>date('Y-m-d h:i:s'));	
				$this -> wishlist_model -> __update_wishlist($id,$dtx);
				
			}	
			
			
			?>
				<script type="text/javascript">
					window.parent.location.reload(true);
				</script>
			<?php 		

		}
		else {
			$view['menus'] = $this -> wishlist_model -> ___get_wishlist_menus();
			$this->load->view('wishlist_add', $view,FALSE);
		}
	}

	function billing_add($id) {
		$uid = $this->memcachedlib->sesresult['uid'];
		if ($_POST) {
			$wname = $this -> input -> post('wname', TRUE);
			$wdt = $this -> input -> post('wdate', TRUE);
			$wdatex = explode('/',$wdt);
			$wdate = $wdatex[2].'-'.$wdatex[1].'-'.$wdatex[0];
			
			$jumt = count($_POST['mid']);	
			$hargax = 0;
			if($jumt > 0){
				for($j=0;$j<$jumt;$j++){	
					$mids = explode("-",$_POST['mid'][$j]);
					$mid = $mids[0];
					$harga = $mids[1];
					$dis = $mids[2];
					$hargax = $harga+$hargax;
					$arr = array('wdid'=>'','wid'=>$id,'wmid'=>$mid,'wharga'=>$harga,'wdisc'=>$dis,'wstatus'=>1,'bupdateby'=>$uid,'budate'=>date('Y-m-d h:i:s'));
					$this -> wishlist_model -> __insert_wishlist_detail($arr);
				}
				$dtx=array('wtotal'=>$hargax,'wdisc'=>'','wtotalall'=>$hargax,'wdate'=>$wdate,'wstatus'=>1,'bupdateby'=>$uid,'budate'=>date('Y-m-d h:i:s'));	
				$this -> wishlist_model -> __update_wishlist($id,$dtx);
			}
			?>
				<script type="text/javascript">
					window.parent.location.reload(true);
				</script>
			<?php 		

		}
		else {
			$pager = $this -> pagination_lib -> pagination($this -> menus_model -> __get_menus(),3,10,site_url('menus'));
			$view['menus'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
			$this->load->view('wishlist_add', $view,FALSE);
		}
	}
	
	function wishlist_update($id) {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$status = (int) $this -> input -> post('status');
			$id = (int) $this -> input -> post('id');
			
			if ($id) {
				if (!$name || !$desc) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('wishlist' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('cname' => $name, 'cdesc' => $desc, 'cstatus' => $status);
					if ($this -> wishlist_model -> __update_wishlist($id, $arr)) {	
						$arr = $this -> wishlist_model -> __get_suggestion();
						$this -> memcachedlib -> __regenerate_cache('__wishlist_suggestion', $arr, $_SERVER['REQUEST_TIME']+60*60*24*100);
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('wishlist'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('wishlist'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('wishlist'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> wishlist_model -> __get_wishlist_detail($id);
			$this->load->view(__FUNCTION__, $view,FALSE);
		}
	}
	
	function wishlist_menu_delete($id) {
		if ($this -> wishlist_model -> __delete_wishlist_detail($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect($_SERVER['HTTP_REFERER']);
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('wishlist'));
		}
	}
}
