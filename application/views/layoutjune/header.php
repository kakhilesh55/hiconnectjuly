<?php  if (!$this->session->userdata('user_id')) {
   redirect('auth/');
}
else{
  $id = $this->session->userdata('id');
  $user = $this->db->get_where('users', ['id' => $id])->row_array();
  $user_image = $user['user_image'];
  
  
  $this->db->select('count(*) as ct');
$this->db->from('lead');        
$this->db->where('user_id', $id); 
$query = $this->db->get()->row_array();

$ct=$query['ct'];

} 
?>

<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>HiConnect</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="https://tezcode.com/hiconnect/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bundles/pretty-checkbox/pretty-checkbox.min.css">
  
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='<?php echo base_url(); ?>assets/img/HiConnect-Icon.svg' />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bundles/dropzonejs/dropzone.css">

   <!-- General JS Scripts -->

  <script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 

</head>
<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline">
          <ul class="navbar-nav wi-hun">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
                  collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <?php if($this->session->userdata('user_level')==3){?>
            <li class="wi-hun">
                <div class="cardlink">
                   <input type="text" class="form-control" value="<?= base_url()."home.php/".$this->session->userdata('user_id'); ?>" id="card_link" disabled>
                  <button class="btn" onclick="copylink()">
                    <i class="fas fa-copy"></i>
                  </button>
                </div>
            </li>
          <?php } ?>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
<li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Notifications
                <!--<div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>-->
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                  
                  <?php foreach($notifications as $noti)
                  {
                    //echo $noti['notification_type'];
                      ?>
                  
                <a href="<?php if($noti['notification_type']==1)echo  "https://hiconnect.co.in/enquiries/lead_list";else echo "https://hiconnect.co.in/enquiries/"; ?>" class="dropdown-item dropdown-item-unread"> <span
                    class="dropdown-item-icon bg-primary text-white"> <i class="fas
												fa-code"></i>
                  </span> <span class="dropdown-item-desc"> <?php echo $noti['cm'];?> <span class="time">2 Min
                      Ago</span>
                  </span>
                </a>  
                <?php
                  }
                  ?>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>		
               <!-- <li class="dropdown">
				<a href="<?php echo base_url(); ?>enquiries" 
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="<?php echo base_url(); ?>uploads/user_images/bell.jpg"
                class="user-img-radious-style"><span style="color:red;"><?php echo $ct;?></span> <span class="d-sm-none d-lg-inline-block"></span></a>
         
          </li>-->
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="<?php echo base_url(); ?>uploads/user_images/<?php echo $user_image?$user_image:'default_user_img.jpg';?>"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello <?php echo $this->session->userdata('username');?></div>
              <a href="<?php echo base_url(); ?>users/details" class="dropdown-item has-icon"> <i class="far
                    fa-user"></i> Profile
              </a> 
              <a href="<?php echo base_url(); ?>auth/changepass" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
              </a>
                 <?php if($this->session->userdata('user_level')==3){?>
              <a href="<?php echo base_url(); ?>manage_orders/manage_orderuser/" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
               My Orders
              </a>
               <?php } ?>
              <?php if($this->session->userdata('user_level')==3){?>
              <a href="<?php echo base_url(); ?>renewals_billing/" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Renewals and Billing
              </a>
               <?php } ?>
              <div class="dropdown-divider"></div>
              <a href="<?php echo base_url(); ?>auth/logout" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>