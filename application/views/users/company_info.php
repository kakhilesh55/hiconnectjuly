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
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <?php $tab = (isset($tab)) ? $tab : 'tab1'; ?> 
            <ul class="nav nav-pills hic-pills" id="myTab3" role="tablist">
              <li class="nav-item">
                <a class="nav-link  <?php echo ($tab == 'tab1') ? 'active' : ''; ?>" id="home-tab3" data-toggle="tab" href="#Company-info" role="tab"
                          aria-controls="home" aria-selected="true">Company Info</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  <?php echo ($tab == 'tab2') ? 'active' : ''; ?>" id="profile-tab3" data-toggle="tab" onclick="loadContactDetails()" href="#Contact" role="tab"
                          aria-controls="profile" aria-selected="false">Contact Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo ($tab == 'tab3') ? 'active' : ''; ?>" id="contact-tab3" data-toggle="tab" onclick="loadTestimonials()" href="#Testimonials" role="tab"
                          aria-controls="contact" aria-selected="false">Testimonials</a>
              </li>
            </ul>
            <!-- ============================================================================== -->
            <div class="tab-content" id="myTabContent2">
              <div class="tab-pane fade show <?php echo ($tab == 'tab1') ? 'active' : ''; ?>" id="Company-info" role="tabpanel" aria-labelledby="home-tab1">
                     <div class="hic-tab-data">

                  <form class="hic-dash-form pt-3" name="user" method="post" action="<?= base_url('company/company_details') ?>" enctype="multipart/form-data">
                    <div class="d-flex align-items-center justify-content-center">
                      <div class="author-box-center">
                        <div id="image-holder" class="text-center">
                          <img alt="image" src="<?php if(isset($company_details->company_image) && ($company_details->company_image!='')) { echo base_url('uploads/company_images/'.$company_details->company_image); } else { echo base_url('uploads/company_images/default_company.jpg'); } ?>" class="rounded-circle author-box-picture" style="height: 200px;width:200px;">
                        </div>
                        <label for="profile"> 
                          <input type="file" name="company_image" id="company_image" class="form-control" />
                        </label>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" value="<?php echo isset($company_details->company_name)?$company_details->company_name:'';?>" required="">
                          <label for="Company_name">Company Name</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-floating">
                        <input type="number" class="form-control" id="established_year" name="established_year" placeholder="Email" value="<?php echo isset($company_details->year_start)?$company_details->year_start:'2020';?>" required="" >
                        <label for="Email">Year of Establishment</label>
                      </div>
                    </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <div class="form-floating position-relative">
                        <input type="text" class="form-control" id="business_nature" name="business_nature" placeholder="Nature of Business" value="<?php echo isset($company_details->business_nature)?$company_details->business_nature:'';?>">
                        <label for="Phone1">Nature of Business</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="website" name="website" placeholder="Website" value="<?php echo isset($company_details->website)?$company_details->website:'';?>">
                        <label for="Company">Website</label>
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="gstin" name="gstin" placeholder="GSTIN" value="<?php echo isset($company_details->gstin)?$company_details->gstin:'';?>">
                        <label for="JobTitle">GSTIN</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-floating">
                      <textarea class="form-control" id="description" name="description" placeholder="About Company"><?php echo isset($company_details->description)?$company_details->description:'';?></textarea>
                      <label for="description">About Company</label>
                    </div>
                  </div>

                  <div class="form-group">
                  </div>
                  <div class="form-group text-right">
                    <button type="submit" class="btn btn-lbl">Cancel & Restore</button>
                    <button type="submit" name="submit" id="submit"  class="btn btn-lbl">Save Changes</button>
                    <?php if(!empty($company_details)){?>
                          <input type="hidden" name="action" value="<?php echo $company_details->company_id; ?>" >
                         <?php  } else {?>
                          <input type="hidden" name="action" value="create">
                          <?php } ?>
                  </div>
                </form>
              </div>       
              </div>

              <!-- ============================================================================== -->

              <div class="tab-pane fade  <?php echo ($tab == 'tab2') ? 'active show' : ''; ?>" id="Contact" role="tabpanel" aria-labelledby="profile-tab2">
              </div> 
              <!-- ============================================================================== -->  
              <div class="tab-pane fade  <?php echo ($tab == 'tab3') ? 'active show' : ''; ?>" id="Testimonials" role="tabpanel" aria-labelledby="contact-tab3">
              <!-- ============================================================================== -->  
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
        
      $(document).ready(function() {
       // loadCompanyDetails();
        loadContactDetails();
        loadTestimonials();
      });

      /*function loadCompanyDetails() {
        $.ajax({
            url:"<?php echo site_url() ?>Company/",  
            method: 'post',
            success: function(data) {
              $('#Company-info').html(data) ;
            }
        });
    }*/

      function loadContactDetails() {
        $.ajax({
            url:"<?php echo site_url() ?>Contact/",  
				    method: 'post',
            success: function(data) {
              $('#Contact').html(data) ;
            }
            /*,
            error: function(xhr, status, error) {
                console.log(error);
            }*/
        });
    }
    function loadTestimonials() {
        $.ajax({
            url:"<?php echo site_url() ?>Testimonials/",  
            method: 'post',
            success: function(data) {
              $('#Testimonials').html(data) ;
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }

</script>