      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_genius"></i> Table Add</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="./">Home</a></li>
						<li><i class="icon_genius"></i>Tables</li>
						<li>Table Add</li>
					</ol>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Table Add
                          </header>
                          <div class="panel-body">
	<?php echo __get_error_msg(); ?>
                              <form class="form-horizontal " method="post" action="<?php echo site_url('tables/tables_add');?>">
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Category</label>
                                      <div class="col-lg-10">
                                            <select class="form-control" name="cid">
												<?php echo $category; ?>
                                            </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Name</label>
                                      <div class="col-lg-10">
                                          <input type="text" name="name" class="form-control" placeholder="Table Name">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Description</label>
                                      <div class="col-lg-10">
											<textarea name="desc" class="form-control" placeholder="Table Description"></textarea>
                                      </div>
                                  </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Status</label>
                                            <?php echo __get_status(0,2); ?>
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
