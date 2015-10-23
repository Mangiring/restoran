      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_calculator_alt"></i> Report Peti Cash</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="./">Home</a></li>
						<li><i class="icon_calculator_alt"></i>Report Peti Cash</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
				  
						  
                              <form class="form-horizontal " method="post">
                  <div class="col-lg-12">
					<h3 class="box-title" style="margin-top:0;width:30%;">Sort Date
					<br />
					<input name="sort" class="monthYearPicker form-control" style="float:left;width:180px;margin-right:5px;" placeholder="Sort Date" />&nbsp;
					<button type="submit" class="btn btn-primary" style="float:left"> <i class="icon_document"></i></button>
					</h3>
					<br />
					<div style="clear:both"></div>
	<?php echo __get_error_msg(); ?>
                      <section class="panel">
                          <header class="panel-heading">
                              List Transaction - <?php echo __get_month($bulan-2); ?> <?php echo $tahun; ?>
                          </header>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
          <th>Date</th>
          <th>Description</th>
          <th>Debit</th>
          <th>Credit</th>
          <th>Balance</th>
                                </tr>
                              </thead>
                              <tbody>
		  <?php
$tgl = '';
		  foreach($peti_cash as $k => $v) :
		  ?>
                                        <tr>
<td>
<?php
$date = date('Y-m-d',$v -> pdate);
if($tgl <> $date){
	$tgl = $date;
	echo __get_date(strtotime($tgl),1);
}
?></td>
          <td><?php echo $v -> pdesc; ?></td>
			<?php if ($v -> ptype == 1) : ?>
			<td><?php echo __get_rupiah($v -> pnominal,1); ?></td>
			<td>-</td>
			<?php else : ?>
			<td>-</td>
			<td><?php echo __get_rupiah($v -> pnominal,1); ?></td>
			<?php endif; ?>
          <td><?php echo __get_rupiah($v -> psaldo,1); ?></td>
										</tr>
        <?php endforeach; ?>
                              </tbody>
                              <tfoot>
                              <tr>
                              <td></td><td></td><td><b>Kas Besar:</b></td><td></td><td><b><?php echo __get_rupiah($kasbesar[0] -> total,1);?></b></td>
                              </tr>
                              <tr>
                              <td></td><td></td><td><b>Kas Kecil:</b></td><td></td><td><b><?php echo __get_rupiah($kaskecil[0] -> total,1);?></b></td>
                              </tr>
                              <tr>
                              <td></td><td></td><td><b>Biaya Operasional:</b></td><td></td><td><b><?php echo __get_rupiah($operasional[0] -> total,1);?></b></td>
                              </tr>
                              </tfoot>
                            </table>
                          </div>
                      </section>
                  </div>
                  </form>
              </div>

<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(function() {
	$('.monthYearPicker').datepicker({
		changeMonth: true,
		changeYear: true,
		showButtonPanel: true,
		dateFormat: 'mm/yy'
	}).focus(function() {
		var thisCalendar = $(this);
		$('.ui-datepicker-calendar').detach();
		$('.ui-datepicker-close').click(function() {
var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
thisCalendar.datepicker('setDate', new Date(year, month, 1));
		});
	});
});
});
</script>
