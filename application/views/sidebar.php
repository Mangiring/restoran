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
					<?php if (__get_roles('Menus') || __get_roles('CategoryMenu') || __get_roles('RawMaterial') || __get_roles('Table') || __get_roles('CategoryTables')) : ?>
				  <li class="sub-menu shmaster">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Master</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
							<?php if (__get_roles('Menus')) : ?>
                          <li><a class="" href="<?php echo site_url('menus'); ?>"><i class="icon_balance"></i>Menus</a></li>
                                                    							<?php endif; ?>                       
							<?php if (__get_roles('CategoryMenu')) : ?>
                          <li><a class="" href="<?php echo site_url('categories'); ?>"><i class="fa fa-tags"></i>Category Menu</a></li>
                                                    							<?php endif; ?>                       
							<?php if (__get_roles('RawMaterial')) : ?>
                          <li><a class="" href="<?php echo site_url('raw_material'); ?>"><i class="icon_puzzle"></i>Raw Material</a></li>
                                                    							<?php endif; ?>                       
							<?php if (__get_roles('Table')) : ?>
                          <li><a class="" href="<?php echo site_url('tables'); ?>"><i class="icon_genius"></i>Tables</a></li>
                                                    							<?php endif; ?>                       
							<?php if (__get_roles('CategoryTables')) : ?>
                          <li><a class="" href="<?php echo site_url('categories_tables'); ?>"><i class="fa fa-tags"></i>Category Table</a></li>
                                                    							<?php endif; ?>
                      </ul>
                  </li>
                  <?php endif; ?>
					<?php if (__get_roles('ItemOut') || __get_roles('StockOpname') || __get_roles('Inventory') || __get_roles('ItemReceiving')) : ?>
				  <li class="sub-menu shstock">
                      <a href="javascript:;" class="">
                          <i class="icon_archive"></i>
                          <span>Inventory</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
							<?php if (__get_roles('Inventory')) : ?>
                          <li><a class="" href="<?php echo site_url('inventory'); ?>"><i class="icon_archive_alt"></i>Inventory</a></li>                          
                          							<?php endif; ?>                       
							<?php if (__get_roles('ItemReceiving')) : ?>
                          <li><a class="" href="<?php echo site_url('itemreceiving'); ?>"><i class="icon_cloud-download"></i>Item Receiving</a></li>
                          							<?php endif; ?>                       
							<?php if (__get_roles('ItemOut')) : ?>
                          <li><a class="" href="<?php echo site_url('itemout'); ?>"><i class="icon_cloud-upload"></i>Item Out</a></li>
                          							<?php endif; ?>                       
							<?php if (__get_roles('StockOpname')) : ?>
                          <li><a class="" href="<?php echo site_url('opname'); ?>"><i class="icon_pushpin"></i>Opname</a></li>
                          							<?php endif; ?>
                      </ul>
                  </li>
                  <?php endif; ?>
					<?php if (__get_roles('Wishlist') || __get_roles('Billing')) : ?>
				  <li class="sub-menu shorder">
                      <a href="javascript:;" class="">
                          <i class="icon_wallet_alt"></i>
                          <span>Sales Order</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
							<?php if (__get_roles('Billing')) : ?>
                          <li><a class=""  href="<?php echo site_url('wishlist/home/billing'); ?>"><i class="icon_currency"></i>Billing</a></li>                          
							<?php endif; ?>                       
							<?php if (__get_roles('Wishlist')) : ?>
                          <li><a class="" href="<?php echo site_url('wishlist'); ?>"><i class="icon_cart"></i>Wishlist</a></li>
							<?php endif; ?>
                      </ul>
                  </li>
                  <?php endif; ?>
							<?php if (__get_roles('PetiCash')) : ?>
                  <li class="shpeticash">
                      <a class="" href="<?php echo site_url('peti_cash'); ?>">
                          <i class="icon_calculator_alt"></i>
                          <span>Peti Cash</span>
                      </a>
                  </li>
                  <?php endif; ?>
					<?php if (__get_roles('ReportTransaction') || __get_roles('ReportOpname') || __get_roles('ReportPetiCash') || __get_roles('ReportItemOut')) : ?>
				  <li class="sub-menu shreport">
                      <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Report</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
							<?php if (__get_roles('ReportTransaction')) : ?>
                          <li><a class="" href="<?php echo site_url('report_transaction'); ?>"><i class="icon_grid-3x3"></i>Transaction</a></li>
                          <?php endif; ?>                       
							<?php if (__get_roles('ReportOpname')) : ?>
                          <li><a class="" href="<?php echo site_url('report_opname'); ?>"><i class="icon_pushpin"></i>Opname</a></li>
                          <?php endif; ?>                       
							<?php if (__get_roles('ReportPetiCash')) : ?>
                          <li><a class="" href="<?php echo site_url('report_peti_cash'); ?>"><i class="icon_calculator_alt"></i>Peti Cash</a></li>
                          <?php endif; ?>                       
							<?php if (__get_roles('ReportItemOut')) : ?>
                          <li><a class="" href="<?php echo site_url('report_itemout'); ?>"><i class="icon_cloud-upload"></i>Item Out</a></li>
                          <?php endif; ?>
                          <li><a class="" href="<?php echo site_url('report_menu'); ?>"><i class="icon_balance"></i>Report Menu</a></li>
                      </ul>
                  </li>
                  <?php endif; ?>
					<?php if (__get_roles('User') || __get_roles('UserGroup')) : ?>
				  <li class="sub-menu shuser">
                      <a href="javascript:;" class="">
                          <i class="icon_contacts"></i>
                          <span>Users</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
							<?php if (__get_roles('User')) : ?>
                          <li><a class="" href="<?php echo site_url('users'); ?>"><i class="fa fa-users"></i>Users</a></li>
                          <?php endif; ?>                       
							<?php if (__get_roles('UserGroup')) : ?>
                          <li><a class="" href="<?php echo site_url('users/users_group'); ?>"><i class="icon_group"></i>User Group</a></li>
                          <?php endif; ?>
                      </ul>
                  </li>
                          <?php endif; ?>                       
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
