      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="<?php echo site_url(); ?>">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
				  <li class="sub-menu shmaster">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Master</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo site_url('menus'); ?>"><i class="icon_balance"></i>Menus</a></li>
                          <li><a class="" href="<?php echo site_url('categories'); ?>"><i class="fa fa-tags"></i>Category Menu</a></li>
                          <li><a class="" href="<?php echo site_url('raw_material'); ?>"><i class="icon_puzzle"></i>Raw Material</a></li>
                          <li><a class="" href="<?php echo site_url('tables'); ?>"><i class="icon_genius"></i>Tables</a></li>
                          <li><a class="" href="<?php echo site_url('categories_tables'); ?>"><i class="fa fa-tags"></i>Category Table</a></li>
                      </ul>
                  </li>
				  <li class="sub-menu shstock">
                      <a href="javascript:;" class="">
                          <i class="icon_archive"></i>
                          <span>Inventory</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo site_url('inventory'); ?>"><i class="icon_archive_alt"></i>Inventory</a></li>                          
                          <li><a class="" href="<?php echo site_url('itemreceiving'); ?>"><i class="icon_cloud-download"></i>Item Receiving</a></li>
                          <li><a class="" href="<?php echo site_url('itemout'); ?>"><i class="icon_cloud-upload"></i>Item Out</a></li>
                          <li><a class="" href="<?php echo site_url('opname'); ?>"><i class="icon_pushpin"></i>Opname</a></li>
                      </ul>
                  </li>
				  <li class="sub-menu shorder">
                      <a href="javascript:;" class="">
                          <i class="icon_wallet_alt"></i>
                          <span>Sales Order</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class=""  href="<?php echo site_url('wishlist/home/billing'); ?>"><i class="icon_currency"></i>Billing</a></li>                          
                          <li><a class="" href="<?php echo site_url('wishlist'); ?>"><i class="icon_cart"></i>Wishlist</a></li>
                      </ul>
                  </li>
                  <li>
                      <a class="" href="<?php echo site_url('peti_cash'); ?>">
                          <i class="icon_calculator_alt"></i>
                          <span>Peti Cash</span>
                      </a>
                  </li>
				  <li class="sub-menu shreport">
                      <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Report</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo site_url('report_transaction'); ?>"><i class="icon_grid-3x3"></i>Transaction</a></li>
                          <li><a class="" href="<?php echo site_url('report_opname'); ?>"><i class="icon_pushpin"></i>Opname</a></li>
                          <li><a class="" href="<?php echo site_url('report_peti_cash'); ?>"><i class="icon_calculator_alt"></i>Peti Cash</a></li>
                          <li><a class="" href="<?php echo site_url('report_itemout'); ?>"><i class="icon_cloud-upload"></i>Item Out</a></li>
                      </ul>
                  </li>
				  <li class="sub-menu shuser">
                      <a href="javascript:;" class="">
                          <i class="icon_contacts"></i>
                          <span>Users</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo site_url('users'); ?>"><i class="fa fa-users"></i>Users</a></li>                          
                          <li><a class="" href="<?php echo site_url('users/users_group'); ?>"><i class="icon_group"></i>User Group</a></li>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
