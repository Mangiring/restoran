<script>
$(function(){
	var hs = window.location.hash;
	if (hs) {
	var ahs = hs.replace(/\#/g,'');
	if ($('table.'+ahs).hasClass('active')) return false;
	$('table.active').addClass('inactive');
	$('table.active').removeClass('active');
	$('table.'+ahs).addClass('active');
	$('ul.tabList > li').removeClass('on');
	$('ul.tabList > li > a[rel="'+ahs+'"]').parent().addClass('on');
	}
});
</script>

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
						  <div class="tabber">
						  <ul class="tabList">
	<?php
	$tz = 1;
	foreach($cat as $kk => $vv) {
	?>
						  <li class="<?php echo ($tz == 1 ? 'on' : '');?>"><a href="#tcid_<?php echo $vv -> cid; ?>" rel="tcid_<?php echo $vv -> cid; ?>"><?php echo $vv->cname;?></a></li>
						  <?php
						  ++$tz;
						  } ?>
						  </ul>
						  	</div>
                          <div class="table-responsive" style="padding:5px">
	<?php
		$ti = 1;
		foreach($cat as $kk => $vv) {
	?>
                            <table class="table <?php echo ($ti == 1 ? 'active' : 'inactive');?> tcid_<?php echo $vv -> cid; ?>">
                              <tbody>
		<tr>
          <td colspan="4" style="border:none"><h3 style="border-bottom:1px solid #ccc;padding-bottom:10px"><?php echo $vv->cname;?></h3></td>
		</tr>	  
		<tr>
			<td style="width:100%;border:none;">		  
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
		  $d=$d+1;
		  }?>						
        <?php endforeach; ?>
		</td></tr>
		</tbody>
		</table>
		<?php
		++$ti;
		}
		?>
                          </div>
                      </section>
                  </div>
              </div>
<script>
$(document).ready(function(){
	$('ul.tabList > li > a').click(function(){
		if ($('table.'+$(this).attr('rel')).hasClass('active')) return false;
		$('table.active').addClass('inactive');
		$('table.active').removeClass('active');
		$('table.'+$(this).attr('rel')).addClass('active');
		$('ul.tabList > li').removeClass('on');
		$(this).parent().addClass('on');
	});
});
</script>
