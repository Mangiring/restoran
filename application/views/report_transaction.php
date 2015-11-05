
    <link href="<?php echo site_url('application/views/css/daterangepicker-bs3.css'); ?>" rel="stylesheet" />   
    <script src="<?php echo site_url('application/views/js/daterangepicker.js'); ?>"></script>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_grid-3x3"></i> Report Transaction</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="./">Home</a></li>
						<li><i class="icon_grid-3x3"></i>Report Transaction</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
				  
						  
                              <form class="form-horizontal " method="post">
                  <div class="col-lg-12">
					<h3 class="box-title" style="margin-top:0;width:30%;">Sort Date
					<br />
					<input name="sort" id="datesort" class="daterange form-control" style="float:left;width:180px;margin-right:5px;" placeholder="Sort Date" />&nbsp;
					<button type="submit" class="btn btn-primary" style="float:left"> <i class="icon_document"></i></button>
					</h3>
					<br />
					<div style="clear:both"></div>
					<h3 class="box-title" style="margin-top:0;"><a href="<?php echo site_url('report_transaction/cleanup'); ?>" class="btn btn-default"><i class="fa fa-trash-o"></i> Clear</a></h3>
					<div style="clear:both"></div>
	<?php echo __get_error_msg(); ?>
                      <section class="panel">
                          <header class="panel-heading">
                              List Transaction - <?php echo __get_date(strtotime($from),1); ?> <?php echo __get_date(strtotime($to),1); ?>
                          </header>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
          <th>Date</th>
          <th>Time</th>
          <th>Table</th>
          <th>Name</th>
          <th>Person</th>
          <th>Bruto</th>
          <th>Netto</th>
		  <th>Status</th>
		  <th>Detail</th>
                                </tr>
                              </thead>
                              <tbody>
		  <?php
$tgl = 0;
$total = 0;
$total2 = 0;
$totalperson = 0;
		  foreach($transaction as $k => $v) :
		  ?>
                                        <tr>
<td>
<?php
$date = date('Y-m-d',strtotime($v -> wdate));
if($tgl <> $date){
	$tgl = $date;
	echo __get_date(strtotime($tgl),1);
}
?></td>
          <td><?php echo date('H:i',strtotime($v -> wdate)); ?></td>
          <td><?php echo $v -> tname; ?></td>
          <td><?php echo $v -> wname; ?></td>
          <td><?php echo $v -> person; ?></td>
			<td><?php echo __get_rupiah($v -> wtotal,1); ?></td>
			<td><?php echo __get_rupiah($v -> wtotalall,1); ?></td>
			<td><?php echo ($v -> wstatus == 2 ? 'Cancel' : 'Approved'); ?></td>
			<td><a href="<?php echo site_url('report_transaction_detail/home/index/'.$v -> wid);?>">Detail</a></td>
										</tr>
        <?php
        $totalperson += $v -> person;
        $total += $v -> wtotal;
        $total2 += $v -> wtotalall;
        endforeach; ?>
                              </tbody>
                              <tfoot>
                              <tr><td></td><td></td><td></td><td>Total</td><td><?php echo $totalperson;?></td><td><?php echo __get_rupiah($total,1); ?></td><td><?php echo __get_rupiah($total2,1); ?></td><td></td></tr>
                              </tfoot>
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
