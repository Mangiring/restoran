

	<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_currency"></i> Billing</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo site_url()?>">Home</a></li>
						<li><i class="icon_currency"></i>Billing</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
	  <?php echo __get_error_msg();?>
					
                      <section class="panel">
						  
                          <div class="table-responsive" style="padding:5px">
							  
							  
	<?php 
		foreach($cat as $kk => $vv){	
	?>					  
                            <table class="table">
                              <tbody>
	 <tr>
          <td colspan="3"><h3><?=$vv->cname;?></h3></td>	
		  <td>&nbsp;</td>
	</tr>							  
	<tr><th>Nama</th><th>Customer Name</th><th>Status</th><th>Table</th></tr>						  
		
								  
		  <?php
		  $d=0;
		  foreach($tables as $k => $v) :
		  ?>
		  <?php if ($v -> cid == $vv -> cid) { ?>
		  <?php  
		  $b= $d%4;
		  if( $v -> tstatus=='3') { $btnx="btn btn-dangerx"; $st="Isi";
		  $link=site_url('wishlist/home/billing_list/' . $v -> tid);
		  }else{$btnx="btn btn-primaryx";$link="javascript:void(0);"; $st="Kosong"; $v -> wname="-";
		  $v -> person="-";}
		  ?>
             <tr><td><?=$v -> wname;?></td><td><?=$v -> person;?></td><td><?=$st;?></td><td> <a class="<?=$btnx;?>"  href="<?php echo $link; ?>"><?php echo $v -> tname;?></a></td></tr>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <?php
		  $d=$d+1;
		  }
		  ?>				
        <?php endforeach; ?>
                              </tbody>
                            </table>
		
		<?php } ?>
                          </div>
                      </section>
                  </div>
              </div>
