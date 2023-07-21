 <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 <div class="main-content">
<!--================================================================================================== -->
 <section class="hi-qr-delete hic-paddg">
	<div class="row ">
          <div class="col-12 p-0">
			<div class="col-12 p-0">
                <div class="card shadow-none border-0 hi-calc">
                  <div class="card-body p-0">
						
						
						
						
<div class="rzow">
<ul class="nav nav-pills hic-pills" id="myTab3" role="tablist">
  <li class="nav-item">
	<a class="nav-link active" id="home-tab3" data-toggle="tab" href="#hiBegin" role="tab"
	  aria-controls="home" aria-selected="true">Begin</a>
  </li>
  <li class="nav-item">
	<a class="nav-link" id="profile-tab3" data-toggle="tab" href="#hiScan" role="tab"
	  aria-controls="profile" aria-selected="false">Scan</a>
  </li>
  <li class="nav-item">
	<a class="nav-link" id="profile-tab3" data-toggle="tab" href="#hiDevices" role="tab"
	  aria-controls="profile" aria-selected="false">My devices</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent2">
<div class="tab-pane fade show active" id="hiBegin" role="tabpanel" aria-labelledby="home-tab3" style="padding-bottom:45px;">
 <!-- =============================================================================== -->

  
  
 <div class="wi-hund">
<div class="hi-device">
							<!-- d-flex justify-content-center align-items-center position-relative -->
<div class="hic-device">
<div class="row">
	<div class="col-md-6 col-sm-12 text-center position-relative hic-activation mb-4 p-0">
	<div class="hit-padd-5">
	<div class="hit-padd-7">
	<div class="hit-device">
		<img class="img-fluid" src="<?php echo base_url(); ?>assets/img/users/scan-sample1.png"/>
		<h3>Scan your QR Code to <br> Begin Activation</h3>
			<button type="button" class="hi-edit-cvr-btn"  id="profile-tab3" data-toggle="tab" href="#hiScan" >Begin  Activation</button>
			<div class="one-pxh"></div>
	</div></div></div></div>
	<div class="col-md-6 col-sm-12 text-center hic-activation p-0">
	<div class="hit-padd-5">
	<div class="hit-padd-7">
	<div class="hit-device">
	<img class="img-fluid" src="<?php echo base_url(); ?>assets/img/users/scan-sample2.png"/>
	<h3>Get hiConnect Device</h3>
	<p>Don't have any devices?</p>
	<p>Purchase theme here</p><br>
	<button type="button" class="hi-edit-cvr-btn"  id="profile-tab3" data-toggle="tab" href="#hiDevices">Get Device</button>
	</div></div></div>
	</div></div>
</div>

							
						</div>


</div>

<!-- ============================================================================== -->


</div>
<div class="tab-pane fade" id="hiScan" role="tabpanel" aria-labelledby="profile-tab3">
<div class="wi-hund">
<div class="row">
<div class="wi-hund">
	<div class="hi-yellow-bg">
	To activate your hiConnect device, hold the device infront of the camera. The camera will automatically detect the QR code and activate it.
	</div>
	<div class="hi-camera">
	      
<input type="text" value="" id="scanner" readonly class="form-control">
<input type="hidden" value="<?php echo $user;?>" id="user" readonly class="form-control" >
    <video id="preview" class="hi-cam-video" style="" width="472px" height="472px"> </video>
	<!--	<img class="" src="<?php echo base_url(); ?>assets/img/users/black-camera-sample.png"/>-->
	</div>

			<div class="one-pix-grey"></div>
	</div>

</div>
</div>		
</div>
<div class="modal fade" id="BeginScan" tabindex="-1" role="dialog" aria-labelledby="formModal"
aria-hidden="true">
<div class="modal-dialog hi-hooray" role="document">
<div class="modal-content">
  <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>
  <div class="modal-body">
  <div class="d-flex justify-content-center align-items-center position-relative text-center"><div>
  <img class="" src="<?php echo base_url(); ?>assets/img/users/hooray-sample.png"/>

  <h3>Hooray!</h3>
  <p>You have successfully activated your device.<br> Thank you for choosing hiConnect as your<br> Networking Partner</p>
  <button type="button" class="hi-edit-cvr-btn">Back to Dashboard</button>
  </div></div>
  </div>
</div>
</div>
</div>
<div class="modal fade" id="BeginActivation" tabindex="-1" role="dialog" aria-labelledby="formModal"
aria-hidden="true">
<div class="modal-dialog hi-hooray" role="document">
<div class="modal-content">
  <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>
  <div class="modal-body">
  <div class="d-flex justify-content-center align-items-center position-relative text-center"><div>
  <img class="" src="<?php echo base_url(); ?>assets/img/users/oops-sample.png"/>
  <h3>Oops!</h3>
  <p>Something validate QR code<br> Before trying again, please ensure that<br> you are using hiConnect device</p>
  <button type="button" class="hi-edit-cvr-btn">Try Again</button>
  </div></div>
  </div>
</div>
</div>
</div>
<div class="tab-pane fade" id="hiDevices" role="tabpanel" aria-labelledby="profile-tab3">
<div class="wi-hund">
    <?php
    foreach($devices as $device)
    {
        ?>
<div class="pb-4 hit-cl-4">
	<div class="hit-devices">
		<img class="img-fluid" src="<?php echo base_url().'/uploads/manage_products/'.$device['image'];?>"/>
	</div>
	<div>
	<button type="button" class="hi-edit-cvr-btn dp-tbl mt-4">Remove</button>
	</div>
</div>
<?php
}
?>
</div>		
</div>


</div>
</div>





				  

					
					
					
					
					
					
					
					
					
					
                  </div>
                </div>
              </div>
		  </div>
	</div>
</section>

  <script type="text/javascript">
  
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
       // console.log(content);
        document.getElementById('scanner').value=content;
        var user= document.getElementById('user').value;
        //var scan=  document.getElementById('scanner').value
        //alert(content);
        $.ajax({

type: "GET",
url: "<?php echo base_url() ?>users/edit_qr/"+user+"/"+content,
dataType: "json",
success: function(data) {
   
if(data==1)
{
      $('#BeginScan').modal('show');
}
else
{
   
    
       $('#BeginActivation').modal('show');
}
//e.preventDefault();
}
});
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });

    </script>
	<script>    
		$(document).ready(function(){      
    	var link = $('#card_link').val();
        $('#qr_text').val(link);
    });
	
</script>

  </div>