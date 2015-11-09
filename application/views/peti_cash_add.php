      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_calculator_alt"></i> New Transaction</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo site_url()?>">Home</a></li>
						<li><i class="icon_calculator_alt"></i>Peti Cash</li>
						<li>New Transaction</li>
					</ol>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             New Transaction
                          </header>
                          <div class="panel-body">
	<?php echo __get_error_msg(); ?>
                              <form class="form-horizontal " method="post" action="<?php echo site_url('peti_cash/peti_cash_add');?>">
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Transaction Type</label>
                                      <div class="col-lg-10">
<input type="radio" name="type" value="1"> Debit
<input type="radio" name="type" value="2" checked> Kredit
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Description</label>
                                      <div class="col-lg-10">
											<textarea name="desc" class="form-control" placeholder="Description"></textarea>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Nominal</label>
                                      <div class="col-lg-10">
                                          <input type="text" onkeyup="formatharga(this.value,this)" value="0" name="nominal" class="form-control" placeholder="Nominal">
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
