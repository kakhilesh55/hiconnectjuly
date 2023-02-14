 <div class="main-content">
    <section class="section">
      <div class="row ">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Generate QRcode</h4>
              </div>
              <?php  if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php } ?>
              <div class="card-body align-center">

              	<form action="" method="post" class="needs-validation" novalidate="">
              		<div class="form-group">
	                   <input type="hidden" value="" class="form-control" id="qr_text" name="qr_text" required="required" placeholder="">
	                </div>
	                <?php  if(empty($qr_details)){ ?>
	               	<div class="form-group">
                    	<input type="hidden" name="action" value="generate_qrcode">
	                	<input type="submit" name="submit" class="btn btn-primary"  value="Generate QR">
	                </div>
                    <?php }  ?>
				</form>
				<?php if ($qr_details) {  ?>
				<div class="form-group">
					<p>Your QRcode Image here. Scan this to get result</p>
					<img src="<?php echo base_url('uploads/qr_image/'.$qr_details->qr_image); ?>" alt="QRCode Image" style="width:100%">
				</div>
				<div class="form-group">
					<a  class="btn btn-primary" href="<?php echo base_url('uploads/qr_image/'.$qr_details->qr_image); ?>" download="<?php echo $qr_details->qr_image; ?>">Download QR</a>
				</div>
				<?php } else if($img_url) { ?>
				<div class="form-group">
					<p>Your QRcode Image here. Scan this to get result</p>
					<img src="<?php echo base_url('uploads/qr_image/'.$img_url); ?>" alt="QRCode Image" style="width:100%">
				</div>
				<div class="form-group">
					<a class="btn btn-primary" href="<?php echo base_url('uploads/qr_image/'.$img_url); ?>" download="<?php echo $img_url;?>">Download QR</a>
				</div>
				<?php } ?>

              </div>
            </div>
          </div>
        </div>
    </section>
  </div>

	<script>    
		$(document).ready(function(){      
    	var link = $('#card_link').val();
        $('#qr_text').val(link);
    });
	
</script>