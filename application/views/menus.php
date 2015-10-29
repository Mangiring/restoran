      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_balance"></i>Menus</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="./">Home</a></li>
						<li><i class="icon_balance"></i>Menus</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
	<?php echo __get_error_msg(); ?>
					<h3 class="box-title" style="margin-top:0;"><a href="<?php echo site_url('menus/menus_add'); ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add Menus</a></h3>
                      <section class="panel">
                          <header class="panel-heading">
                              List Menu
                          </header>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
          <th>Category</th>
          <th>Name</th>
          <th>Harga</th>
          <th>Discount</th>
          <th>Description</th>
          <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>
								  
		  <?php
		  foreach($menus as $k => $v) :
		  ?>
                                        <tr>
          <td><?php echo $v -> cname; ?></td>
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
                                <div class="box-footer clearfix">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <?php echo $pages; ?>
                                    </ul>
                                </div>

                      </section>
                  </div>
              </div>
