 <div class="main-content">
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
<!--================================================================================================== -->
  <link rel="stylesheet" href="https://hiconnect.co.in/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">

<link rel="stylesheet" href="https://hiconnect.co.in/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css"> 
<link rel="stylesheet" href="https://hiconnect.co.in/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css"> 
 <section class="hi-pfl-view">
 <div class="card">
<div class="card-body">
    <?php 
    if(empty($leads))
    {
        ?>
    
<div class="position-relative">
<div class="d-flex align-items-center justify-content-center">
	<div class="text-center">
									<img src="<?php echo base_url(); ?>assets/img/users/No-Items.png"/>

		<h3>No Items</h3>
		<p>Items added to the task will appear here</p>
	</div>
</div>
<div class="hi-add-plus">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddActivity">Add Activities</button>
</div>
<?php
}
?>
<div class="modal fade" id="AddActivity" tabindex="-1" role="dialog" aria-labelledby="formModal"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
	<h5 class="modal-title" id="formModal">Add Activity</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>
  <div class="modal-body">
    <form  method="POST" name="lead"  class="hic-dash-form"  action="<?php echo base_url() ?>Enquiries/add_lead">
       <input type="hidden" id="userid" name="name" class="form-control" > 
<!--
<div class="form-row">
    <div class="form-group col-md-6">
<div class="form-floating">
  <input type="text" class="form-control" id="FirstName" placeholder="First Name">
  <label for="FirstName">First Name</label>
</div>
</div>
<div class="form-group col-md-6">
	<div class="form-floating">
  <input type="text" class="form-control" id="SecondName" placeholder="Second Name">
  <label for="SecondName">Second Name</label>
</div>
    </div>
</div>
-->
    <div class="form-group">
  <div class="form-floating">
 <input type="text"   id="title" class="form-control" autocomplete="off" name="title">
	<label for="Title">Title</label>
	</div>
  </div>
  <div class="form-group">
  <div class="form-floating">
   <input type="text" data-type="productCode" name="itemNo[]" id="itemNo_1" class="form-control autocomplete_txt" autocomplete="off" name="nameee">
<input type="hidden" id="ename" name="eid">
	</div>
  </div>
  <div class="form-group">
  <div class="form-floating">
    <select id="type" name="type" class="form-control" required="">
	<option value="">Activity Type</option>
	<option value="2">Call</option>
	<option value="3">Email</option>
	<option value="4">Meeting</option>
	</select>
	</div>
  </div>
  <div class="form-group">
  <div class="form-floating">
    <select id="type" name="status" class="form-control" required="">
	<option value="">Status</option>
	<option value="1">Scheduled</option>
	<option value="2">Completed</option>
	</select>
	</div>
  </div>
    <div class="form-group m-0">
    <label for="inputAddress2">Time Period</label>
  </div>
    <div class="form-group">
  <div class="form-floating">
    <input type="text" class="form-control datetimepicker" id="Name" placeholder="date" name="date">
	<label for="Name">Date</label>
	</div>
  </div>
<div class="form-group">
  <div class="form-floating">
    <select id="type" name="pr" class="form-control" required="">
	<option value="">Priority</option>
	<option value="1">Low</option>
	<option value="2">Medium</option>
	<option value="3">High</option>
	</select>
	</div>
  </div>
    <div class="form-group">
  <div class="form-floating">
    <textarea class="form-control" id="Comments" name="comment" placeholder="Comments"></textarea>
  <label for="Description">Comments</label>
	</div>
  </div>


  <div class="form-group">
    <!--<div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>-->
  </div>
  <div class="form-group text-right">
  <button type="submit" class="btn btn-lbl">Create</button>
  <button type="submit" class="btn btn-lbl">Create & add another</button>
  </div>
</form>
  </div>
</div>
</div>
</div>





<div class="modal fade" id="AddActivity1" tabindex="-1" role="dialog" aria-labelledby="formModal"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
	<h5 class="modal-title" id="formModal">Add Activity</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>
  <div class="modal-body">
  <form  method="POST" name="lead"  action="<?php echo base_url() ?>Enquiries/update_lead">
             <input type="hidden" id="userid" name="name" class="form-control" > 
<!--
<div class="form-row">
    <div class="form-group col-md-6">
<div class="form-floating">
  <input type="text" class="form-control" id="FirstName" placeholder="First Name">
  <label for="FirstName">First Name</label>
</div>
</div>
<div class="form-group col-md-6">
	<div class="form-floating">
  <input type="text" class="form-control" id="SecondName" placeholder="Second Name">
  <label for="SecondName">Second Name</label>
</div>
    </div>
