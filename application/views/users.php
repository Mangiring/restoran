      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-users"></i> Users</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo site_url()?>">Home</a></li>
						<li><i class="fa fa-users"></i>Users</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
	<?php echo __get_error_msg(); ?>
					<h3 class="box-title" style="margin-top:0;"><a href="<?php echo site_url('users/users_add'); ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add User</a></h3>
                      <section class="panel">
                          <header class="panel-heading">
                              List User
                          </header>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
          <th>Group</th>
          <th>Email</th>
          <th>History IP Address</th>
          <th>History Date</th>
          <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>
								  
		  <?php
		  foreach($users as $k => $v) :
		  $hist = explode('*', $v -> ulastlogin);
		  ?>
                                        <tr>
          <td><?php echo $v -> gname; ?></td>
          <td><?php echo $v -> uemail; ?></td>
          <td><?php echo (isset($hist[0]) && $hist[0] != '' ? long2ip($hist[0]) : ''); ?></td>
          <td><?php echo (isset($hist[1]) && $hist[1] != '' ? __get_date($hist[1],1) : ''); ?></td>
          <td><?php echo __get_status($v -> ustatus,1); ?></td>
											<td>
	<?php if ($v -> uid <> 1) : ?>
	
              <a class="btn btn-primary" href="<?php echo site_url('users/users_update/' . $v -> uid); ?>"><i class="fa fa-pencil"></i></a>
              <a class="btn btn-danger" href="<?php echo site_url('users/users_delete/' . $v -> uid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-times"></i></a>
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
