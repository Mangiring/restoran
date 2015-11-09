      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_puzzle"></i> Raw Material</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo site_url()?>">Home</a></li>
						<li><i class="icon_puzzle"></i>Raw Material</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
	<?php echo __get_error_msg(); ?>
					<h3 class="box-title" style="margin-top:0;"><a href="<?php echo site_url('raw_material/raw_material_add'); ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add Raw Material</a></h3>
                      <section class="panel">
                          <header class="panel-heading">
                              List Raw Material
                          </header>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
          <th>Name</th>
          <th>Description</th>
          <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>
								  
		  <?php
		  foreach($raw_material as $k => $v) :
		  ?>
                                        <tr>
          <td><?php echo $v -> rname; ?></td>
          <td><?php echo substr($v -> rdesc,0,150); ?></td>
          <td><?php echo __get_status($v -> rstatus,1); ?></td>
		  <td>
              <a class="btn btn-primary" href="<?php echo site_url('raw_material/raw_material_update/' . $v -> rid); ?>"><i class="fa fa-pencil"></i></a>
              <a class="btn btn-danger" href="<?php echo site_url('raw_material/raw_material_delete/' . $v -> rid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-times"></i></a>
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
