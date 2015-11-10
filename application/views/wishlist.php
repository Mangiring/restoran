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
						<li><i class="fa fa-home"></i><a href="<?php echo site_url(); ?>">Home</a></li>
						<li><i class="icon_cart"></i>Wishlist</li>
						<li>Wishlist Order</li>
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
                          <div class="table-responsive">
						  <form method=POST >
                            <table class="table">
                              <thead>
						<?php
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
									  $tname="";
									  $person="";
									  $notes="";
									  $note="";
								
							}
						?>
                                <tr>
          <th>Meja</th><th><?php echo $tname; ?></th></tr>
		  <tr><th>Nama</th><th>
		  <input type=text name="wname" class="form-control" value="<?php echo ($wname ? $wname : ($tname ? $tname : 'Table')); ?>" ></th></tr>
          <tr><th>Person</th><th>
		  <select name="person" style="width:150px" class="form-control">
		  <?php for($i=0;$i<=50;++$i) : ?>
		  <?php if ($person == $i) : ?>
		  <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
		  <?php else : ?>
		  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
		  <?php endif; ?>
		  <?php endfor;?>
		  </select>
		  </th></tr>
		  <!--tr><th valign=top >Notes</th><th>
		  <textarea class="form-control" name="notes"><?php echo $notes; ?></textarea ></th></tr-->
		  <input type=hidden name="notes">
                              </thead>
                              <tbody>
								  
		  
                              </tbody>
                            </table><br>
							
                            <table class="table">
                              <thead>
                                <tr>
          <th style="width:50px"></th>		  
          <th>Menu</th>		  
		  <th>Qty</th>
         <th>Harga</th>
		 <th>Total</th>
		  <th>Notes</th>
		  <th></th>
                                </tr>
                              </thead>
                              <tbody>
								  
		  <?php
		  $ckprint = false;
		  $t=0;
		  foreach($wishlist as $k => $v) :
		  if ($v -> wqty > 0) {
			  $ckprint = true;
		  }
		  else {
			  $ckprint = false;
			  break;
		  }
		  endforeach;
		  
		  foreach($wishlist as $k => $v) :
		  ?>
          <tr>
          <td><input type="checkbox" value="<?php echo $v -> wdid; ?>" name="adp[]" class="adp"></td>
          
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
		<td><?php echo __get_rupiah($v -> wharga,1);
		$total=$v -> wqty * $v -> wharga;
		$t=$total+$t;
		?></td>
		<td><?php echo __get_rupiah($total,1); ?></td>
		  <td>
              <textarea class="form-control" name="note[]"><?php echo $v->wnote; ?></textarea >
          </td>
		  <td>
              <a class="btn btn-danger" href="<?php echo site_url('wishlist/home/wishlist_menu_delete/' . $v -> wdid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-times"></i></a>
          </td>
										</tr>
        <?php endforeach; ?>
		
                              </tbody>
		<tr><td></td><td>
                                        <button type="submit" class="btn btn-primary" id="simpan"> <i class="fa fa-save"></i> Submit</button>
										<a href="<?php echo site_url('wishlist/home/wishlist_cancel/'.$id.'/'.$wtid); ?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin batalkan pemesanan ?');">Cancel</a>
										<?php if ($ckprint == true) : ?>
										<a href="javascript:void(0);" rel="<?php echo site_url('wishlist/home/wishlist_print/'.$id.'/'.$wtid); ?>" class="btn btn-primary adprint">Print</a>
										<?php endif; ?>
										<button class="btn btn-default" type="button" onclick="location.href='<?php echo site_url('wishlist'); ?>'">Back</button>
		</td><td></td><td></td><td><?php echo __get_rupiah($t,1);?></td><td></td></tr>
                            </table>
			</form>
                          </div>
                      </section>
                  </div>
              </div>
<script type="text/javascript">
$('#simpan').click(function(){
	var person = $('select[name="person"]').val();
	$('div.alert-danger').remove();
	if (person == 0) {
		$('.row > .col-lg-12').append('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Person harus di isi !!!</div>');
		return false;
	}
	return true;
});
$('a.adprint').click(function(){
	var foo = '';
	$('.adp').each(function(){
		if ($(this).val() > 0 && $(this).is(':checked')) {
			foo += $(this).val()+'+';
		}
	});
	window.open($(this).attr('rel')+'?'+foo, '_blank');
});
</script>
