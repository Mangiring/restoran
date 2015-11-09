      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_archive_alt"></i> Inventory</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo site_url()?>">Home</a></li>
						<li><i class="icon_archive_alt"></i>Inventory</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
				  
                  <div class="col-lg-12">
					<div style="clear:both"></div>
	<?php echo __get_error_msg(); ?>
                      <section class="panel">
                          <header class="panel-heading">
                              Inventory
                          </header>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
          <th>Raw Material</th>
          <th>Stock Begining</th>
          <th>Stock In</th>
          <th>Stock Out</th>
          <th>Stock Retur</th>
          <th>Stock Final</th>
                                </tr>
                              </thead>
                              <tbody>
		  <?php
		  foreach($inventory as $k => $v) :
		  ?>
                                        <tr>
          <td><?php echo $v -> rname; ?></td>
          <td><?php echo $v -> istockbegining; ?></td>
          <td><?php echo $v -> istockin; ?></td>
          <td><?php echo $v -> istockout; ?></td>
          <td><?php echo $v -> istockretur; ?></td>
          <td><?php echo $v -> istock; ?></td>
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
