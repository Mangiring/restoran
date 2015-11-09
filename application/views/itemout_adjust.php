      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_cloud-upload"></i> Item Out</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo site_url()?>">Home</a></li>
						<li><i class="icon_cloud-upload"></i>Item Out</li>
						<li>Item Out Adjust</li>
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
          <th>Stock Begining</th>
          <th>Stock In</th>
          <th>Stock Out</th>
          <th>Stock Final</th>
                                </tr>
                              </thead>
                              <tbody>
                                        <tr>
          <td><?php echo $detail[0] -> rname; ?></td>
          <td><?php echo $detail[0] -> istockbegining; ?></td>
          <td><?php echo $detail[0] -> istockin; ?></td>
          <td><?php echo $detail[0] -> istockout; ?></td>
          <td><?php echo $detail[0] -> istock; ?></td>
										</tr>
                              </tbody>
                            </table>
                          </div>
                      </section>
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Adjustment Item Out
                          </header>
                          <div class="panel-body">
	<?php echo __get_error_msg(); ?>
                              <form class="form-horizontal " method="post" action="<?php echo site_url('itemout/itemout_adjust');?>">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<input type="hidden" name="sbegin2" value="<?php echo $detail[0] -> istockbegining; ?>">
	<input type="hidden" name="sin2" value="<?php echo $detail[0] -> istockin; ?>">
	<input type="hidden" name="sout2" value="<?php echo $detail[0] -> istockout; ?>">
	<input type="hidden" name="sretur2" value="<?php echo $detail[0] -> istockretur; ?>">
	<input type="hidden" name="sfinal2" value="<?php echo $detail[0] -> istock; ?>">
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Material Left</label>
                                      <div class="col-lg-10">
                                          <input type="text" name="amin" class="form-control" placeholder="Material Out">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Description</label>
                                      <div class="col-lg-10">
											<textarea name="desc" class="form-control" placeholder="Description"></textarea>
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
