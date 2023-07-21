 <?php $cur_page = ($this->uri->segment(1));
  $cur_page_path = ($this->uri->segment(2));
  $user_id = $this->session->userdata('id');

  //get package_id userwise
  $this->db->select('package'); 
  $this->db->from('users'); 
  $this->db->where('id',$user_id); 
  $query = $this->db->get(); 
  $result = $query->row_array(); 
  $user_package = $result['package'];

  //get pages by packages
  $user_access_pages = $this->db->get_where('manage_package', ['package_id' => $user_package])->row_array();
  $checked_arr = explode(",",$user_access_pages['page']);
   ?>
  <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>users/dashboard"> <img alt="image" src="<?php echo base_url(); ?>assets/img/logo.png" class="header-logo" /> 
            </a>
          </div>
          <div class="sidebar-brand-icon">
            <a href="<?php echo base_url(); ?>users/dashboard"> <img alt="image" src="<?php echo base_url(); ?>assets/img/logo.png" class="header-logo-icon" /> 
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="dropdown <?php echo ($cur_page_path=="dashboard")?'active':'';?> ">
              <a href="<?php echo base_url(); ?>users/dashboard" class="nav-link"><i data-feather="grid"></i><span>Dashboard</span></a>
            </li>
             <li class="dropdown <?php echo ($cur_page_path=='details'||$cur_page=='achievements'||$cur_page=='experiences'||$cur_page=='education'||$cur_page=='qrimages')?'active':'';?> ">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="user"></i><span>My Profile</span></a>
              <ul class="dropdown-menu">
                <?php if (in_array("Personal Details", $checked_arr)){ ?><li class="<?php echo ($cur_page_path=='details')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>users/details">My Info</a></li><?php } ?>
                <?php if (in_array("Education", $checked_arr)){ ?><li class="<?php echo ($cur_page=='education')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>education/">Education</a></li><?php } ?>
                <?php if (in_array("Experience", $checked_arr)){ ?><li class="<?php echo ($cur_page=='experiences')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>experiences/">Experience</a></li><?php } ?>
                <?php if (in_array("Achievements", $checked_arr)){ ?><li class="<?php echo ($cur_page=='achievements')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>achievements/">Achievements</a></li><?php } ?>
                <?php if (in_array("Generate QR Code", $checked_arr)){ ?><li class="<?php echo ($cur_page_path=='qrimages')?'active':'';?>" ><a class="nav-link" href="<?php echo base_url(); ?>qrimages">QR Delete</a></li><?php } ?>
                <li><a class="nav-link" href="<?php echo base_url(); ?>users/scanner">QR Code</a></li>
                </ul>
            </li>
            
            <li class="dropdown <?php echo ($cur_page=='company'||$cur_page=='contact'||$cur_page=='testimonials'||$cur_page=='services'||$cur_page=='products')?'active':'';?> ">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="layers"></i><span>Manage Company</span></a>
              <ul class="dropdown-menu">
                <?php if (in_array("Company Details", $checked_arr)){ ?><li class="<?php echo ($cur_page=='company')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>company/">Company Info</a></li><?php } ?>
                <?php if (in_array("Contact Details", $checked_arr)){ ?><li class="<?php echo ($cur_page=='contact')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>contact/contact_details">Contact Details</a></li><?php } ?>
                <?php if (in_array("Testimonials", $checked_arr)){ ?><li class="<?php echo ($cur_page=='testimonials')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>testimonials/">Testimonials</a></li><?php } ?>
                <?php if (in_array("Services", $checked_arr)){ ?><li class="<?php echo ($cur_page=='services')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>services/"><span>Services</span></a></li><?php } ?>
                <?php if (in_array("Products", $checked_arr)){ ?><li class="<?php echo ($cur_page=='products')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>products/product_details"><span>Products</span></a></li><?php } ?>

                </ul>
            </li>
            <li class="dropdown <?php echo ($cur_page=='company'||$cur_page=='contact'||$cur_page=='testimonials'||$cur_page=='services'||$cur_page=='products')?'active':'';?> ">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="layers"></i><span>My Contacts</span></a>
              <ul class="dropdown-menu">
                <?php if (in_array("Company Details", $checked_arr)){ ?><li class="<?php echo ($cur_page=='enquiries')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>enquiries/">Leads</a></li><?php } ?>
                <?php if (in_array("Contact Details", $checked_arr)){ ?><li class="<?php echo ($cur_page=='enquiries/lead_list')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>enquiries/lead_list">Activities</a></li><?php } ?>
              

                </ul>
            </li>

            <?php if (in_array("Social Links", $checked_arr)){ ?><li class="<?php echo ($cur_page=='social_link')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>social_link/"><i data-feather="facebook"></i><span>Social Links</span></a></li><?php } ?>

            <?php if (in_array("Gallery", $checked_arr)){ ?><li class="<?php echo ($cur_page=='gallery')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>gallery/"><i data-feather="image"></i><span>Gallery</span></a></li><?php } ?>
            
            <?php if (in_array("Payment Details", $checked_arr)){ ?><li class="<?php echo ($cur_page=='payment')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>payment/"><i data-feather="dollar-sign"></i><span>Payment</span></a></li><?php } ?>

           <li class="dropdown <?php echo ($cur_page=='select_theme'||$cur_page=='set_cover'||$cur_page_path=='changepass')?'active':'';?> ">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="settings"></i><span>Settings</span></a>
              <ul class="dropdown-menu">
                <?php if (in_array("Themes", $checked_arr)){ ?><li class="<?php echo ($cur_page=='select_theme')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>select_theme">Themes</a></li><?php } ?>
                 <?php if (in_array("Covers", $checked_arr)){ ?><li class="<?php echo ($cur_page=='set_cover')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>set_cover">Covers</a></li><?php } ?>
                <?php if (in_array("Change Password", $checked_arr)){ ?><li class="<?php echo ($cur_page_path=='changepass')?'active':'';?>" ><a class="nav-link" href="<?php echo base_url(); ?>auth/changepass">Change Password</a></li><?php } ?>
                <li><a class="nav-link" href="<?php echo base_url(); ?>auth/logout">Logout</a></li>
     
              </ul>
            </li>
            <?php if (in_array("Package", $checked_arr)){ ?><li class="<?php echo ($cur_page=='upgrade_package_product')?'active':'';?>"><a class="nav-link" href="<?php echo base_url(); ?>pricing/"><i
                  data-feather="trending-up"></i><span>Upgrade Account</span></a></li><?php } ?>
        
          </ul>
        </aside>
      </div>