      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_calculator_alt"></i> Peti Cash</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo site_url()?>">Home</a></li>
						<li><i class="icon_calculator_alt"></i>Peti Cash</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
	<?php echo __get_error_msg(); ?>
					<h3 class="box-title" style="margin-top:0;"><a href="<?php echo site_url('peti_cash/peti_cash_add'); ?>" class="btn btn-default"><i class="fa fa-plus"></i> New Transaction</a></h3>
                      <section class="panel">
                          <header class="panel-heading">
                              List Transaction
                          </header>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
          <th>Date</th>
          <th>Transaction Type</th>
          <th>Nominal</th>
          <th>Saldo</th>
          <th>Description</th>
                                </tr>
                              </thead>
                              <tbody>
								  
		  <?php
		  foreach($peti_cash as $k => $v) :
		  ?>
                                        <tr>
          <td><?php echo __get_date($v -> pdate,1); ?></td>
          <td><?php echo __get_peti_cash_type($v -> ptype,1); ?></td>
          <td><?php echo __get_rupiah($v -> pnominal,1); ?></td>
          <td><?php echo __get_rupiah($v -> psaldo,1); ?></td>
          <td><?php echo $v -> pdesc; ?></td>
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
