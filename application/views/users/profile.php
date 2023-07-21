<?php 
$edit_id = $this->session->userdata('id');
$edu_edit_id = $this->uri->segment(3);
?>
<style>
      .__web-inspector-hide-shortcut__, .__web-inspector-hide-shortcut__ *, .__web-inspector-hidebefore-shortcut__::before, .__web-inspector-hideafter-shortcut__::after{
        visibility: visible !important;
      }
</style>
<div class="main-content">
<!--================================================================================================== -->
 <section class="hi-qr-delete">
  <div class="row ">
    <div class="col-12">
      <div class="col-12 p-0">
        <div class="card m-0 blank-padd radius-lr">
          <div class="card-body">
            <?php $tab = (isset($tab)) ? $tab : 'tab1'; ?> 
            <ul class="nav nav-pills hic-pills" id="myTab3" role="tablist">
              <li class="nav-item">
                <a class="nav-link  <?php echo ($tab == 'tab1') ? 'active' : ''; ?>" id="home-tab3" data-toggle="tab" href="#My-info" role="tab"
                          aria-controls="home" aria-selected="true">My Info</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  <?php echo ($tab == 'tab2') ? 'active' : ''; ?>" id="profile-tab3" data-toggle="tab" onclick="loadEducation()" href="#Education" role="tab"
                          aria-controls="profile" aria-selected="false">Education</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo ($tab == 'tab3') ? 'active' : ''; ?>" id="contact-tab3" data-toggle="tab" onclick="loadWork()" href="#Work" role="tab"
                          aria-controls="contact" aria-selected="false">Work</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo ($tab == 'tab4') ? 'active' : ''; ?>" id="contact-tab3" data-toggle="tab" onclick="loadAchievements()" href="#Achievements" role="tab"
                          aria-controls="contact" aria-selected="false">Achievements</a>
              </li>
            </ul>
<!-- ============================================================================== -->
            <div class="tab-content" id="myTabContent2">
              <div class="tab-pane fade show <?php echo ($tab == 'tab1') ? 'active' : ''; ?>" id="My-info" role="tabpanel" aria-labelledby="home-tab3">
              <!-- =============================================================================== -->
                <div class="hic-tab-data">

                  <form class="hic-dash-form pt-3" name="user" method="post" action="<?= base_url('users/details') ?>" enctype="multipart/form-data">
                    <div class="d-flex align-items-center justify-content-center">
                      <div class="author-box-center">
                        <div id="image-holder" class="text-center">
                          <img alt="image" src="<?php if(isset($user_details->user_image) && ($user_details->user_image!='')) { echo base_url('uploads/user_images/'.$user_details->user_image); } else { echo base_url('uploads/company_images/default_company.jpg'); } ?>" class="rounded-circle author-box-picture" style="height: 200px;width:200px;"<?php /* src="<?php if(isset($company_details->company_image) && ($company_details->company_image!='')) { echo base_url('uploads/company_images/'.$company_details->company_image); } else { echo base_url('uploads/company_images/default_company.jpg'); } ?>"*/?>>
                        </div>
                        <label for="profile"> 
                          <input type="file" name="user_image" id="user_image" class="form-control" />
                        </label>
                      </div>
                    </div>
                    <div class="hi-act-type"> 
                      <select id="type" name="type" class="form-control" required="">
                        <option value="">Account Type</option>
                        <option value="1" <?php if(isset($user_details->type)){echo ($user_details->type==1)?'selected':'';} ?>>Personal</option>
                        <option value="2" <?php if(isset($user_details->type)){echo ($user_details->type==2)?'selected':'';} ?>>Business</option>
                      </select>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="name" name="name" placeholder="First Name" value="<?php echo isset($user_details->name)?$user_details->name:'';?>" required="">
                          <label for="FirstName">First Name</label>
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="lname" name="lname" placeholder="Second Name" value="<?php echo isset($user_details->lname)?$user_details->lname:'';?>" required="">
                          <label for="SecondName">Second Name</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo isset($user_details->email)?$user_details->email:'';?>" required="" readonly="readonly" >
                        <label for="Email">Email</label>
                      </div>
                    </div>
                    <div class="form-group hi-cpy">
                      <label for="inputAddress2">Profile URL</label><i class="far fa-copy"></i>
                      <div class="position-relative">
                        <input type="text" class="form-control" id="inputAddress2"  value="<?= base_url()."home.php/".$this->session->userdata('user_id'); ?>">
                        <div class="hi-inpt-icon hi-grn"><i class="fas fa-check"></i></div>
                        <!--<div class="hi-inpt-icon hi-red"><i class="fas fa-window-close"></i></div>-->
                      </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <div class="form-floating position-relative">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone 1" value="<?php echo isset($user_details->phone)?$user_details->phone:'';?>">
                        <label for="Phone1">Phone 1</label>
                        <div class="hi-inpt-icon"><i class="fas fa-phone"></i></div>
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <div class="form-floating  position-relative">
                        <input type="text" class="form-control" id="Phone2" name="phone2" placeholder="Phone 2" value="<?php echo isset($user_details->phone2)?$user_details->phone2:'';?>">
                        <label for="Phone2">Phone 2</label>
                        <div class="hi-inpt-icon"><i class="fas fa-phone"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="company" name="company" placeholder="Company" value="<?php echo isset($user_details->company)?$user_details->company:'';?>">
                        <label for="Company">Company</label>
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="job_title" name="job_title" placeholder="Job Title" value="<?php echo isset($user_details->job_title)?$user_details->job_title:'';?>">
                        <label for="JobTitle">Job Title</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-floating">
                      <textarea class="form-control" id="about" name="about" placeholder="Bio"><?php echo isset($user_details->about)?$user_details->about:'';?></textarea>
                      <label for="Bio">Bio</label>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6 pt-4">
                      <div class="form-floating">
                        <textarea class="form-control" id="address" name="address" placeholder="Billing Address"><?php echo isset($user_details->address)?$user_details->address:'';?></textarea>
                        <label for="address">Billing Address</label>
                      </div>
                    </div>
                    <div class="form-group col-md-6 position-relative pt-4">
                      <div class="position-absolute hic-right">
                        <input type="checkbox" id="myCheck" onclick="myFunction()"> 
                        <label for="myCheck">Same as Billing Address:</label> 
                      </div>
                      <div class="form-floating">
                        <textarea class="form-control" id="shipping_address" name="shipping_address" placeholder="Shipping Address"><?php echo isset($user_details->shipping_address)?$user_details->shipping_address:'';?></textarea>
                        <label for="shipping_address">Shipping Address</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                  </div>
                  <div class="form-group text-right">
                    <button type="submit" class="btn btn-lbl">Cancel & Restore</button>
                    <button type="submit" name="submit" id="submit"  class="btn btn-lbl">Save Changes</button>
                    <input type="hidden" name="action" value="<?php echo @$edit_id; ?>" >
                  </div>
                </form>
              </div>
            </div>

