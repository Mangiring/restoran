      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_balance"></i>Menus</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo site_url()?>">Home</a></li>
						<li><i class="icon_balance"></i>Menus</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
	<?php echo __get_error_msg(); ?>
					<h3 class="box-title" style="margin-top:0;"><a href="<?php echo site_url('menus/menus_add'); ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add Menu</a></h3>
                      <section class="panel">
                          <header class="panel-heading">
                              List Menu
                          </header>
						  <div class="tabber">
						  <ul class="tabList">
	<?php
	$tz = 1;
	foreach($categories as $kk => $vv) {
	?>
						  <li class="<?php echo ($tz == 1 ? 'on' : '');?>"><a href="#tcid_<?php echo $vv -> cid; ?>" rel="tcid_<?php echo $vv -> cid; ?>"><?php echo $vv->cname;?></a></li>
						  <?php
						  ++$tz;
						  } ?>
						  </ul>
						  	</div>
                          <div class="table-responsive">
	<?php
	$i = 1;
	foreach($categories as $kk => $vv) {
	?>
	<h3 style="border-bottom:1px solid #ccc;padding-bottom:10px;padding-left:10px" class="<?php echo ($i == 1 ? 'active' : 'inactive');?> tcid_<?php echo $vv -> cid; ?>"><?php echo $vv->cname;?></h3>
	<div class="<?php echo ($i == 1 ? 'active' : 'inactive');?> tcid_<?php echo $vv -> cid; ?>">
                            <table class="table">
                              <thead>
                                <tr>
          <th>Name</th>
          <th>Harga</th>
          <th>Discount</th>
          <th>Description</th>
          <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>
								  
		  <?php
		  $menus = $this -> menus_model -> __get_menus($vv -> cid);
		  foreach($menus as $k => $v) :
		  ?>
                                        <tr>
          <td><?php echo $v -> mname; ?></td>
          <td><?php echo __get_rupiah($v -> mharga,1); ?></td>
          <td><?php echo $v -> mdisc; ?>%</td>
          <td><?php echo substr($v -> mdesc,0,150); ?></td>
          <td><?php echo __get_status($v -> mstatus,1); ?></td>
		  <td>
              <a class="btn btn-primary" href="<?php echo site_url('menus/menus_update/' . $v -> mid); ?>"><i class="fa fa-pencil"></i></a>
              <a class="btn btn-danger" href="<?php echo site_url('menus/menus_delete/' . $v -> mid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-times"></i></a>
          </td>
										</tr>
        <?php endforeach; ?>
                              </tbody>
                            </table>
                          </div>
		<?php
		++$i;
		}
		?>
                          </div>
                      </section>
                  </div>
              </div>

<script>
$(document).ready(function(){
	$('ul.tabList > li > a').click(function(){
		if ($('div.'+$(this).attr('rel')).hasClass('active')) return false;
		$('div.active').addClass('inactive');
		$('div.active').removeClass('active');
		$('h3.active').addClass('inactive');
		$('h3.active').removeClass('active');
		$('div.'+$(this).attr('rel')).addClass('active');
		$('h3.'+$(this).attr('rel')).addClass('active');
		$('ul.tabList > li').removeClass('on');
		$(this).parent().addClass('on');
	});
});
</script>
