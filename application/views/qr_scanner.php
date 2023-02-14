
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  </head>
  <body>
    <div class="container" style="margin-top:200px;">
    <div class="row">
      
        <div class="col-md-6">
    <video id="preview" style="width: 100%;"> </video>
</div>
<div class="col-md-6">

<input type="text" value="" id="scanner" readonly class="form-control">
<input type="hidden" value="<?php echo $user;?>" id="user" readonly class="form-control" >
</div>
  <div class="col-md-4"></div>
   <div class="col-md-4">
	<div class="form-group">
					<p>Your QRcode Image here. Scan this to get result</p>
					<img src="<?php echo base_url('uploads/qr_image/'.$qr_details->qr_image); ?>" alt="QRCode Image" style="width:100%">
				</div>
				<div class="form-group">
					<a class="btn btn-primary" href="<?php echo base_url('uploads/qr_image/'.$qr_details->qr_image); ?>" download="<?php echo $qr_details->qr_image;?>">Download QR</a>
				</div>
</div>
</div>
   
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
    alert("Updated Sucessfully")
}
else
{
    alert("Invalid/Already Existed Qr");
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
  </body>
</html>