<html>
<link href="<?php echo site_url('application/views/css/style.css'); ?>" rel="stylesheet">
<link href="<?php echo site_url('application/views/assets/icheck/line/blue.css?v=1.0.2'); ?>" rel="stylesheet">
<script src="<?php echo site_url('application/views/js/jquery.js'); ?>"></script>
<script src="<?php echo site_url('application/views/assets/icheck/icheck.min.js?v=1.0.2'); ?>"></script>
<style>
#container{height:97%!important;}
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
.ambrul {padding:5px}
.titlecat {border-bottom:1px solid #B3B3B3;padding:3px;font-size:24px;color:#555;cursor:pointer}
.tabber{padding-top:0!important}
</style>
<body>
<script>
$(document).ready(function(){
	$('input').each(function(){
	var self = $(this),
	  label = self.next(),
	  label_text = label.text();

	label.remove();
	self.iCheck({
	  checkboxClass: 'icheckbox_line-blue',
	  radioClass: 'iradio_line-blue',
	  insert: '<div class="icheck_line-icon"></div>' + label_text
	});
	});
	
	var hs = window.location.hash;
	if (hs) {
	var ahs = hs.replace(/\#/g,'');
	$('div.active').addClass('inactive');
	$('div.active').removeClass('active');
	$('div.'+ahs).addClass('active');
	$('h3.active').addClass('inactive');
	$('h3.active').removeClass('active');
	$('h3.'+ahs).addClass('active');
	$('ul.tabList > li').removeClass('on');
	$('ul.tabList > li > a[rel="'+ahs+'"]').parent().addClass('on');
	}
});
</script>
<div id="container">
  <div class="tabber">
  <ul class="tabList">
	<?php
	$tz = 1;
	foreach($menus as $kk => $vv) {
	foreach($vv as $k1 => $v1) {
	?>
	  <li class="<?php echo ($tz == 1 ? 'on' : '');?>"><a href="#tcid_<?php echo $tz; ?>" rel="tcid_<?php echo $tz; ?>"><?php echo $k1;?></a></li>
	  <?php
	  ++$tz;
	  }
	  }
	  ?>
	  </ul>
	  </div>
	  
                          <div class="table-responsive">
						  <form method="POST">
							  <?php $c = 1; ?>
							  <?php foreach($menus as $k => $v) : ?>
							  <?php foreach($v as $k1 => $v1) : ?>
							  <div class="ambrul <?php echo ($c == 1 ? 'active' : 'inactive ' . $c);?> tcid_<?php echo $c; ?>">
							  <div class="titlecat">
							  <?php echo $k1; ?>
							  </div>
							  <div class="blabla">
                            <table class="gridtable" border="0" width="100%">
                                        <tr>
		  <td style="text-align:center;padding-top:10px">
		  <?php
		  foreach($v1 as $k2 => $v2) :
		  ?>
			  <input class="myinput large" type=checkbox name="mid[]" value="<?php echo $v2 -> mid.'-'.$v2 -> mharga.'-'.$v2 -> mdisc; ?>" >
			  <label><?php echo $v2 -> mname; ?></label>
        <?php endforeach; ?>
		  </td>
										</tr>
                            </table>
                            </div>
                            </div>
        <?php endforeach; ?>
        <?php ++$c; ?>
        <?php endforeach; ?>
        <div class="ambrul">
        <div style="border-top:1px solid #B3B3B3;padding-bottom:10px"></div>
							<button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Submit</button>
							<button type="button" onclick="javascript:location.reload();" class="btn btn-primary"> <i class="fa fa-save"></i> Reset</button>
							</div>
							</form>
                          </div>
</div>
</body>
</html>
<script>
$(document).ready(function(){
	$('ul.tabList > li > a').click(function(){
		if ($('div.'+$(this).attr('rel')).hasClass('active')) return false;
		$('div.active').addClass('inactive');
		$('div.active').removeClass('active');
		$('h3.active').addClass('inactive');
		$('h3.active').removeClass('active');
		$('div.'+$(this).attr('rel')).addClass('active');
		$('h3.'+$(this).attr('rel')).addClass('active');
		$('ul.tabList > li').removeClass('on');
		$(this).parent().addClass('on');
	});
});
</script>
