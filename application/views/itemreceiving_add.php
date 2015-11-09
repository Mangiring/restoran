<link rel="stylesheet" 
href="<?php echo site_url('application/views/assets/colorbox/colorbox.css'); ?>" />
		<script src="<?php echo site_url('application/views/assets/colorbox/jquery.min.js'); ?>"></script>
		<script src="<?php echo site_url('application/views/assets/colorbox/jquery.colorbox.js'); ?>"></script>
		<script>
			$(document).ready(function(){

		
				$("#iframe").colorbox({iframe:true, width:"80%", height:"80%",onClosed:function(){
       window.location.reload();
    }});
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
					<h3 class="page-header"><i class="icon_cloud-download"></i> Item Receiving Add</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo site_url()?>">Home</a></li>
						<li><i class="icon_cloud-download"></i>Item Receiving</li>
						<li>Item Receiving Add</li>
					</ol>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Item Receiving Add
                          </header>
                          <div class="panel-body">
	<?php echo __get_error_msg(); ?>
                              <form class="form-horizontal " method="post" action="<?php echo site_url('itemreceiving/itemreceiving_add');?>">
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Name</label>
                                      <div class="col-lg-10">
                                          <input type="text" name="title" class="form-control" placeholder="Title">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Description</label>
                                      <div class="col-lg-10">
											<textarea name="desc" class="form-control" placeholder="Category Description"></textarea>
                                      </div>
                                  </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Status</label>
                                            <?php echo __get_status(0,2); ?>
                                        </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label"></label>
                                      <div class="col-lg-10">
										<a href="<?php echo site_url('itemreceiving/receiving_list/1'); ?>" class="btn btn-default" id="iframe">Add Raw Material</a>
                                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Submit</button>
										<button class="btn btn-default" type="button" onclick="location.href='javascript:history.go(-1);'">Back</button>
                                    </div>
                                    </div>
                          </div>
                      </section>

                      <section class="panel">
                            <table class="table">
                              <thead>
                                <tr>
          <th>Name</th>
          <th>Description</th>
          <th>QTY</th>
          <th></th>
                                </tr>
                              </thead>
                              <tbody>
								  
		  <?php
		  foreach($material as $k => $v) :
		  ?>
                                        <tr>
											<input type="hidden" name="rid[]" value="<?php echo $v -> rid; ?>">
          <td><?php echo $v -> rname; ?></td>
          <td><?php echo substr($v -> rdesc,0,150); ?></td>
          <td style="width:100px"><input type="number" name="qty[]" class="form-control"></td>
          <td>
              <a class="btn btn-danger" href="<?php echo site_url('itemreceiving/receiving_rawmaterial_delete/1/?rid=' . $v -> rid); ?>"><i class="fa fa-times"></i></a>
          </td>
										</tr>
        <?php endforeach; ?>
                              </tbody>
                            </table>
                      </section>
                              </form>
                          </div>
