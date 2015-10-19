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
                          <li><a class="" href="<?php echo site_url('menus'); ?>">Menus</a></li>
                          <li><a class="" href="<?php echo site_url('categories'); ?>">Category Menu</a></li>
                          <li><a class="" href="<?php echo site_url('raw_material'); ?>">Raw Material</a></li>
                          <li><a class="" href="<?php echo site_url('tables'); ?>">Tables</a></li>
                          <li><a class="" href="<?php echo site_url('categories_tables'); ?>">Category Table</a></li>
                      </ul>
                  </li>
				  <li class="sub-menu shstock">
                      <a href="javascript:;" class="">
                          <i class="icon_archive"></i>
                          <span>Inventory</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo site_url('inventory'); ?>">Inventory</a></li>                          
                          <li><a class="" href="<?php echo site_url('wishlist'); ?>">Item Receiving</a></li>
                          <li><a class="" href="<?php echo site_url('opname'); ?>">Opname</a></li>
                      </ul>
                  </li>
				  <li class="sub-menu shorder">
                      <a href="javascript:;" class="">
                          <i class="icon_wallet_alt"></i>
                          <span>Sales Order</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo site_url('billing'); ?>">Billing</a></li>                          
                          <li><a class="" href="<?php echo site_url('wishlist'); ?>">Wishlist</a></li>
                      </ul>
                  </li>
				  <li class="sub-menu shreport">
                      <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Report</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo site_url('report_transaction'); ?>">Transaction</a></li>                          
                          <li><a class="" href="<?php echo site_url('report_stock'); ?>">Stock</a></li>
                          <li><a class="" href="<?php echo site_url('report_opname'); ?>">Opname</a></li>
                      </ul>
                  </li>
				  <li class="sub-menu shuser">
                      <a href="javascript:;" class="">
                          <i class="icon_contacts"></i>
                          <span>Users</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo site_url('users'); ?>">Users</a></li>                          
                          <li><a class="" href="<?php echo site_url('users/users_group'); ?>">User Group</a></li>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
