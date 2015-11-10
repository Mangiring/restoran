<link rel="stylesheet" 
href="<?php echo site_url('application/views/assets/colorbox/colorbox.css'); ?>" />
		<script src="<?php echo site_url('application/views/assets/colorbox/jquery.min.js'); ?>"></script>
		<script src="<?php echo site_url('application/views/assets/colorbox/jquery.colorbox.js'); ?>"></script>
		<script>
			$(document).ready(function(){

		
				$("#iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				$("#iframex").colorbox({iframe:true, width:"80%", height:"80%"});
				$(".inline").colorbox({inline:true, width:"50%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});

				$('.non-retina').colorbox({rel:'group5', transition:'none'})
				$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
				
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script>

	<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_currency"></i> Billing</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo site_url()?>">Home</a></li>
						<li><i class="icon_currency"></i>Billing</li>
						<li>Billing Close</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
	<?php echo __get_error_msg(); ?>
					<h3 class="box-title" style="margin-top:0;"><a id="iframe" href="<?php echo site_url('wishlist/home/wishlist_add/'.$id); ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add Menu</a></h3>
                      <section class="panel">
                          <header class="panel-heading">
                              Billing
                          </header>

                          <div class="table-responsive">
						  <form method="POST">
							  <br />
                            <table border="0" style="width:50%;margin-left:5px">
						<?php			
			$jw= count($wishlist);
			if($jw<1){
				__set_error_msg(array('error' => 'Pesanan masih kosong, silahkan isi wishlist terlebih dahulu.'));
				redirect(site_url('wishlist/home/billing'));
			}
								  foreach($wishlist as $k => $v) {
									  $wname=$v -> wname;
									  $wstatus=$v -> wstatus;
									  $wtid=$v -> wtid;
									  $tname=$v -> tname;
									  $person=$v -> person;
								  }
							$wcount= count($wishlist);
							if($wcount==0){
										$wname="";
									  $wstatus="";
									  $wtid="";
									  $tname="";
									  $person="";
								
							}
						?>
		  <tr><td><b>Table</b></td><td>: <?php echo $tname; ?></td><td></td></tr>
		  <tr><td><b>Customer Name</b></td><td>: <?php echo $wname; ?></td><td></td></tr>
		  <tr><td><b>Person</b></td><td>: <?php echo $person; ?><input type=hidden name="wname" value="<?php echo $wname; ?>" ></td><td></td></tr>
                            </table><br>
							
                            <table class="table">
                              <thead>
                                <tr>
          <th>Menu</th>
		  <th>Qty</th>
         <th>Harga</th>
		 <th>Discount</th>
		 <th>Total</th>
                                </tr>
                              </thead>
                              <tbody>
								  
		  <?php
		  $t=0;
		  $tt=0;
		  foreach($wishlist as $k => $v) :
		  ?>
		
                                        <tr>
          
		  <td><input type=hidden name="wdid[]" value="<?php echo $v -> wdid; ?>" >
		  <input type=hidden name="harga[]" value="<?php echo $v -> wharga; ?>" >
		  <?php echo $v -> mname; ?></td>
		  <td><select name="qty[]" class="form-control">
		  <option><?php echo $v -> wqty;?></option>
		  <?php for($i=1;$i<30;$i++){ ?>
		  <option><?=$i;?></option>
		  <?php } ?>
		  <option>0</option>
		  </select></td>
		<td><?php echo __get_rupiah($v -> wharga,1);?></td>
		<td>
		<input type="hidden" name="wdisc[]" value="<?php echo $v -> wdisc;?>">
		<?php echo $v -> wdisc;
		$total=($v -> wqty * $v -> wharga) - (($v -> wqty) * ($v -> wharga) * ($v -> wdisc) /100) ;
		$tt=$tt+$total;
		$tdis=$tt * $v->wdis /100;
		$tppn=$tt * $v->wppn /100;
		$totaldis=$tt-($tdis) + ($tppn);
		
		$t=$totaldis+$t;
		$tsisa= ($v->wpayment) - ($v -> wtotalall);
		?>%
		
		</td>
		<td><?php echo __get_rupiah($total,1);?></td>
										</tr>
        <?php endforeach; ?>
		
                              </tbody>
                              <tfoot>
			<tr><td>Before Tax</td><td></td><td></td><td></td><td><?php echo __get_rupiah($tt,1);?></td></tr>					  
							  
							  
			<tr><td>Discount (%)</td><td><input class="form-control" type="number" name="discc"value="<?php echo $v -> wdis;?>" ></td><td></td><td></td><td><?php echo __get_rupiah($tdis,1);?></td></tr>					  
		<tr><td>PPN (%)</td><td style="width:200px"><input class="form-control" type="number" name="ppn" value="<?php echo ($v -> wppn ? $v -> wppn : 0);?>" ></p></td><td></td><td></td><td><?php echo __get_rupiah($tppn,1);?></td></tr>	
		
		<tr><td>Total</td><td style="width:200px">&nbsp;</td><td></td><td></td><td><?php echo __get_rupiah($v->wtotalall,1);?></td></tr>

		<tr><td>Payment</td><td style="width:200px"><input onkeyup="formatharga(this.value,this)" class="form-control" type="text" name="wpayment" value="<?php echo __get_rupiah($v -> wpayment,2);?>" ></td><td></td><td></td><td><?php echo __get_rupiah($v->wpayment,1);?></td></tr>
		
			
		
		<tr><td><input type=submit class="btn btn-primary" value="Save">
		<a href="<?php echo site_url('wishlist/home/wishlist_cancel/'.$id.'/'.$wtid); ?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin batalkan pemesanan ?');">Cancel Order</a>
		<a class="btn btn-primary" target=blank href="<?php echo site_url('wishlist/home/billing2/' . $v -> wid); ?>">Print </a>
		<?php if ($v -> wpayment && $v -> wbackpayment >= 0) : ?>
		<a class="btn btn-danger" href="<?php echo site_url('wishlist/home/billing_approve/' . $v -> wid); ?>">Approve </a>
		<?php endif; ?>
		</td><td></td><td></td><td></td><td><?php echo __get_rupiah(($v -> wpayment ? $v -> wbackpayment : 0),1);?></td></tr>
		</tfoot>
                            </table>							
							
			</form>				
							
                          </div>
                      </section>
                  </div>
              </div>
