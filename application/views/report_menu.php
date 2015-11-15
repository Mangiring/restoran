    <link href="<?php echo site_url('application/views/css/daterangepicker-bs3.css'); ?>" rel="stylesheet" />   
    <script src="<?php echo site_url('application/views/js/daterangepicker.js'); ?>"></script>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_balance"></i>Report Menu</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo site_url()?>">Home</a></li>
						<li><i class="icon_balance"></i>Report Menu</li>
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
					<?php if ($from && $to) : ?>
					<a href="<?php echo site_url('report_menu/export/excel?from='.$from.'&to=' . $to); ?>" class="btn btn-default"><i class="fa fa-file"></i> Export</a>
					<?php endif; ?>
					</h3>
					<div style="clear:both"></div>
	<?php echo __get_error_msg(); ?>
                      <section class="panel">
                          <header class="panel-heading">
                              List Menu <?php echo ($from ? '- ' . __get_date(strtotime($from),1) : ''); ?> <?php echo ($to ? __get_date(strtotime($to),1) : ''); ?>
                          </header>
                          <div class="table-responsive">
		  <?php
		  foreach($category as $k1 => $v1) :
		  ?>
		  <h3 style="padding-left:8px;border-bottom:1px solid #ccc"><?php echo $v1 -> cname; ?></h3>
                            <table class="table">
                              <thead>
                                <tr>
          <th style="width:30%">Name</th>
          <th style="width:10%">Harga</th>
          <th style="width:10%">Discount</th>
          <th style="width:40%">Description</th>
          <th style="width:10%">Total</th>
                                </tr>
                              </thead>
                              <tbody>
		  <?php
		  $rtotal = 0;
		  $htotal = 0;
		  $dsc = 0;
		  $menus = $this -> reportmenu_model -> __get_menu($v1 -> cid);
		  foreach($menus as $k => $v) :
		  $total = $this -> reportmenu_model -> __get_total_report_menu($v -> mid,$from,$to);
		  if ($total[0] -> totalmenu > 0) {
		  ?>
                                        <tr>
          <td><?php echo $v -> mname; ?></td>
          <td><?php echo __get_rupiah($v -> mharga,1); ?></td>
          <td><?php echo $v -> mdisc; ?>%</td>
          <td><?php echo substr($v -> mdesc,0,150); ?></td>
          <td><?php echo $total[0] -> totalmenu; ?></td>
										</tr>
        <?php
        $dsc = ($v -> mharga * $v -> mdisc) / 100;
        $htotal += ($v -> mharga - $dsc) * $total[0] -> totalmenu;
		}
		$rtotal += $total[0] -> totalmenu;
        endforeach;
        $menus = array();
        ?>
                              </tbody>
                              <tfoot>
                              <tr><td>Total</td><td><?php echo __get_rupiah($htotal,1); ?></td><td></td><td></td><td><?php echo $rtotal; ?></td></tr>
                              </tfoot>
                            </table>
        <?php endforeach; ?>
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
