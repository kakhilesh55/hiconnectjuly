
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4>Company Details</h4>
                  </div>
                   <?php 
                  if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php } ?>
                  <form name="company" method="post" action="<?= base_url('company/company_details') ?>" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row ">
                     <div class="col-md-3 text-center">
                         <div class="form-row">
                          <div class="form-group">
                            <div class="author-box-center">
                              <div id="image-holder">
                                <img alt="image" src="<?php if(isset($company_details->company_image) && ($company_details->company_image!='')) { echo base_url('uploads/company_images/'.$company_details->company_image); } else { echo base_url('uploads/company_images/default_company.jpg'); } ?>" class="rounded-circle author-box-picture" style="height: 200px;width:200px;">
                                </div>
                                <label for="profile"> 
                                    <input type="file" name="company_image" id="company_image" class="form-control" />
                                </label>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                      <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="Company_name">Company Name</label>
                        <input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo isset($company_details->company_name)?$company_details->company_name:'';?>" required="" >
                      </div>
                       <div class="form-group col-md-4">
                        <label for="inputEmail4">Year of Establishment</label>
                        <input type="number" class="form-control" id="established_year" name="established_year" value="<?php echo isset($company_details->year_start)?$company_details->year_start:'2020';?>" required="">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="business_nature">Nature of Business</label>
                        <input type="text" class="form-control"name="business_nature" id="business_nature" value="<?php echo isset($company_details->business_nature)?$company_details->business_nature:'';?>" required="">
                      </div>
                    </div>
                    <div class="form-row">
                     <div class="form-group col-md-12">
                        <label for="type">About</label>
                        <textarea class="form-control" id="description" name="description" maxlength="250"><?php echo isset($company_details->description)?$company_details->description:'';?></textarea>
                      </div>
                    </div>
                    </div>
                  </div>
                  </div>
                  <div class="card-footer">
                   <?php if(!empty($company_details)){?>
                          <input type="hidden" name="action" value="<?php echo $company_details->company_id; ?>" >
                         <?php  } else {?>
                          <input type="hidden" name="action" value="create">
                          <?php } ?>
                    <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Save">
                  </div>
                </form>
                </div>
              </div>
              </div>
            </section>
          </div>
    <script>
    $(document).ready(function() {
        $("#company_image").on('change', function() {
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
    </script>
