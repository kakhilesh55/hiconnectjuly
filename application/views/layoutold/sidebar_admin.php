<?php $cur_page = ($this->uri->segment(1));
 $cur_page_path = ($this->uri->segment(2));
 $user_level = $this->session->userdata('user_level'); ?>
  <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>admin/dashboard"> <img alt="image" src="<?php echo base_url(); ?>assets/img/logo.png" class="header-logo" />
            <?php /*<span class="logo-name">Card</span>*/?>
            </a>
          </div>
          <ul class="sidebar-menu">

            <li class="dropdown <?php echo ($cur_page_path=="dashboard")?'active':'';?> ">
              <a href="<?php echo base_url(); ?>admin/dashboard" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>

              <li class="dropdown <?php echo ($cur_page_path=="user"||$cur_page_path=='user_list')?'active':'';?>">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>User</span></a>
              <ul class="dropdown-menu">
                <li class="<?php echo ($cur_page_path=='user')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/user">Create New User</a></li>
                <li class="<?php echo ($cur_page_path=='user_list')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/user_list">User List</a></li>
              </ul>
            </li>
            <?php if($user_level==1) { ?>
            <li class="dropdown  <?php echo ($cur_page_path=="cover_category"||$cur_page=='cover_image')?'active':'';?>">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Cover Page</span></a>
              <ul class="dropdown-menu">
                <li class="<?php echo ($cur_page_path=='cover_category')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>cover/cover_category">Cover Page Category</a></li>
                <li class="<?php echo ($cur_page=='cover_image')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>cover_image/">Manage Cover Page</a></li>
              </ul>
            </li>


            <li class="dropdown <?php echo ($cur_page_path=='social_links_type'||$cur_page_path=='applications'||$cur_page_path=='themes'||$cur_page_path=='packages')?'active':'';?>">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Settings</span></a>
              <ul class="dropdown-menu">
                <li class="<?php echo ($cur_page_path=='social_links_type')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>social/social_links_type">Social Media Types</a></li>
                <?php /*<li><a class="nav-link" href="<?php echo base_url(); ?>admin/payment_type">Payment Type</a></li>*/?>
                <li class="<?php echo ($cur_page_path=='applications')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>payment_app/applications">Payment App</a></li>
                <li class="<?php echo ($cur_page_path=='themes')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>themes/theme_details">Themes</a></li>
                <li class="<?php echo ($cur_page_path=='packages')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>package/packages">Packages</a></li>
                <li class="<?php echo ($cur_page_path=='manage_packages')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>manage_packages/">Manage Packages</a></li>
              </ul>
            </li>
             <li class="<?php echo ($cur_page_path=='manage_products')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>manage_products/"><i data-feather="file"></i><span>Manage Products</span></a></li>

            <li class="dropdown <?php echo ($cur_page_path=='social_links_type'||$cur_page_path=='applications'||$cur_page_path=='themes'||$cur_page_path=='packages')?'active':'';?>">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Order Management</span></a>
              <ul class="dropdown-menu">
                <li class="<?php echo ($cur_page_path=='free_accounts')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>free_accounts/">Free Accounts</a></li>
                <li class="<?php echo ($cur_page_path=='manage_orders')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>manage_orders/">Card Orders</a></li>
                <li class="<?php echo ($cur_page_path=='manage_orders')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>manage_orders/plan">Plan Orders</a></li>
                <li class="<?php echo ($cur_page_path=='completed_orders')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>completed_orders/">Completed Orders</a></li>                
              </ul>
            </li>
            <li class="<?php echo ($cur_page_path=='coupon')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>coupon/"><i data-feather="file"></i><span>Coupon Management</span></a></li>
            <?php } ?>
             <li class="<?php echo ($cur_page_path=='changepass')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>auth/changepass"><i data-feather="file"></i><span>Change Password</span></a></li>
             <li><a class="nav-link" href="<?php echo base_url(); ?>Qrimages/qr"><i data-feather="file"></i><span>QR</span></a></li>
             <li><a class="nav-link" href="<?php echo base_url(); ?>auth/logout"><i data-feather="file"></i><span>Logout</span></a></li>
            
          </ul>
        </aside>
      </div>