</div>
-->
    <div class="form-group">
  <div class="form-floating">
 <input type="text"   id="title" class="form-control" autocomplete="off" name="title">
	<label for="Title">Title</label>
	</div>
  </div>
  <div class="form-group">
  <div class="form-floating">
   <input type="text" data-type="productCode" name="itemNo[]" id="autouser" class="form-control autocomplete_txt" autocomplete="off" name="nameee">
<input type="hidden" id="ename" name="eid">
	</div>
  </div>
  <div class="form-group">
  <div class="form-floating">
    <select id="type" name="type" class="form-control" required="">
	<option value="">Activity Type</option>
	<option value="2">Call</option>
	<option value="3">Email</option>
	<option value="4">Meeting</option>
	</select>
	</div>
  </div>
  <div class="form-group">
  <div class="form-floating">
    <select id="type" name="status" class="form-control" required="">
	<option value="">Status</option>
	<option value="1">Scheduled</option>
	<option value="2">Completed</option>
	</select>
	</div>
  </div>
    <div class="form-group m-0">
    <label for="inputAddress2">Time Period</label>
  </div>
    <div class="form-group">
  <div class="form-floating">
    <input type="text" class="form-control datetimepicker" id="Name" placeholder="date" name="date">
	<label for="Name">Date</label>
	</div>
  </div>
<div class="form-group">
  <div class="form-floating">
    <select id="type" name="pr" class="form-control" required="">
	<option value="">Priority</option>
	<option value="1">Low</option>
	<option value="2">Medium</option>
	<option value="3">High</option>
	</select>
	</div>
  </div>
    <div class="form-group">
  <div class="form-floating">
    <textarea class="form-control" id="comment" name="comment" placeholder="Comments"></textarea>
  <label for="Description">Comments</label>
	</div>
  </div>


  <div class="form-group">
    <!--<div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>-->
  </div>
  <div class="form-group text-right">
  <button type="submit" class="btn btn-lbl">Create</button>
  <button type="submit" class="btn btn-lbl">Create & add another</button>
  </div>
</form>
  </div>
</div>
</div>
</div>

























