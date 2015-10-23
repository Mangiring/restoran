

	<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_cart"></i> Billing</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="./">Home</a></li>
						<li><i class="icon_cart"></i>Tables</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
	  <?php echo __get_error_msg();?>
					<!--h3 class="box-title" style="margin-top:0;"><a href="<?php echo site_url('tables/tables_add'); ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add Tables</a></h3-->
                      <section class="panel">
						  
						  	<!--p><a id='iframe' href="application/views/jquery.min.js">Outside Webpage (Iframe)</a></p>
							<p><a id='iframe' href="application/views/jquery.min.js">Outside Webpage (Iframe2)</a></p-->
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <!--tr>
          <th>Name</th>
		  <th>Lantai</th>
          <th>Description</th>
          <th>Status</th>
                                </tr-->
                              </thead>
                              <tbody>
							  
							  
	<?php 
		foreach($cat as $kk => $vv){	
	?>					  
	 <tr>
          <td colspan=4 ><h3><?=$vv->cname;?></h3></td>	
		  <td>&nbsp;</td>
	</tr>							  
							  
		<tr><td>
								  
		  <?php
		  $d=0;
		  foreach($tables as $k => $v) :
		  ?>
		  <?php if ( $v -> cid == $vv->cid){ 
		  
		  ?>
                                        
     
          
		  <?php  
		  $b= $d%4;
		  if( $v -> tstatus=='3') { $btnx="btn btn-danger"; 
		  $link=site_url('wishlist/home/billing_list/' . $v -> tid);
		  }else{$btnx="btn btn-primary";$link="";}
		  ?>
              <a class="<?=$btnx;?>"  href="<?php echo $link; ?>"><?php echo $v -> tname;?></a>
              <!--a class="btn btn-danger" href="<?php //echo site_url('tables/tables_delete/' . $v -> tid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-times"></i></a-->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          
										
		  <?php 
		  if($b==3){echo "<br><br>";}
		  $d=$d+1;
		  }?>						
        <?php endforeach; ?>
		</td></tr>
		<?php } ?>
                              </tbody>
                            </table>
                          </div>
                                <div class="box-footer clearfix">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <?php echo $pages; ?>
                                    </ul>
                                </div>

                      </section>
                  </div>
              </div>
