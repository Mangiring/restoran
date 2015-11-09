      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_cloud-upload"></i> Item Out</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo site_url()?>">Home</a></li>
						<li><i class="icon_cloud-upload"></i>Item Out</li>
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
                              Item Out
                          </header>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
          <th>Raw Material</th>
          <th>Stock Out</th>
          <th>Stock Final</th>
          <th></th>
                                </tr>
                              </thead>
                              <tbody>
		  <?php
		  foreach($itemout as $k => $v) :
		  ?>
                                        <tr>
          <td><?php echo $v -> rname; ?></td>
          <td><?php echo $v -> istockout; ?></td>
          <td><?php echo $v -> istock; ?></td>
		  <td><a class="btn btn-primary" href="<?php echo site_url('itemout/itemout_adjust/' . $v -> iid); ?>"><i class="fa fa-pencil"></i></a></td>
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
