<link rel="stylesheet" 
href="<?php echo site_url('application/views/assets/colorbox/colorbox.css'); ?>" />
		<script src="<?php echo site_url('application/views/assets/colorbox/jquery.min.js'); ?>"></script>
		<script src="<?php echo site_url('application/views/assets/colorbox/jquery.colorbox.js'); ?>"></script>
		<script>
			$(document).ready(function(){

		
				$("#iframe").colorbox({iframe:true, width:"80%", height:"80%"});
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
				
				//Example of preserving a JavaScript event for inline calls.
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
					<h3 class="page-header"><i class="icon_cart"></i> Wishlist</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="./">Home</a></li>
						<li><i class="icon_cart"></i>Wishlist</li>
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
                              Wishlist Menu
                          </header>
						  <!--p><a id='iframe' href="../../../application/views/jquery.min.js">Outside Webpage (Iframe)</a></p-->
						  	<!--p><a id='iframe' href="application/views/jquery.min.js">Outside Webpage (Iframe)</a></p>
							<p><a id='iframe' href="application/views/jquery.min.js">Outside Webpage (Iframe2)</a></p-->
                          <div class="table-responsive">
						  <form method=POST >
                            <table class="table">
                              <thead>
						<?php			
//print_r($wtid);						
								  foreach($wishlist as $k => $v) {
									  $wname=$v -> wname;
									  $wstatus=$v -> wstatus;
									  $wtid=$wtid;
									  $tname=$v -> tname;
									  $person=$v -> person;
									  $notes=$v -> wnotes;
									  $note=$v -> wnote;
								  }
							$wcount= count($wishlist);
							if($wcount==0){
										$wname="";
									  $wstatus="";
									  //$wtid="";
									  $tname="";
									  $person="";
									  $notes="";
									  $note="";
								
							}
							//if($wcount>0){  
						?>
                                <tr>
          <th>Meja</th><th><?php echo $tname; ?></th></tr>
		  <tr><th>Nama</th><th>
		  <input type=text name="wname" class="form-control" value="<?php echo ($wname ? $wname : $tname); ?>" ></th></tr>
          <tr><th>Person</th><th>
		  <input type=number class="form-control" name="person" value="<?php echo $person; ?>" ></th></tr>
		  <!--tr><th valign=top >Notes</th><th>
		  <textarea class="form-control" name="notes"><?php echo $notes; ?></textarea ></th></tr-->
		  <input type=hidden name="notes">
          <th>Status</th><th><?php echo __get_status($wstatus,1); ?></th></tr>
                                </tr>
								
							<?php //} ?>
                              </thead>
                              <tbody>
								  
		  
                              </tbody>
                            </table><br>
							
                            <table class="table">
                              <thead>
                                <tr>
          <th>Menu</th>		  
		  <th>Qty</th>
         <th>Harga</th>
		 <th>Total</th>
          <th>Status</th>
		  <th>Notes</th>
                                </tr>
                              </thead>
                              <tbody>
								  
		  <?php
		  $t=0;
		 //print_r($wishlist);die;
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
        <!--td><?php //echo $v -> wqty; ?></td-->
		<td><?php echo __get_rupiah($v -> wharga,1);
		$total=$v -> wqty * $v -> wharga;
		$t=$total+$t;
		?></td>
		<td><?php echo __get_rupiah($total,1); ?></td>
          <td><?php echo __get_status($v -> wstatus,1); ?></td>
		  <td>
              <textarea class="form-control" name="note[]"><?php echo $v->wnote; ?></textarea >
          </td>
										</tr>
        <?php endforeach; ?>
		
                              </tbody>
		<tr><td>
                                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Submit</button>
										<a href="<?php echo site_url('wishlist/home/wishlist_cancel/'.$id.'/'.$wtid); ?>" class="btn btn-danger">Cancel</a>
										<a target=blank href="<?php echo site_url('wishlist/home/wishlist_print/'.$id.'/'.$wtid); ?>" class="btn btn-primary">Print</a>
										<button class="btn btn-default" type="button" onclick="location.href='javascript:history.go(-1);'">Back</button>
		</td><td></td><td></td><td><?=$t;?></td></tr>
                            </table>							
							
			</form>				
							
                          </div>
                      </section>
                  </div>
              </div>
