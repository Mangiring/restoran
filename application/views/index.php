   <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-laptop"></i>Dashboard</li>						  	
					</ol>
				</div>
			</div>
              
            <div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box blue-bg">
						<i class="icon_genius"></i>
						<div class="count"><?php echo $totalmenu; ?></div>
						<div class="title">Menus</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box brown-bg">
						<i class="icon_currency"></i>
						<div class="count"><?php echo $totalbilling; ?></div>
						<div class="title">Billing</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->	
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box dark-bg">
						<i class="icon_cart"></i>
						<div class="count"><?php echo $totalwislist; ?></div>
						<div class="title">Wistlist</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box green-bg">
						<i class="fa fa-cubes"></i>
						<div class="count"><?php echo $totalrawmaterial; ?></div>
						<div class="title">Raw Material</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
			</div><!--/.row-->
		
			
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Recent Menu
                          </header>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
          <th>Category</th>
          <th>Name</th>
          <th>Harga</th>
          <th>Discount</th>
          <th>Description</th>
                                </tr>
                              </thead>
                              <tbody>
								  
		  <?php
		  foreach($menus as $k => $v) :
		  ?>
                                        <tr>
          <td><?php echo $v -> cname; ?></td>
          <td><?php echo $v -> mname; ?></td>
          <td><?php echo __get_rupiah($v -> mharga,1); ?></td>
          <td><?php echo $v -> mdisc; ?>%</td>
          <td><?php echo substr($v -> mdesc,0,150); ?></td>
										</tr>
        <?php endforeach; ?>
                              </tbody>
                            </table>
                          </div>
                      </section>
                  </div>
              </div>
                  </div>
<div class="row">

                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Recent Transaction
                          </header>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
          <th>Date</th>
          <th>Table</th>
          <th>Name</th>
          <th>Person</th>
          <th>Bruto</th>
          <th>Netto</th>
                                </tr>
                              </thead>
                              <tbody>
								  
		  <?php foreach($transaction as $k => $v) : ?>
                                        <tr>
		<td> <?php echo __get_date(strtotime($v -> wdate),3); ?></td>
          <td><?php echo $v -> tname; ?></td>
          <td><?php echo $v -> wname; ?></td>
          <td><?php echo $v -> person; ?></td>
			<td><?php echo __get_rupiah($v -> wtotal,1); ?></td>
			<td><?php echo __get_rupiah($v -> wtotalall,1); ?></td>
										</tr>
        <?php endforeach; ?>
                              </tbody>
                            </table>
                          </div>
                      </section>
                  </div>
              </div>

</div>
