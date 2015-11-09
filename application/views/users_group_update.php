      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_group"></i> Users Group Update</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo site_url()?>">Home</a></li>
						<li><i class="fa fa-users"></i>Users</li>
						<li><i class="icon_group"></i>Users Group</li>
						<li>Users Group Update</li>
					</ol>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Users Group Update
                          </header>
                          <div class="panel-body">
	<?php echo __get_error_msg(); ?>
                              <form class="form-horizontal " method="post" action="<?php echo site_url('users/users_group_update');?>">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Group Name</label>
                                      <div class="col-lg-10">
                                          <input type="text" name="name" class="form-control" placeholder="Group Name" value="<?php echo $group[0] -> gname; ?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Description</label>
                                      <div class="col-lg-10">
											<textarea name="desc" class="form-control" placeholder="Group Description"><?php echo $group[0] -> gdesc; ?></textarea>
                                      </div>
                                  </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Status</label>
                                            <?php echo __get_status($group[0] -> gstatus,2); ?>
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
		<td><label>Yes <?php if ($v -> aaccess == 1) { ?> <input class="uniform" type="radio" value="1" name="perm[<?php echo $v -> pid?>]" checked></label>&nbsp;<label> No <input class="uniform" type="radio" value="0" name="perm[<?php echo $v -> pid?>]"></label> <?php } else { ?><label><input class="uniform" type="radio" value="1" name="perm[<?php echo $v -> pid?>]"> No</label><label> <input class="uniform" type="radio" value="0" name="perm[<?php echo $v -> pid?>]" checked><label><?php } ?></td>
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
