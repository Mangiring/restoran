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
		$pager = $this -> pagination_lib -> pagination($this -> wishlist_model -> __get_wishlist(),3,10,site_url('wishlist'));
		$view['wishlist'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$view['tables']=$this -> tables_model -> __get_tables_list();
		$view['cat']=$this -> categories_tables_model -> __get_categories_list();
		//print_r($view['cat']);
		$this->load->view('table_list', $view);
	}


	function billing() {
		$pager = $this -> pagination_lib -> pagination($this -> wishlist_model -> __get_wishlist(),3,10,site_url('wishlist'));
		$view['wishlist'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$view['tables']=$this -> tables_model -> __get_tables_list();
		$view['cat']=$this -> categories_tables_model -> __get_categories_list();
		//print_r($view);
		$this->load->view('table_list2', $view);
	}	

	function wishlist_listx($wtid) {
		$jtid=$this -> tables_model -> __cek_tables($wtid);
		if($jtid==1){
			$arr=array('tstatus'=>3);
			$this -> tables_model -> __update_tables($wtid, $arr);
			$wdate=date('Y-m-d');
			$dt=array('wid'=>'','wname'=>'','wtid'=>$wtid,'wtotal'=>'','wdis'=>'',
			'wtotalall'=>'','wdate'=>$wdate,'wstatus'=>1);	
			
			if($this -> wishlist_model ->__insert_wishlist($dt)){
				$wid=$this->db->insert_id();
				redirect('wishlist/home/wishlist_list/'.$wid);
			}
		}else{	
		$wid= $this -> wishlist_model ->__last_wishlist_by_wtid($wtid);
		//echo $wid;die;
		redirect('wishlist/home/wishlist_list/'.$wid);	}
	}
	
	
	function billing_list($wtid) {
	
		$wid= $this -> wishlist_model ->__last_wishlist_by_wtid($wtid);
		//echo $wid;die;
		redirect('wishlist/home/wishlist_list2/'.$wid);	
		
	}	

	function wishlist_list2($id) {
		if($_POST){
		//print_r($_POST);
		$wname = $_POST['wname'];	
		$person = $_POST['person'];
		$discc = $_POST['discc'];
		$wppn = $_POST['ppn'];
		$t=0; 
		$jwdid= count($_POST['wdid']);	
			$hargax=0;
			if($jwdid>0){
				for($j=0;$j<$jwdid;$j++){	
						$wdid = $_POST['wdid'][$j];
						$wqty = $_POST['qty'][$j];
						$wqty = $_POST['qty'][$j];
						$wharga = $_POST['harga'][$j];
						$wdisc = $_POST['wdisc'][$j];
						$t=$t+(($wharga*$wqty)-($wharga*$wqty*$wdisc/100));
						
						//$whargax=$wharga*$wqty;
				
				$dtx=array('wharga'=>$wharga,'wqty'=>$wqty,'wstatus'=>1);	
				$this -> wishlist_model -> __update_wishlist_detail($wdid,$dtx);		
						
				}
				$wtotal=$t;
				$tall=$t-($t*$discc/100)-($t*$wppn/100);
				
				
			}
			
			$dta=array('wname'=>$wname,'wtotal'=>$wtotal,'wppn'=>$wppn,'wdis'=>$discc,'wtotalall'=>$tall);
				$this -> wishlist_model -> __update_wishlist($id,$dta);
		}	
		$pager = $this -> pagination_lib -> pagination($this -> wishlist_model -> __get_wishlistx($id),3,10,site_url('wishlist/home/wishlist_list2/'.$id));
		$view['wishlist'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$view['id']=$id;
		//print_r($view);die;
		$this->load->view('billing', $view);
	}	


function billing2($id) {
		$pager = $this -> pagination_lib -> pagination($this -> wishlist_model -> __get_wishlistx($id),3,10,site_url('wishlist/home/billing2/'.$id));
		$view['wishlist'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$view['id']=$id;
		//print_r($view['wishlist'][0]->wtid);die;
		$wtid=$view['wishlist'][0]->wtid;
		$arr=array('tstatus'=>1);
		$this -> tables_model -> __update_tables($wtid, $arr);
		$dta=array('wstatus'=>3);
		$this -> wishlist_model -> __update_wishlist($id,$dta);
		$this->load->view('billing2', $view,FALSE);	
	
}
	
	function wishlist_list($id) {
		if($_POST){
		//print_r($_POST);
		$wname = $_POST['wname'];
		$person = $_POST['person'];
		$jwdid=count($_POST['wdid']);	
			$hargax=0;
			if($jwdid>0){
				for($j=0;$j<$jwdid;$j++){	
						$wdid = $_POST['wdid'][$j];
						$wqty = $_POST['qty'][$j];
						$wharga = $_POST['harga'][$j];
						//$whargax=$wharga*$wqty;
				$dta=array('wname'=>$wname,'person'=>$person);
				$this -> wishlist_model -> __update_wishlist($id,$dta);
				$dtx=array('wharga'=>$wharga,'wqty'=>$wqty,'wstatus'=>1);	
				$this -> wishlist_model -> __update_wishlist_detail($wdid,$dtx);		
						
				}
			}
		}	
		$pager = $this -> pagination_lib -> pagination($this -> wishlist_model -> __get_wishlistx($id),3,10,site_url('wishlist/home/wishlist_list/'.$id));
		$view['wishlist'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$view['id']=$id;
		//print_r($view);die;
		$this->load->view('wishlist', $view);
	}	

	
	function wishlist_add($id) {
		if ($_POST) {
			$wname = $this -> input -> post('wname', TRUE);
			$wdt=$this -> input -> post('wdate', TRUE);
			$wdatex = explode('/',$wdt);
			$wdate=$wdatex[2].'-'.$wdatex[1].'-'.$wdatex[0];
			//$status = (int) $this -> input -> post('status');
			
			
			$jumt=count($_POST['mid']);	
			$hargax=0;
			if($jumt>0){
				//print_r($_POST);
				// echo $jumt;die;
				for($j=0;$j<$jumt;$j++){	
					$mids = explode("-",$_POST['mid'][$j]);
					$mid = $mids[0];
					$harga = $mids[1];
					$dis = $mids[2];
					//$qtys = $_POST['qty'][$j];
					$hargax=$harga+$hargax;
					$arr=array('wdid'=>'','wid'=>$id,'wmid'=>$mid,'wharga'=>$harga,'wdisc'=>$dis,'wstatus'=>1);
					//print_r($arr);//die;
					$this -> wishlist_model -> __insert_wishlist_detail($arr);
				}//die;
				
				$dtx=array('wtotal'=>$hargax,'wdis'=>'','wtotalall'=>$hargax,'wdate'=>$wdate,'wstatus'=>1);	
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
	
	


function billing_add($id) {
		if ($_POST) {
			$wname = $this -> input -> post('wname', TRUE);
			$wdt=$this -> input -> post('wdate', TRUE);
			$wdatex = explode('/',$wdt);
			$wdate=$wdatex[2].'-'.$wdatex[1].'-'.$wdatex[0];
			//$status = (int) $this -> input -> post('status');
			
			
			$jumt=count($_POST['mid']);	
			$hargax=0;
			if($jumt>0){
				//print_r($_POST);
				// echo $jumt;die;
				for($j=0;$j<$jumt;$j++){	
					$mids = explode("-",$_POST['mid'][$j]);
					$mid = $mids[0];
					$harga = $mids[1];
					$dis = $mids[2];
					//$qtys = $_POST['qty'][$j];
					$hargax=$harga+$hargax;
					$arr=array('wdid'=>'','wid'=>$id,'wmid'=>$mid,'wharga'=>$harga,'wdisc'=>$dis,'wstatus'=>1);
					//print_r($arr);//die;
					$this -> wishlist_model -> __insert_wishlist_detail($arr);
				}//die;
				
				$dtx=array('wtotal'=>$hargax,'wdisc'=>'','wtotalall'=>$hargax,'wdate'=>$wdate,'wstatus'=>1);	
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
			//print_r($view);
			$this->load->view(__FUNCTION__, $view,FALSE);
		}
	}
	
	function get_suggestion() {
		header('Content-type: application/javascript');
		$hint = array();
		$a = array();
		$q = urldecode($_SERVER['QUERY_STRING']);
		if (strlen($q) < 2) return false;
		$q = str_replace('-',' ',$q);
		$get_wishlist = $this -> memcachedlib -> get('__wishlist_suggestion', true);

		if (!$get_wishlist) {
			$arr = $this -> wishlist_model -> __get_suggestion();
			$this -> memcachedlib -> set('__wishlist_suggestion', $arr, 3600,true);
			$get_wishlist = $this -> memcachedlib -> get('__wishlist_suggestion', true);
		}
		
		foreach($get_wishlist as $k => $v) $a[] = array('name' => $v['name'], 'id' => $v['cid']);
		
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
	
	function wishlist_search() {
		$keyword = urlencode($this -> input -> post('keyword', true));
		
		if ($keyword)
			redirect(site_url('wishlist/wishlist_search_result/'.$keyword));
		else
			redirect(site_url('wishlist'));
	}
	
	function wishlist_search_result($keyword) {
		$pager = $this -> pagination_lib -> pagination($this -> wishlist_model -> __get_wishlist_search(urldecode($keyword)),3,10,site_url('wishlist/wishlist_search_result/' . $keyword));
		$view['wishlist'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$this -> load -> view('wishlist', $view);
	}
	
	function wishlist_delete($id) {
		if ($this -> wishlist_model -> __delete_wishlist($id)) {
			$arr = $this -> wishlist_model -> __get_suggestion();
			$this -> memcachedlib -> __regenerate_cache('__wishlist_suggestion', $arr, $_SERVER['REQUEST_TIME']+60*60*24*100);
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('wishlist'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('wishlist'));
		}
	}
}
