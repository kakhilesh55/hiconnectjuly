
<style>
    #table-1 .btn-danger {
    background: #fc544b!important;
    
}
 
 .ui-front {
    z-index: 2000 !important;
}
ul.ui-autocomplete {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    float: left;
    display: none;
    min-width: 160px;
    margin: 0 0 10px 25px;
    list-style: none;
    background-color: #ffffff;
    border: 1px solid #ccc;
    border-color: rgba(0, 0, 0, 0.2);
    //@include border-radius(5px);
    @include box-shadow( rgba(0, 0, 0, 0.1) 0 5px 10px );
    @include background-clip(padding-box);
    *border-right-width: 2px;
    *border-bottom-width: 2px;

    li.ui-menu-item{
        padding:0 .5em;
        line-height:2em;
        font-size:.8em;
        &.ui-state-focus{
            background: #F7F7F7;
        }
    }

}
</style>
     
    <!-- jQuery UI -->
  <link rel="stylesheet" href="https://hiconnect.co.in/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">

<link rel="stylesheet" href="https://hiconnect.co.in/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css"> 
<link rel="stylesheet" href="https://hiconnect.co.in/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css"> 
<div class="main-content">
      
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header d-flex" style="justify-content: space-between;">
                    <h4>Leads Report</h4>
                   <!-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1" id="k">Add Activities</button>-->
                                       <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">Add Leads</button>

                  </div>
                   <?php 
                  if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php } ?>
                  <div class="card-body">
       <input type="hidden" id="autouser1" name="name" class="form-control ab" >

<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ui-front">
        <div class="modal-content">
            <div class="modal-header">

            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
                  <form name="enquiry_form" method="post" action="">
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label>From Date</label>
                        <input type="date" class="form-control" name="from_date" id="from_date" value="<?php echo(isset($from_date))?$from_date:''; ?>">
                      </div>

                      <div class="form-group col-md-4">
                        <label>To Date</label>
                        <input type="date" class="form-control" name="to_date" id="to_date" value="<?php echo(isset($to_date))?$to_date:''; ?>">
                      </div>

                      <div class="form-group col-md-4 cover Select" style="padding-top: 30px">
                         <input class="btn btn-primary" type="submit" name="search" id="search" value="Search"/>
                      </div>
                    </div>
       
                </form>

                    </div>


