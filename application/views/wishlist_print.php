
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
	
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">

                      <section class="panel">
                          <header class="panel-heading">
                              Wishlist Menu
                          </header>
						
                          <div class="table-responsive">
						
                            <table  class="gridtable" >
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
                               
          <tr><th>Meja</th><th><?php echo $tname; ?></th></tr>
		  <tr><th>Nama</th><th>
		  <?php echo $wname; ?></th></tr>
          <tr><th>Person</th><th>
		  <?php echo $person; ?></th></tr>
		  <tr><th valign=top >Notes</th><th>
		  <?php echo $notes; ?></th></tr>
         
                               
								
							<?php //} ?>
                              </thead>
                             
                            </table><br>
							
                           <table  class="gridtable" >
                              <thead>
                                <tr>
          <th>Menu</th>		  
		  <th>Qty</th>

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
		  
		  <td> <?php echo $v -> wqty;?></td>
        <!--td><?php //echo $v -> wqty; ?></td-->

		  <td>
         <?php echo $v->wnote; ?>
          </td>
										</tr>
        <?php 
		$t=$t+$v -> wqty;
		
		endforeach; ?>
		
                              </tbody>
		<tr><td>Total </td><td><?=$t;?></td><td></td></tr>
                            </table>							
							
			</form>				
							
                          </div>
                      </section>
                  </div>
              </div>
