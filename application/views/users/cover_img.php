 
 <div class="main-content">
<!--================================================================================================== -->
 <section class="hi-qr-delete">
	<div class="row ">
          <div class="col-12">
			<div class="col-12 p-0">
                <div class="card shadow-none mb-0 vh-100 radius-lr">
                  <div class="card-body">
						<div class="hi-customize-cover">
							<h3>Customize Cover Image</h3>
							<div class="hi-cover-image d-flex justify-content-center align-items-center position-relative">
							<img   src="<?php if(isset($show_selected_cover)){ echo base_url('uploads/cover_images/'.$show_selected_cover);}else  echo base_url('assets/img/users/cover-sample.png') ?>" width="400px" height="400px"/>
							<div class="hi-edit-cover">
								<button type="button" class="hi-edit-cvr-btn" data-toggle="modal" data-target="#EditCoverPhoto"><i class="fas fa-camera"></i><span>Edit cover photo</span></button>
							</div>
							</div>
						</div>
<div class="modal fade" id="EditCoverPhoto" tabindex="-1" role="dialog" aria-labelledby="formModal"
aria-hidden="true">
<div class="modal-dialog hi-select-images" role="document">
<div class="modal-content">
  <div class="modal-header">
	<h5 class="modal-title" id="formModal">Select Photo</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>
  <div class="modal-body">
<ul class="nav nav-pills hic-pills" id="myTab3" role="tablist">
  <li class="nav-item">
	<a class="nav-link active" id="home-tab3" data-toggle="tab" href="#UploadPhoto" role="tab"
	  aria-controls="home" aria-selected="true">Upload Photo</a>
  </li>
  <li class="nav-item">
	<a class="nav-link" id="profile-tab3" data-toggle="tab" href="#ChooseFromLibrary" role="tab"
	  aria-controls="profile" aria-selected="false">Choose from library</a>
  </li>
</ul>
                    <div class="tab-content" id="myTabContent2">
					
<div class="tab-pane fade show active" id="UploadPhoto" role="tabpanel" aria-labelledby="home-tab3" style="padding-bottom:45px;">
 <!-- =============================================================================== -->
 <div class="wi-hund">
<div class="row">
<div class="hi-wrap-padd" >
					                      <form name="user"  method="post" class="dropzone wi-hund"  enctype="multipart/form-data" >

                      <div class="fallback" >
                        <input name="cover_image" id="cover_image" type="file" multiple />
                      </div>
                           
</div>
<input class="btn btn-primary" type="submit" name="fileSubmit" value="SUBMIT"/>
                   </div>
</div>
<!-- ============================================================================== -->
</div>
	<div class="tab-pane fade" id="ChooseFromLibrary" role="tabpanel" aria-labelledby="profile-tab3">
	<div class="wi-hund">
		<div class="d-flex pb-3">
			<div class="pr-2">
			Category
			</div>
			<div>
	<select name="country" id="country" class="form-control">
  <?php 
                         if(isset($categories) && count($categories)):
                          foreach($categories as $category) :
                          ?>
                          <option value="<?php echo $category['category_id'];?>"  <?php if(isset($selected_category)){echo ($selected_category== $category['category_id'])?'selected':'';} ?>
                        ><?php echo $category['category'];?></option>
                           <?php  
                        endforeach; 
                         endif; ?>
	</select>
			</div>
		</div>
		
		<h3>Abstract</h3>
		 
<div class="wi-hund" id="test">
<div class="row" id="state">

	
	   <?php 
                         //if(isset($show_images) && $show_images!=''):
                          //foreach($show_images as $show_image) : 
                          ?>
	
	<?php  
                       // endforeach; 
                        // else: 
                         ?>
                           <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 text-center ">
                             </div>
                          <?php
                          //endif; 
                          ?>
</div>
</div>		
</div>
                    </div>
  </div>
</div>
</div>
</div>
				  

					
					
					
					
					 </form>
					
					
					
					
					
                  </div>
                </div>
              </div>
		  </div>
	</div>
</section>
  </div>
  <script>
$(document).ready(function(){
 $('#country').change(function(){
  var country_id = $('#country').val();
  if(country_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>set_cover/fetch_state",
    method:"POST",
    data:{country_id:country_id},
    success:function(data)
    {
     $('#state').html(data);
  
    }
   });
  }
  else
  {
  
  }
 });


 
});
</script>

       <script type="text/javascript">
            function SetCover(e)
            {
              
              $('#set_coverimg').val(e);
               $.ajax({
    url:"<?php echo base_url(); ?>set_cover/update_cover",
    method:"POST",
    data:{cover_id:e},
    success:function(data)
    {
  
    window.location.reload();
    }
   });
            }
          </script>

	<script>    
		$(document).ready(function(){      
    	var link = $('#card_link').val();
        $('#qr_text').val(link);
        var country_id = '';
  
   $.ajax({
    url:"<?php echo base_url(); ?>set_cover/fetch_state",
    method:"POST",
    data:{country_id:country_id},
    success:function(data)
    {
     $('#state').html(data);
  
    }
   });
  
    });
	
</script>
<script>
    
</script>