</head>
<body>


 
                <?php if(isset($leads)) { ?>
              <div class="row">
              <div class="col-12">
                  <div class="card-body">
                    
                    <div class="table-responsive">
                      <?php if(isset($enquiries) && $enquiries>1){?>
                        <button  name="btnExport" class="pull-right btn btn-primary btn-xs" onclick="generate_excel()" ><i class="fa fa-file-excel-o"></i> Export data to Excel</button>
                      <?php } ?>
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Comment</th>
                          
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                         if(isset($leads) && is_array($leads) && count($leads)): $slno=1; 
                          foreach($leads as $lead) : 
                            $id=$lead['id'];
                           // echo $id;
                          ?>
                          <tr>
                           <td><?php echo $slno;?></td>
                           <td class="test" style="display:none;"><?php echo $lead['id'];?></td>
                           <td class="test1"><?php echo $lead['name'];?></td>
                           
                           <td><?php if($lead['type']==2) echo "call"; else if($lead['type']==3)echo "Meeting";else if($lead['type']==4) echo "email"; else if($lead['type']==5)echo "Chat";?></td>
                           <td><?php echo $lead['comment'];?></td>
                           <td><?php echo $lead['date'];?></td>
                           <td><?php  if($lead['status']==1) echo "Sheduled"; else if($lead['status']==2)echo "Completed";?>
                        
                          </td>
                           <td>
                      <!--<button class="btn btn-success gfgselect" data-bs-toggle="modal" data-bs-target="#exampleModal1" id="k"><i class="far fa-edit mr-1"></i>Add Activity</button>-->
<a href="#" id="<?php echo $id;?>" data-bs-toggle="modal" data-bs-target="#exampleModal22" class="btn btn-primary update" title="Edit"><i class="fa fa-edit"></i></a>                        <a href="<?php echo site_url('manage_products/delete_lead/'.$lead['id'])?>" class="btn btn-danger mr-2"><i class="far fa-trash-alt mr-1"></i> </a>
                          
                          
                          </td>
                          </tr>
                           <?php  
                          $slno++;
                        endforeach; 
                        else: ?>
                          <tr>
                              <td colspan="3" align="center" >No Records Found..</td>
                          </tr>
                          <?php
                              endif;?>
                        </tbody>
                      </table>
   
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
            </div>

              </div>
              </div>
            </section>
          </div>
       <form  method="POST" name="lead"  action="<?php echo base_url() ?>Enquiries/update_lead">
           
   <div class="modal fade" id="exampleModal22" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Edit Activity</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <div class="mb-3">
        <label for="" class="form-label">Add Lead</label>
<!-- <input type="text" id="autouser" name="name" class="form-control ab" >-->
 <input type="text" data-type="productCode" name="itemNo[]" id="itemNo_1" class="form-control autocomplete_txt" autocomplete="off" name="name">
                                           
  

          </div>
       
          <div class="mb-3">
          <label for="" class="form-label">Activity Type</label>
          <input type="hidden" id="ename" name="eid">
        <select class="form-select form-control" aria-label="Default select example" name="type">
          <option selected>Open this select menu</option>
          <option value="2">Call</option>
          <option value="3">Meeting</option>
          <option value="4">Email</option>
          <option value="5">Chat</option>
        </select>
          </div>
          <div class="mb-3">
          <label for="" class="form-label">Status</label>
         <div class="d-flex">
         <div class="form-check">
            <select class="form-select form-control" aria-label="Default select example" name="status">
          <option selected>Open this select menu</option>
          <option value="1">Scheduled</option>
          <option value="2">Completed</option>
      
        </select>
          
          </div>
         </div>
          </div>
         
          <div class="mb-3">
            <label for="" class="form-label">Date - Time</label>
            <input type="date" class="form-control" name="date" id="date" placeholder="name@example.com">
          </div>
                <div class="mb-3">
        <label for="" class="form-label">Comments</label>
        <textarea class="form-control" name="comment"  id="comment" rows="5"></textarea>
      </div>
      <div class="modal-footer m-auto">
        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Edit</button>
        <button type="button" class="btn btn-primary">Reset</button>
      </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
       <form  method="POST" name="lead"  action="<?php echo base_url() ?>Enquiries/add_lead">
      <input type="text" id="userid" name="name" class="form-control" > 
          <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Add Activity</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
 
        <div class="mb-3">
        <label for="" class="form-label">Add Lead</label>
 <input type="text" data-type="productCode" name="itemNo[]" id="itemNo_1" class="form-control autocomplete_txt" autocomplete="off" name="nameee">

                                      
  

          </div>
       
          <div class="mb-3">
          <label for="" class="form-label">Activity Type</label>
          <input type="text" id="ename" name="eid">
        <select class="form-select form-control" aria-label="Default select example" name="type">
          <option selected>Open this select menu</option>
          <option value="2">Call</option>
          <option value="3">Meeting</option>
          <option value="4">Email</option>
          <option value="5">Chat</option>
        </select>
          </div>
          <div class="mb-3">
          <label for="" class="form-label">Status</label>
         <div class="d-flex">
         <div class="form-check">
            <select class="form-select form-control" aria-label="Default select example" name="status">
          <option selected>Open this select menu</option>
          <option value="1">Scheduled</option>
          <option value="2">Completed</option>
      
        </select>
          
          </div>
         </div>
          </div>
         
          <div class="mb-3">
            <label for="" class="form-label">Date - Time</label>
            <input type="text" class="form-control datetimepicker" name="date" id="" >
          </div>
                <div class="mb-3">
        <label for="" class="form-label">Comments</label>
        <textarea class="form-control" name="comment"  id="comment" rows="5"></textarea>
      </div>
      <div class="modal-footer m-auto">
        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Add</button>
        <button type="button" class="btn btn-primary">Reset</button>
      </div>
        </form>
      </div>
     
    </div>
  </div>
</div>



    </div>
  </div>
</div>
    <!-- jQuery UI -->
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


				}
			});
		},
		autoFocus: true,	      	
		minLength: 0,
		appendTo: "#modal-fullscreen",
		      		select: function( event, ui ) {
			var names = ui.item.data.split("|");
			id_arr = $(this).attr('id');
	  		id = id_arr.split("_");
	  		console.log(names, id);
	  		
	  		$('#userid').val("jghj");
			$('#itemNo_'+id[1]).val(names[0]);
			$('#itemName_'+id[1]).val(names[1]);
			$('#quantity_'+id[1]).val(1);
			$('#price_'+id[1]).val(names[2]);
			$('#total_'+id[1]).val( 1*names[2] );
			calculateTotal();
		}
	});
});
</script>
<script src="https://hiconnect.co.in/assets/js/app.min.js"></script>
    <script src="https://hiconnect.co.in/js/jquery-ui.min.js"></script>
<script src="https://hiconnect.co.in/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="https://hiconnect.co.in/assets/js/custom.js"></script>
  <script src="https://hiconnect.co.in/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>

      <script src="https://hiconnect.co.in/assets/js/page/forms-advanced-forms.js"></script>

	  <script src="https://hiconnect.co.in/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="https://hiconnect.co.in/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
	
    
	<script src="https://hiconnect.co.in/js/script.js"></script>

<script>


$(function () {
                // ON SELECTING ROW
                $(".gfgselect").click(function () {
   //FINDING ELEMENTS OF ROWS AND STORING THEM IN VARIABLES
                    var a =
             $(this).parents("tr").find(".test").text();
             var b =
             $(this).parents("tr").find(".test1").text();
                  // alert(b);
                   $('#ename').val(a);
                   $('#name').val(b);
                
            });
          });
        </script>

<script type="text/javascript">
  function generate_excel(){
    var from_date = $('#from_date').val();
    var to_date = $('#to_date').val();
    var page = 'enquiries/generatexls/'+from_date+'/'+to_date;
    $.ajax({
        type: "POST",
        url: page,
        data: {'from_date': from_date ,'to_date': to_date},
       success: function(data){
          document.location.href = page;
                //window.open(page,'_blank');
            },
    });

  }




</script>


<script>
      $(document).on('click', '.update', function(){  
           var user_id = $(this).attr("id");  
      
           $.ajax({  
                url:"<?php echo base_url() ?>Enquiries/view_lead21/",  
                method:"POST",  
                data:{user_id:user_id},  
                dataType:"json",  
                success:function(data)  
                {  
                    
                 if(data.status==2)
                 {
                     
                      $('#status').val("Follow Up"); 
                 }
                 else if(data.status==1)
                 {
                      $('#status').val("New"); 
                 }
                  else if(data.status==3)
                 {
                      $('#status').val("Won"); 
                 }
                   else if(data.status==4)
                 {
                      $('#status').val("Unqualified/lost"); 
                 }
                     $('#exampleModal22').modal('show');  
                     $('#autouser').val(data.name);  
                
                     $('#comment').val(data.comment); 
                         $('#date').val(data.date); 
                     $('#userid').val(data.id); 
                    $('#action').val("Edit");  
                }  
           })  
      });  

</script>











