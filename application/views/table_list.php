<?php //print_r($this->memcachedlib->sesresult['uid']);die;?>

	<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_cart"></i> Wishlist</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo site_url()?>">Home</a></li>
						<li><i class="icon_cart"></i>Wishlist</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
	<?php echo __get_error_msg(); ?>
					
                      <section class="panel">
						  
						  	
                          <div class="table-responsive" style="padding:5px">
							  <br />
                            <table class="table">
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
		  
		  $b= $d%4;
		  if( $v -> tstatus=='3') { $btnx="btn btn-dangerx";}else{$btnx="btn btn-primaryx";}
		  ?>
              <a class="<?=$btnx;?>"  href="<?php echo site_url('wishlist/home/wishlist_listx/' . $v -> tid); ?>"><?php echo $v -> tname;?></a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          
										
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
                      </section>
                  </div>
              </div>
