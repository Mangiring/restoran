
    <link href="<?php echo site_url('application/views/css/daterangepicker-bs3.css'); ?>" rel="stylesheet" />   
    <script src="<?php echo site_url('application/views/js/daterangepicker.js'); ?>"></script>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_cloud-upload"></i> Report Item Out</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo site_url()?>">Home</a></li>
						<li><i class="icon_cloud-upload"></i>Report Item Out</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
				  
						  
                              <form class="form-horizontal " method="post">
                  <div class="col-lg-12">
					<h3 class="box-title" style="margin-top:0;width:30%;">Sort Date
					<br />
					<input name="sort" id="datesort" class="form-control" style="float:left;width:180px;margin-right:5px;" placeholder="Sort Date" />&nbsp;
					<button type="submit" class="btn btn-primary" style="float:left"> <i class="icon_document"></i></button>
					</h3>
					<br />
					<div style="clear:both"></div>
					<h3 class="box-title" style="margin-top:0;">
<!--
						<a href="<?php echo site_url('report_timeout/cleanup'); ?>" class="btn btn-default"><i class="fa fa-trash-o"></i> Clear</a>
-->
					<?php if ($from && $to) : ?>
					<a href="<?php echo site_url('report_itemout/export/excel?from='.$from.'&to=' . $to); ?>" class="btn btn-default"><i class="fa fa-file"></i> Export</a>
					<?php endif; ?>
					</h3>
					<div style="clear:both"></div>
	<?php echo __get_error_msg(); ?>
                      <section class="panel">
                          <header class="panel-heading">
                              List Opname <?php echo ($from ? '- ' . __get_date(strtotime($from),1) : ''); ?> <?php echo ($to ? __get_date(strtotime($to),1) : ''); ?>
                          </header>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
          <th>Date</th>
          <th>Time</th>
          <th>Raw Material</th>
          <th>Stock Out</th>
          <th>Stock Final</th>
          <th>Material Left</th>
          <th>Description</th>
                                </tr>
                              </thead>
                              <tbody>
		  <?php
		  $tgl = '';
		  foreach($report_itemout as $k => $v) :
		  ?>
                                        <tr>
<td>
<?php
$date = date('Y-m-d',$v -> idate);
if($tgl <> $date){
	$tgl = $date;
	echo __get_date(strtotime($tgl),1);
}
?></td>
          <td><?php echo date('H:i',$v -> idate); ?></td>
          <td><?php echo $v -> rname; ?></td>
          <td><?php echo $v -> istockout; ?></td>
          <td><?php echo $v -> istock; ?></td>
          <td><?php echo $v -> iadjust; ?></td>
          <td><?php echo $v -> idesc; ?></td>
										</tr>
        <?php endforeach; ?>
                              </tbody>
                            </table>
                          </div>
                      </section>
                  </div>
                  </form>
              </div>

<script type='text/javascript'>//<![CDATA[
$(function(){
	$('#datesort').daterangepicker();
});
</script>
