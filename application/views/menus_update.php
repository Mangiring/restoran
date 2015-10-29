      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_balance"></i> Menu Update</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="./">Home</a></li>
						<li><i class="icon_balance"></i>Menus</li>
						<li>Menu Update</li>
					</ol>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Menu Update
                          </header>
                          <div class="panel-body">
	<?php echo __get_error_msg(); ?>
                              <form class="form-horizontal " method="post" action="<?php echo site_url('menus/menus_update');?>">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
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
                                          <input type="text" placeholder="Menu Name" name="name" class="form-control" value="<?php echo $detail[0] -> mname; ?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Harga</label>
                                      <div class="col-lg-10">
                                          <input type="text" onkeyup="formatharga(this.value,this)" name="price" class="form-control" value="<?php echo __get_rupiah($detail[0] -> mharga,2); ?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Discount</label>
                                      <div class="col-lg-1">
                                          <input type="number" name="disc" class="form-control" value="<?php echo $detail[0] -> mdisc; ?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Description</label>
                                      <div class="col-lg-10">
											<textarea name="desc" class="form-control" placeholder="Group Description"><?php echo $detail[0] -> mdesc; ?></textarea>
                                      </div>
                                  </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Status</label>
                                            <?php echo __get_status($detail[0] -> mstatus,2); ?>
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
