<html>
    <link href="<?php echo site_url('application/views/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?php echo site_url('application/views/css/bootstrap-theme.css'); ?>" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo site_url('application/views/css/elegant-icons-style.css'); ?>" rel="stylesheet" />
    <link href="<?php echo site_url('application/views/css/font-awesome.min.css'); ?>" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="<?php echo site_url('application/views/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css'); ?>" rel="stylesheet" />
	<link href="<?php echo site_url('application/views/assets/fullcalendar/fullcalendar/fullcalendar.css'); ?>" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="<?php echo site_url('application/views/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css'); ?>" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="<?php echo site_url('application/views/css/owl.carousel.css'); ?>" type="text/css">
	<link href="<?php echo site_url('application/views/css/jquery-jvectormap-1.2.2.css'); ?>" rel="stylesheet">
    <!-- Custom styles -->
	<link rel="stylesheet" href="<?php echo site_url('application/views/css/fullcalendar.css'); ?>">
	<link href="<?php echo site_url('application/views/css/widgets.css'); ?>" rel="stylesheet">
    <link href="<?php echo site_url('application/views/css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo site_url('application/views/css/style-responsive.css'); ?>" rel="stylesheet" />
	<link href="<?php echo site_url('application/views/css/xcharts.min.css'); ?>" rel=" stylesheet">	
	<link href="<?php echo site_url('application/views/css/jquery-ui-1.10.4.min.css'); ?>" rel="stylesheet">
<body>
                      <section class="panel">
                          <header class="panel-heading">
                              List Raw Material
                          </header>
	<?php echo __get_error_msg(); ?>
                              <form class="form-horizontal " method="post" action="<?php echo site_url('itemreceiving/receiving_rawmaterial_add/' . $type);?>">
                          <input type="hidden" name="did" value="<?php echo $rid; ?>">
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
          <th></th>
          <th>Name</th>
          <th>Description</th>
                                </tr>
                              </thead>
                              <tbody>
								  
		  <?php
		  foreach($raw_material as $k => $v) :
		  ?>
                                        <tr>
          <td><input type="checkbox" name="rid[]" value="<?php echo $v -> rid; ?>"></td>
          <td><?php echo $v -> rname; ?></td>
          <td><?php echo substr($v -> rdesc,0,150); ?></td>
										</tr>
        <?php endforeach; ?>
                              </tbody>
                            </table>
                          </div>
                                <div class="box-footer clearfix">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <?php echo $pages; ?>
                                    </ul>
                                </div>

                      </section>
                                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Submit</button>
                                        </form>

</body>
</html>
