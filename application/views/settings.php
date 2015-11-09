      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_cog"></i> Settings</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo site_url()?>">Home</a></li>
						<li><i class="icon_cog"></i>Settings</li>
					</ol>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Settings
                          </header>
                          <div class="panel-body">
	<?php echo __get_error_msg(); ?>
                              <form class="form-horizontal " method="post" action="<?php echo site_url('settings/settings');?>">
	<input type="hidden" name="uid" value="<?php echo $this -> memcachedlib -> sesresult['uid']; ?>">
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Email</label>
                                      <div class="col-lg-10">
                                          <input type="text" name="uemail" value="<?php echo $this -> memcachedlib -> sesresult['uemail']; ?>" readonly class="form-control">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Old Password</label>
                                      <div class="col-lg-10">
                                          <input type="password" name="oldpass" class="form-control">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">New PAssword</label>
                                      <div class="col-lg-10">
                                          <input type="password" name="newpass" class="form-control">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Confirm Password</label>
                                      <div class="col-lg-10">
                                          <input type="password" name="confpass" class="form-control">
                                      </div>
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
