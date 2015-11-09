      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_group"></i> Users Group</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo site_url()?>">Home</a></li>
						<li><i class="fa fa-users"></i>Users</li>
						<li><i class="icon_group"></i>User Group</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
	<?php echo __get_error_msg(); ?>
					<h3 class="box-title" style="margin-top:0;"><a href="<?php echo site_url('users/users_group_add'); ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add User Group</a></h3>
                      <section class="panel">
                          <header class="panel-heading">
                              List User Group
                          </header>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
          <th>Group Name</th>
          <th>Description</th>
          <th>Status</th>
          <th></th>
                                </tr>
                              </thead>
                              <tbody>
		  <?php foreach($group as $k => $v) : ?>
        <tr>
          <td><?php echo $v -> gname; ?></td>
          <td><?php echo $v -> gdesc; ?></td>
          <td><?php echo __get_status($v -> gstatus,1); ?></td>
          <td>
			 <?php if ($v -> gid <> 1) : ?>
              <a class="btn btn-primary" href="<?php echo site_url('users/users_group_update/' . $v -> gid); ?>"><i class="fa fa-pencil"></i></a>
              <a class="btn btn-danger" href="<?php echo site_url('users/users_group_delete/' . $v -> gid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-times"></i></a>
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
