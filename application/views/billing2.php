  <!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
table.gridtable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}
table.gridtable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
table.gridtable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
</style>

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
				<!--div class="col-lg-12">
					<h3 class="page-header"><i class="icon_genius"></i> Billing</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="./">Home</a></li>
						<li><i class="icon_genius"></i>Tables</li>
					</ol>
				</div-->
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
	<?php echo __get_error_msg(); ?>
					<!--h3 class="box-title" style="margin-top:0;"><a id="iframe" href="<?php echo site_url('wishlist/home/wishlist_add/'.$id); ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add Menu</a></h3-->
                      <section class="panel">
                          <header class="panel-heading">
                              Billing
                          </header><br><br>
						  <!--p><a id='iframe' href="../../../application/views/jquery.min.js">Outside Webpage (Iframe)</a></p-->
						  	<!--p><a id='iframe' href="application/views/jquery.min.js">Outside Webpage (Iframe)</a></p>
							<p><a id='iframe' href="application/views/jquery.min.js">Outside Webpage (Iframe2)</a></p-->
                          <div class="table-responsive">
						  <form method=POST>
                            <table  class="table">
                              <thead align=left >
						<?php			
//print_r($wishlist);						
								  foreach($wishlist as $k => $v) {
									  $wname=$v -> wname;
									  $wstatus=$v -> wstatus;
									  $wtid=$v -> wtid;
									  $tname=$v -> tname;
								  }
							$wcount= count($wishlist);
							if($wcount==0){
										$wname="";
									  $wstatus="";
									  $wtid="";
									  $tname="";
								
							}
							//if($wcount>0){  
						?>
                                <tr>
          <th>Meja</th><th><?php echo $tname; ?></th><th></th></tr>
		  <th>Nama</th><th><?php echo $wname; ?>
		  <input type=hidden name="wname" value="<?php echo $wname; ?>" ></th><th></th></tr>
         
          <th>Status</th><th><?php echo __get_status($wstatus,1); ?></th><th></th></tr>
                                </tr>
								
							<?php //} ?>
                              </thead>
                              
                            </table><br><br>
							
                            <table  class="gridtable" >
                              <thead align=left >
                                <tr>
          <th>Menu</th>
		  <th>Qty</th>
         <th>Harga</th>
		 <th>Discount</th>
		 <th>Total</th>
          <!--th>Status</th-->
                                </tr>
                              </thead>
                              <tbody>
								  
		  <?php
		  if(!isset($_POST['ppn'])){ $_POST['ppn']=0;}
		  if(!isset($_POST['discc'])){ $_POST['discc']=0;}
		  $t=0;
		  //echo $_POST['discc'];
		  //die;
		  $discc=$_POST['discc'];
		  $ppn=$_POST['ppn'];
		  foreach($wishlist as $k => $v) :
		  ?>
		
                                        <tr>
          
		  <td><input type=hidden name="wdid[]" value="<?php echo $v -> wdid; ?>" >
		  <input type=hidden name="harga[]" value="<?php echo $v -> wharga; ?>" >
		  <?php echo $v -> mname; ?></td>
		  <td><?php echo $v -> wqty;?></td>
		<td><?php echo __get_rupiah($v -> wharga,1);?></td>
		<td>
		
		<?php echo $v -> wdisc;
		$total=($v -> wqty * $v -> wharga) - (($v -> wqty) * ($v -> wharga) * ($v -> wdisc) /100) ;
		$tdis=$total * $discc /100;
		$tppn=$total * $ppn /100;
		$totaldis=$total-($total * $discc /100) - ($total * $ppn /100);
		
		$t=$totaldis+$t;
		?> %
		
		</td>
		<td><?php echo __get_rupiah($total,1);?></td>
          <!--td><?php echo __get_status($v -> wstatus,1); ?></td-->
		  
										</tr>
        <?php endforeach; ?>
		
                              </tbody>
		<tr><td>Before Tax </td><td></td><td></td><td></td><td><?php echo __get_rupiah($v -> wtotal,1);?></td></tr>		<?php 
		$tppn=($v -> wtotal*$v -> wppn/100);
		$tdis=($v -> wtotal*$v -> wdis/100);
		?>						  
			<tr><td>Discount</td><td><?=$v -> wdis;?> %</td><td></td><td></td><td><?php echo __get_rupiah($tdis,1);?></td></tr>					  
		<tr><td>PPN</td><td><?php echo __get_rupiah($v -> wppn,1);?>%</td>

		
		<td></td><td></td><td><?php echo __get_rupiah($tppn,1);?></td></tr>					  
		<tr><td><!--input type=submit --></td><td></td><td></td><td></td><td><?php echo __get_rupiah($v -> wtotalall,1);?></td></tr>
                            </table>							
							
			</form>				
							
                          </div>
                      </section>
                  </div>
              </div>
