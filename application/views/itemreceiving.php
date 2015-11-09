
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_cloud-download"></i> Item Receiving</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo site_url()?>">Home</a></li>
						<li><i class="icon_cloud-download"></i>Item Receiving</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
				  
                  <div class="col-lg-12">
					<div style="clear:both"></div>
					<h3 class="box-title" style="margin-top:0;"><a href="<?php echo site_url('itemreceiving/itemreceiving_add'); ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add Receiving</a></h3>
	<?php echo __get_error_msg(); ?>
                      <section class="panel">
                          <header class="panel-heading">
                              Item Receiving
                          </header>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
          <th>Date</th>
          <th>Title</th>
          <th>Description</th>
          <th>Status</th>
          <th></th>
                                </tr>
                              </thead>
                              <tbody>
		  <?php
		  $tgl = '';
		  foreach($itemreceiving as $k => $v) :
		  ?>
                                        <tr>
          <td>
<?php
$date = date('Y-m-d',$v -> rdate);
if($tgl <> $date){
	$tgl = $date;
	echo __get_date(strtotime($tgl),1);
}
?>
          </td>
          <td><?php echo $v -> rtitle; ?></td>
          <td><?php echo $v -> rdesc; ?></td>
          <td><?php echo ($v -> rstatus == 3 ? '<b>Approved</b>' : __get_status($v -> rstatus,1)); ?></td>
		  <td>
			  <?php if ($v -> rstatus <> 3) : ?>
              <a class="btn btn-primary" href="<?php echo site_url('itemreceiving/itemreceiving_update/' . $v -> rid); ?>"><i class="fa fa-pencil"></i></a>
              <a class="btn btn-danger" href="<?php echo site_url('itemreceiving/itemreceiving_delete/' . $v -> rid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-times"></i></a>
              <?php endif; ?>
		  </td>
										</tr>
        <?php endforeach; ?>
                              </tbody>
                            </table>
                          </div>
                                <div class="box-footer clearfix">
                                    <div class="pull-right">
                                        <?php echo $pages; ?>
                                    </div>
                                </div>

                      </section>
                  </div>
              </div>
