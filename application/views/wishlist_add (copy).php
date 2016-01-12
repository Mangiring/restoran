<html>
<script src="<?php echo site_url('application/views/js/jquery.js'); ?>"></script>
<style type="text/css">
table.gridtable {
	font-family: verdana,arial,sans-serif;
	font-size:16px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}
table.gridtable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
table.gridtable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
/* Main Classes */
.myinput[type="checkbox"]:before{
    position: relative;
    display: block;
    width: 11px;
    height: 11px;
    border: 1px solid #808080;
    content: "";
    background: #FFF;
}
.myinput[type="checkbox"]:after{
    position: relative;
    display: block;
    left: 2px;
    top: -11px;
    width: 7px;
    height: 7px;
    border-width: 1px;
    border-style: solid;
    border-color: #B3B3B3 #dcddde #dcddde #B3B3B3;
    content: "";
    background-image: linear-gradient(135deg, #B1B6BE 0%,#FFF 100%);
    background-repeat: no-repeat;
    background-position:center;
}
.myinput[type="checkbox"]:checked:after{
    background-image:  url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAcAAAAHCAQAAABuW59YAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAAB2SURBVHjaAGkAlv8A3QDyAP0A/QD+Dam3W+kCAAD8APYAAgTVZaZCGwwA5wr0AvcA+Dh+7UX/x24AqK3Wg/8nt6w4/5q71wAAVP9g/7rTXf9n/+9N+AAAtpJa/zf/S//DhP8H/wAA4gzWj2P4lsf0JP0A/wADAHB0Ngka6UmKAAAAAElFTkSuQmCC'), linear-gradient(135deg, #B1B6BE 0%,#FFF 100%);
}
.myinput[type="checkbox"]:disabled:after{
    -webkit-filter: opacity(0.4);
}
.myinput[type="checkbox"]:not(:disabled):checked:hover:after{
    background-image:  url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAcAAAAHCAQAAABuW59YAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAAB2SURBVHjaAGkAlv8A3QDyAP0A/QD+Dam3W+kCAAD8APYAAgTVZaZCGwwA5wr0AvcA+Dh+7UX/x24AqK3Wg/8nt6w4/5q71wAAVP9g/7rTXf9n/+9N+AAAtpJa/zf/S//DhP8H/wAA4gzWj2P4lsf0JP0A/wADAHB0Ngka6UmKAAAAAElFTkSuQmCC'), linear-gradient(135deg, #8BB0C2 0%,#FFF 100%);
}
.myinput[type="checkbox"]:not(:disabled):hover:after{
    background-image: linear-gradient(135deg, #8BB0C2 0%,#FFF 100%);  
    border-color: #85A9BB #92C2DA #92C2DA #85A9BB;  
}
.myinput[type="checkbox"]:not(:disabled):hover:before{
    border-color: #3D7591;
}
/* Large checkboxes */
.myinput.large{
    height:22px;
    width: 22px;
}

.myinput.large[type="checkbox"]:before{
    width: 20px;
    height: 20px;
}
.myinput.large[type="checkbox"]:after{
    top: -20px;
    width: 16px;
    height: 16px;
}
.btn{
display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.428571429;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    border: 1px solid transparent;
    border-radius: 4px;
    white-space: nowrap;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    -o-user-select: none;
    user-select: none;
    font-weight: 300;
    -webkit-transition: all 0.15s;
    -moz-transition: all 0.15s;
    transition: all 0.15s;
    color: #ffffff;
    background-color: #007aff;
    border-color: #007aff;	
}
.btn:hover{
    color: #007aff;
    border-color: #007aff;
    background: transparent;	
}
.titlecat {border:1px solid #B3B3B3;padding:3px;font-size:24px;background-color:#ff2d55;color:#fff;cursor:pointer}
.nhide{display:none;}
.nshow{display:block;}
.nactive {background-color:#BF0000!important;}
</style>
<body>
<!-- Table goes in the document BODY -->

  <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
	
                  <div class="col-lg-12">
            <section class="panel">
                          <header class="panel-heading">
                              <h2>List Menu</h2>						  
							  <hr />
                          </header>
                          <div class="table-responsive">
						  <form method="POST">
							  <?php $i=0; ?>
							  <?php foreach($menus as $k => $v) : ?>
							  <?php foreach($v as $k1 => $v1) : ?>
							  <div class="ambrul">
							  <div class="titlecat <?php echo ($i==0 ? 'nactive' : '');?>" wew="wam<?php echo $k;?>">
							  <?php echo $k1; ?>
							  </div>
							  <div class="blabla wam<?php echo $k;?> <?php echo ($i==0 ? 'nshow' : 'nhide');?>">
                            <table class="gridtable" border="0" width="100%">
                              <thead>
							  
                                <tr>
								<th style="width:10%;">&nbsp;</th>
								<?php if ($k == 8) : ?>
								          <th style="width:30%;">Name</th>
          <th style="width:10%;text-align:center;">Discount</th>
          <th style="width:50%;">Description</th>
          <?php else : ?>
          <th style="width:70%;">Name</th>
          <th style="width:20%;text-align:center;">Discount</th>
          <?php endif; ?>
                                </tr>
                              </thead>
                              <tbody>
		  <?php
		  foreach($v1 as $k2 => $v2) :
		  ?>
                                        <tr>
		  <td style="text-align:center;width:10%"><input class="myinput large" type=checkbox name="mid[]" value="<?php echo $v2 -> mid.'-'.$v2 -> mharga.'-'.$v2 -> mdisc; ?>" ></td>							
          <td><?php echo $v2 -> mname; ?></td>
          <td style="text-align:center;"><?php echo $v2 -> mdisc; ?>%</td>
								<?php if ($k == 8) : ?>
								<td><?php echo $v2 -> mdesc; ?></td>
								<?php endif; ?>
		
										</tr>
        <?php endforeach; ?>
                              </tbody>
                            </table>
                            </div>
                            </div>
                            <br />
        <?php endforeach; ?>
        <?php ++$i; ?>
        <?php endforeach; ?>
							<button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Submit</button>
							</form>
                          </div>
                      </section>
                          </div>


</body>
</html>
<script>
$(document).ready(function(){
	$('.titlecat').click(function(){
		if ($('.'+$(this).attr('wew')).hasClass('nshow')) return false;
		$('.ambrul > div.blabla').hide('slow');
		$('.ambrul > div.blabla').addClass('nhide');
		$('.ambrul > div.blabla').removeClass('nshow');
		$('div.nhide').prev().removeClass('nactive');
		
		$('.'+$(this).attr('wew')).show('slow');
		$('.'+$(this).attr('wew')).addClass('nshow');
		$('div.nshow').prev().addClass('nactive');
	});
});
</script>