<!-- ============================================================================== -->

<div class="tab-pane fade  <?php echo ($tab == 'tab2') ? 'active show' : ''; ?>" id="Education" role="tabpanel" aria-labelledby="profile-tab3">
</div> 
<!-- ============================================================================== -->  
<div class="tab-pane fade  <?php echo ($tab == 'tab3') ? 'active show' : ''; ?>" id="Work" role="tabpanel" aria-labelledby="contact-tab3">
<!-- ============================================================================== -->  
</div>
<!-- ============================================================================== -->
<div class="tab-pane fade  <?php echo ($tab == 'tab4') ? 'active show' : ''; ?>" id="Achievements" role="tabpanel" aria-labelledby="contact-tab3">
            
</div>
<!-- ============================================================================== -->            
  <!------------------------------------------------->          
            
            
        
                    </div>
                  </div>
                </div>
              </div>
      </div>
  </div>
</section>
  </div>

  <script>
          function myFunction() {
            var checkBox = document.getElementById("myCheck");    
            var textBil = document.getElementById("address");  
            var textShip = document.getElementById("shipping_address");
            if (checkBox.checked == true){
                  textShip.value=textBil.value;  
            } else {
                  textShip.value="";
            }
          }
        
      $(document).ready(function() {
        loadEducation();
        loadWork();
        loadAchievements();
        $("#user_image").on('change', function() {
          //Get count of selected files
          var countFiles = $(this)[0].files.length;
          var imgPath = $(this)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
          var image_holder = $("#image-holder");
          image_holder.empty();
          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof(FileReader) != "undefined") {
              //loop for each file selected for uploaded.
              for (var i = 0; i < countFiles; i++) 
              {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $("<img />", {
                    "src": e.target.result,
                    "class": "rounded-circle author-box-picture"
                  }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[i]);
              }
            } else {
              alert("This browser does not support FileReader.");
            }
          } else {
            alert("Pls select only images");
          }
        });
      });

      function loadEducation() {
        $.ajax({
           // url: url,
            url:"<?php echo site_url() ?>Education/",  
           // dataType: "html",
				    method: 'post',
            success: function(data) {
              //alert(data);
              $('#Education').html(data) ;
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }

    function loadWork() {
        $.ajax({
           // url: url,
            url:"<?php echo site_url() ?>Experiences/",  
           // dataType: "html",
            method: 'post',
            success: function(data) {
              //alert(data);
              $('#Work').html(data) ;
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }

    function loadAchievements() {
        $.ajax({
           // url: url,
            url:"<?php echo site_url() ?>Achievements/",  
           // dataType: "html",
            method: 'post',
            success: function(data) {
              //alert(data);
              $('#Achievements').html(data) ;
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }
    
      $(document).on('click', '.update', function(){  
           var user_id = $(this).attr("id");  
           $.ajax({  
                url:"<?php echo base_url() ?>Users/view_test/",  
                method:"POST",  
                data:{user_id:user_id},  
                dataType:"json",  
                success:function(data)  
                {  
                   
                  
               
                     
                     $('#test').val(data.name);  
                 $('#uni').val(data.university);  
         $('#start').val(data.start_date); 
              $('#end').val(data.end_date); 
                   $('#des').val(data.description); 
                    $('#eduid').val(data.education_id); 
                }  
           })  
      });  

</script>