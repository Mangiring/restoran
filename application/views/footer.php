
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>
              
            </div>
                        
          </div> 
              <!-- project team & activity end -->

          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->
    <!--script src="<?php echo site_url('application/views/js/jquery.js'); ?>"></script>
	<script src="<?php echo site_url('application/views/js/jquery-ui-1.10.4.min.js'); ?>"></script>
    <script src="<?php echo site_url('application/views/js/jquery-1.8.3.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('application/views/js/jquery-ui-1.9.2.custom.min.js'); ?>"></script-->
    <!-- bootstrap --> 
    <script src="<?php echo site_url('application/views/js/bootstrap.min.js'); ?>"></script>
    <!-- nice scroll -->
    <script src="<?php echo site_url('application/views/js/jquery.scrollTo.min.js'); ?>"></script>
    <script src="<?php echo site_url('application/views/js/jquery.nicescroll.js'); ?>" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="<?php echo site_url('application/views/assets/jquery-knob/js/jquery.knob.js'); ?>"></script>
    <script src="<?php echo site_url('application/views/js/jquery.sparkline.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo site_url('application/views/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js'); ?>"></script>
    <script src="<?php echo site_url('application/views/js/owl.carousel.js'); ?>" ></script>
    <!-- jQuery full calendar -->
    <<script src="<?php echo site_url('application/views/js/fullcalendar.min.js'); ?>"></script> <!-- Full Google Calendar - Calendar -->
	<script src="<?php echo site_url('application/views/assets/fullcalendar/fullcalendar/fullcalendar.js'); ?>"></script>
    <!--script for this page only-->
    <script src="<?php echo site_url('application/views/js/calendar-custom.js'); ?>"></script>
	<script src="<?php echo site_url('application/views/js/jquery.rateit.min.js'); ?>"></script>
    <!-- custom select -->
    <script src="<?php echo site_url('application/views/js/jquery.customSelect.min.js'); ?>" ></script>
	<script src="<?php echo site_url('application/views/assets/chart-master/Chart.js'); ?>"></script>
   
    <!--custome script for all page-->
    <script src="<?php echo site_url('application/views/js/scripts.js'); ?>"></script>
    <!-- custom script for this page-->
    <script src="<?php echo site_url('application/views/js/sparkline-chart.js'); ?>"></script>
    <script src="<?php echo site_url('application/views/js/easy-pie-chart.js'); ?>"></script>
	<script src="<?php echo site_url('application/views/js/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
	<script src="<?php echo site_url('application/views/js/jquery-jvectormap-world-mill-en.js'); ?>"></script>
	<script src="<?php echo site_url('application/views/js/xcharts.min.js'); ?>"></script>
	<script src="<?php echo site_url('application/views/js/jquery.autosize.min.js'); ?>"></script>
	<script src="<?php echo site_url('application/views/js/jquery.placeholder.min.js'); ?>"></script>
	<script src="<?php echo site_url('application/views/js/gdp-data.js'); ?>"></script>	
	<script src="<?php echo site_url('application/views/js/morris.min.js'); ?>"></script>
	<script src="<?php echo site_url('application/views/js/sparklines.js'); ?>"></script>	
	<script src="<?php echo site_url('application/views/js/charts.js'); ?>"></script>
	<script src="<?php echo site_url('application/views/js/jquery.slimscroll.min.js'); ?>"></script>
  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
	  
	  /* ---------- Map ---------- */
	$(function(){
	  $('#map').vectorMap({
	    map: 'world_mill_en',
	    series: {
	      regions: [{
	        values: gdpData,
	        scale: ['#000', '#000'],
	        normalizeFunction: 'polynomial'
	      }]
	    },
		backgroundColor: '#eef3f7',
	    onLabelShow: function(e, el, code){
	      el.html(el.html()+' (GDP - '+gdpData[code]+')');
	    }
	  });
	});


$(document).ready(function(){
	if (/\/users/.test(window.location.href) === true) {
		$('ul.sidebar-menu > li').removeClass('active');
		$('li.shuser').addClass('active');
	}
	else if (/\/menus|categories|raw_material|tables|categories_tables/.test(window.location.href) === true) {
		$('ul.sidebar-menu > li').removeClass('active');
		$('li.shmaster').addClass('active');
	}
	else if (/\/(inventory|itemout|itemreceiving|opname)/.test(window.location.href) === true) {
		$('ul.sidebar-menu > li').removeClass('active');
		$('li.shstock').addClass('active');
	}
	else if (/\/wishlist/.test(window.location.href) === true) {
		$('ul.sidebar-menu > li').removeClass('active');
		$('li.shorder').addClass('active');
	}
	else if (/\/peti_cash/.test(window.location.href) === true) {
		$('li.shpeticash').addClass('active');
	}
	else if (/\/report_transaction|report_opname|report_itemout|report_peti_cash/.test(window.location.href) === true) {
		$('ul.sidebar-menu > li').removeClass('active');
		$('li.shreport').addClass('active');
	}
	else {
		$('ul.sidebar-menu > li').removeClass('active');
		$('ul.sidebar-menu > li:nth-child(1)').addClass('active');
	}
});
</script>
</body>
</html>
