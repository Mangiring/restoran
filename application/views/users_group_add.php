      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_group"></i> Users Group Add</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo site_url()?>">Home</a></li>
						<li><i class="fa fa-users"></i>Users</li>
						<li><i class="icon_group"></i>Users Group</li>
						<li>Users Group Add</li>
					</ol>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Users Group Add
                          </header>
                          <div class="panel-body">
	<?php echo __get_error_msg(); ?>
                              <form class="form-horizontal " method="post" action="<?php echo site_url('users/users_group_add');?>">
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Group Name</label>
                                      <div class="col-lg-10">
                                          <input type="text" name="name" class="form-control" placeholder="Group Name">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Description</label>
                                      <div class="col-lg-10">
											<textarea name="desc" class="form-control" placeholder="Group Description"></textarea>
                                      </div>
                                  </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Status</label>
                                            <?php echo __get_status(0,2); ?>
                                        </div>
                                  <div class="form-group">
									  
                                      <div class="col-lg-12">
                                    <table class="table table-bordered">
      <thead>
		<tr>
		<th>Name</th>
		<th>Access</th>
		</tr>
      </thead>
      <tbody>
        <?php foreach($permission as $k => $v) : ?>
		<tr>
        <td><?php echo ($v -> pparent != 0 ? '-- '.$v -> pdesc.'' : $v -> pdesc); ?></td>
        <td><label>Yes <input type="radio" class="uniform" value="1" name="perm[<?php echo $v -> pid?>]"></label>&nbsp;<label> No <input class="uniform" type="radio" value="0" name="perm[<?php echo $v -> pid?>]" checked></label></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
      </table>
                            </div>
<br />
								</div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label"></label>
                                      <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Submit</button>
										<button class="btn btn-default" type="button" onclick="location.href='javascript:history.go(-1);'">Back</button>
                                    </div>
                                    </div>
                              </form>
                          </div>
                      </section>
                          </div>