</div>
    <?php 
    if(!empty($leads))
    {
        ?>
 <section class="hi-leads">
	<div class="row">
          <div class="col-12">
			<div class="col-12">
<div class="card shadow-none m-0 pding pb-0">
			<div class="d-flex">
				<div class="col-8 pl-0 pr-0">
                  <div class="card-header d-block p-0 border-0">
                    <div class="card-header-form pb-1">
                      <form method="post">
                        <div class="input-group position-relative">
                          <input type="text" class="hi-form-control hi-search-in" placeholder="Search" name="sch">
                          <div class="input-group-btn hi-ing">
                            <input type="submit" class="hi-search-btn" name="search"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                     
                    </div>
                  </div></div>
				  <div class="col-4 pr-0 position-relative">
				  <div class="position-relative">
				      <div class="hit-export pl-2">
	  <button type="button" class="btn btn-primary btn-hvr" onclick="generate_excel()"><i class="fas fa-solid fa-file-excel"></i></button>
	  </div>
				  <div class="hit-search-sm pr-0">
				      	<button type="button" class="btn btn-primary btn-hvr bcg-grey"  onclick="generate_excel()"><i class="fas fa-solid fa-file-excel"></i> Export</button>
	<button type="button" class="btn btn-primary btn-hvr mr-0" data-toggle="modal" data-target="#AddActivity"><i class="fas fa-plus"></i> Create</button>

	
</div>
<div class="hi-fxd-plus">
<button type="button" class="btn btn-primary m-0 wi-hund btn-fxp btn-hvr" data-toggle="modal" data-target="#AddActivity"><i class="fas fa-plus"></i></button>
</div></div>				  
</div>
</div>
				  
<div class="card mb-0 rounded-0 shadow-none border-0">
                  <div class="card-body pr-0 pl-0">
                    <ul class="nav nav-pills hic-pillz" id="myTab3" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active fst-child" id="home-tab3" data-toggle="tab" href="#All" role="tab"
                          aria-controls="home" aria-selected="true">All</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#New" role="tab"
                          aria-controls="profile" aria-selected="false">Due Today</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#Won" role="tab"
                          aria-controls="contact" aria-selected="false">Over Due</a>
                      </li>
					  <li class="nav-item">
                        <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#FollowUp" role="tab"
                          aria-controls="contact" aria-selected="false">Upcomming</a>
                      </li>
                    </ul>
<div class="tab-content p-0" id="myTabContent2">
<div class="tab-pane fade show active pt-0" id="All" role="tabpanel" aria-labelledby="home-tab3">
<!-- =============================================================================== -->
<div class="row">
              <div class="col-12">
				  <div class="card">
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>No</th>
                          <th>Associated Contact</th>
                            <th>Activity Type</th>
                           
                          
                            <th>Due Date</th>
                             <th>Priority</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                          <?php 
                         if(isset($leads) && is_array($leads) && count($leads)): $slno=1; 
                          foreach($leads as $lead) : 
                            $id=$lead['id'];
                           // echo $id;
                           if($lead['priority']==1)
                           {
                               $pr='<div class="badge badge-success hi-radius">Low</div>';
                           }
                           else if($lead['priority']==2)
                           {
                               $pr='<div class="badge badge-warning">Medium</div>';
                           }
                           else if($lead['priority']==3)
                           {
                              $pr='<div class="badge badge-danger">High</div>' ;
                           }
                          ?>
                          <tr>
                           <td><?php echo $slno;?></td>
                           <td class="test" style="display:none;"><?php echo $lead['id'];?></td>
                           <td class="test1"><?php echo $lead['name'];?></td>
                           
                           <td><?php if($lead['type']==2) echo "call"; else if($lead['type']==3)echo "Meeting";else if($lead['type']==4) echo "email"; else if($lead['type']==5)echo "Chat";?></td>
                           <td><?php echo $lead['date'];?></td>
                           <td><?php echo $pr;?></td>
                           
                           <td><?php  if($lead['status']==1) echo "Sheduled"; else if($lead['status']==2)echo "Completed";?>
                        
                          </td>
                           <td class="hi-actions">
                      <!--<button class="btn btn-success gfgselect" data-bs-toggle="modal" data-bs-target="#exampleModal1" id="k"><i class="far fa-edit mr-1"></i>Add Activity</button>-->
<a href="#" id="<?php echo $id;?>" data-bs-toggle="modal" data-bs-target="#exampleModal22" class="update" title="Edit"><i class="fas fa-pencil-alt"></i></a>                        <a href="<?php echo site_url('manage_products/delete_lead/'.$lead['id'])?>" ><i class="fas fa-trash-alt"></i> </a>
                          		
                          
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
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<!-- ============================================================================== -->
</div>
<div class="tab-pane fade pt-0" id="New" role="tabpanel" aria-labelledby="profile-tab3">
 <!-- =============================================================================== -->
<div class="row">
              <div class="col-12">
                
				  <div class="card">
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>No</th>
                          <th>Title</th>
                          <th>Associated Contact</th>
                          <th>Activity Type</th>
                          <th>Due date</th>
						  <th>Priority</th>
						  <th>Action</th>
                        </tr>
                        <?php 
                         if(isset($leads1) && is_array($leads1) && count($leads1)): $slno=1; 
                          foreach($leads1 as $lead) : 
                            $id=$lead['id'];
                           // echo $id;
                           if($lead['priority']==1)
                           {
                               $pr='<div class="badge badge-success hi-radius">Low</div>';
                           }
                           else if($lead['priority']==2)
                           {
                               $pr='<div class="badge badge-warning">Medium</div>';
                           }
                           else if($lead['priority']==3)
                           {
                              $pr='<div class="badge badge-danger">High</div>' ;
                           }
                          ?>
                          <tr>
                           <td><?php echo $slno;?></td>
                           <td class="test" style="display:none;"><?php echo $lead['id'];?></td>
                           <td class="test1"><?php echo $lead['name'];?></td>
                           
                           <td><?php if($lead['type']==2) echo "call"; else if($lead['type']==3)echo "Meeting";else if($lead['type']==4) echo "email"; else if($lead['type']==5)echo "Chat";?></td>
                           <td><?php echo $lead['date'];?></td>
                           <td><?php echo $pr;?></td>
                           
                           <td><?php  if($lead['status']==1) echo "Sheduled"; else if($lead['status']==2)echo "Completed";?>
                        
                          </td>
                           <td class="hi-actions">
                      <!--<button class="btn btn-success gfgselect" data-bs-toggle="modal" data-bs-target="#exampleModal1" id="k"><i class="far fa-edit mr-1"></i>Add Activity</button>-->
<a href="#" id="<?php echo $id;?>" data-bs-toggle="modal" data-bs-target="#exampleModal22" class="update" title="Edit"><i class="fas fa-pencil-alt"></i></a>                        <a href="<?php echo site_url('manage_products/delete_lead/'.$lead['id'])?>" ><i class="fas fa-trash-alt"></i> </a>
                          		
                          
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
                      </table>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<!-- ============================================================================== -->					
</div>
<div class="tab-pane fade pt-0" id="Won" role="tabpanel" aria-labelledby="contact-tab3">
 <!-- =============================================================================== -->
<div class="row">
              <div class="col-12">
                
				  <div class="card">
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>No</th>
                          <th>Title</th>
                          <th>Associated Contact</th>
                          <th>Activity Type</th>
                          <th>Due date</th>
						  <th>Priority</th>
						  <th>Action</th>
                        </tr>
                          <?php 
                         if(isset($lea) && is_array($lea) && count($lea)): $slno=1; 
                          foreach($lea as $lead) : 
                            $id=$lead['id'];
                           // echo $id;
                           if($lead['priority']==1)
                           {
                               $pr='<div class="badge badge-success hi-radius">Low</div>';
                           }
                           else if($lead['priority']==2)
                           {
                               $pr='<div class="badge badge-warning">Medium</div>';
                           }
                           else if($lead['priority']==3)
                           {
                              $pr='<div class="badge badge-danger">High</div>' ;
                           }
                          ?>
                          <tr>
                           <td><?php echo $slno;?></td>
                           <td class="test" style="display:none;"><?php echo $lead['id'];?></td>
                           <td class="test1"><?php echo $lead['name'];?></td>
                           
                           <td><?php if($lead['type']==2) echo "call"; else if($lead['type']==3)echo "Meeting";else if($lead['type']==4) echo "email"; else if($lead['type']==5)echo "Chat";?></td>
                           <td><?php echo $lead['date'];?></td>
                           <td><?php echo $pr;?></td>
                           
                           <td><?php  if($lead['status']==1) echo "Sheduled"; else if($lead['status']==2)echo "Completed";?>
                        
                          </td>
                           <td class="hi-actions">
                      <!--<button class="btn btn-success gfgselect" data-bs-toggle="modal" data-bs-target="#exampleModal1" id="k"><i class="far fa-edit mr-1"></i>Add Activity</button>-->
<a href="#" id="<?php echo $id;?>" data-bs-toggle="modal" data-bs-target="#exampleModal22" class="update" title="Edit"><i class="fas fa-pencil-alt"></i></a>                        <a href="<?php echo site_url('manage_products/delete_lead/'.$lead['id'])?>" ><i class="fas fa-trash-alt"></i> </a>
                          		
                          
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
                      </table>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<!-- ============================================================================== -->
</div>
<div class="tab-pane fade pt-0" id="FollowUp" role="tabpanel" aria-labelledby="contact-tab3">
<!-- =============================================================================== -->
<div class="row">
              <div class="col-12">
                
				  <div class="card">
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>No</th>
                          <th>Title</th>
                          <th>Associated Contact</th>
                          <th>Activity Type</th>
                          <th>Due date</th>
						  <th>Priority</th>
						  <th>Action</th>
                        </tr>
                         <?php 
                         if(isset($leads3) && is_array($leads3) && count($leads3)): $slno=1; 
                          foreach($leads3 as $lead) : 
                            $id=$lead['id'];
                           // echo $id;
                           if($lead['priority']==1)
                           {
                               $pr='<div class="badge badge-success hi-radius">Low</div>';
                           }
                           else if($lead['priority']==2)
                           {
                               $pr='<div class="badge badge-warning">Medium</div>';
                           }
                           else if($lead['priority']==3)
                           {
                              $pr='<div class="badge badge-danger">High</div>' ;
                           }
                          ?>
                          <tr>
                           <td><?php echo $slno;?></td>
                           <td class="test" style="display:none;"><?php echo $lead['id'];?></td>
                           <td class="test1"><?php echo $lead['name'];?></td>
                           
                           <td><?php if($lead['type']==2) echo "call"; else if($lead['type']==3)echo "Meeting";else if($lead['type']==4) echo "email"; else if($lead['type']==5)echo "Chat";?></td>
                           <td><?php echo $lead['date'];?></td>
                           <td><?php echo $pr;?></td>
                           
                           <td><?php  if($lead['status']==1) echo "Sheduled"; else if($lead['status']==2)echo "Completed";?>
                        
                          </td>
                           <td class="hi-actions">
                      <!--<button class="btn btn-success gfgselect" data-bs-toggle="modal" data-bs-target="#exampleModal1" id="k"><i class="far fa-edit mr-1"></i>Add Activity</button>-->
<a href="#" id="<?php echo $id;?>" data-bs-toggle="modal" data-bs-target="#exampleModal22" class="update" title="Edit"><i class="fas fa-pencil-alt"></i></a>                        <a href="<?php echo site_url('manage_products/delete_lead/'.$lead['id'])?>" ><i class="fas fa-trash-alt"></i> </a>
                          		
                          
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
                      </table>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<!-- ============================================================================== -->		
</div>
                    </div>
                  </div>
                </div> </div>
                </div>
				    </form>
 </div>
<!--================================================================================================== -->
 </div>
 <?php
    }
    ?>
  </section>
</div>				<script>
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
	  		
	  		//$('#userid').val("jghj");
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
                     $('#AddActivity1').modal('show');  
                     $('#autouser').val(data.name);  
                $('#title').val(data.title);  
                     $('#comment').val(data.comment); 
                         $('#date').val(data.date); 
                     $('#userid').val(data.id); 
                    $('#action').val("Edit");  
                }  
           })  
      });  

</script>


