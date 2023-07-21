
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="">
		<meta name="description" content="">
	
		
		<link href="https://hiconnect.co.in/css/jquery-ui.min.css" rel="stylesheet">
		<link href="https://hiconnect.co.in/css/bootstrap.min.css" rel="stylesheet">
		
   
		
		
		
	</head>
<body>
<div class="main-content">
      
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header d-flex" style="justify-content: space-between;">
                    <h4>Leads Report</h4>
                   <!-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1" id="k">Add Activities</button>-->
                                <button class="btn btn-lg btn-success text-center pull-right" data-toggle="modal" data-target="#modal-fullscreen">Create Invoice</button>

                  </div>
              
                  </div>
                
           
</div>
</div>
</section>
</div>
<div class="modal modal-fullscreen fade" id="modal-fullscreen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Create Invoice</h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <input type="text" data-type="productCode" name="itemNo[]" id="itemNo_1" class="form-control autocomplete_txt" autocomplete="off">
							
								
							
							
							
						
							<!-- End Here -->
						
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
	<script>
//autocomplete script
$(document).on('focus','.autocomplete_txt',function(){

	$(this).autocomplete({
		source: function( request, response ) {
          
			$.ajax({
			  url:"<?php echo base_url() ?>Enquiries/view_lead1/",  
				dataType: "json",
				method: 'post',
				data: {
				   name_startsWith: request.term
				  
				},
				 success: function( data ) {
                    alert("hj");
				}
			});
		},
		autoFocus: true,	      	
		minLength: 0,
		appendTo: "#modal-fullscreen",
		      	
	});
});
</script>
	<script src="https://hiconnect.co.in/js/jquery.min.js"></script>
    <script src="https://hiconnect.co.in/js/jquery-ui.min.js"></script>
    <script src="https://hiconnect.co.in/js/bootstrap.min.js"></script>

    
	
	
    
	<script src="https://hiconnect.co.in/js/script.js"></script>
</body>
</html>
