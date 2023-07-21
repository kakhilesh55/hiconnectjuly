 <div class="main-content">
     <style>
         .hi-ex-btn {
    background: #f4f7f9;
    border: 1px solid #c1c2c3;
    border-radius: 4px;
    padding: 0 14px;
    line-height: 28px;
    letter-spacing: .5px;
    margin: 0 0px!important;
}
     </style>
 <section class="hi-pfl-view">
 <div class="card">
<div class="card-body">
    <?php 
    if(empty($enquiries))
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
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddLeads">Add Activities</button>
</div>
<?php
}
?>
<div class="modal fade" id="AddLeads" tabindex="-1" role="dialog" aria-labelledby="formModal"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
	<h5 class="modal-title" id="formModal">Add Leads</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>
  <div class="modal-body">
<form class="hic-dash-form" method="POST" name="enquiry"  action="<?php echo base_url() ?>Enquiries/add_enquiry">
  <div class="form-group m-0">
    <label for="inputAddress2">Personal Informations</label>
  </div>
<div class="form-row">
    <div class="form-group col-md-6">
<div class="form-floating">
  <input type="text" class="form-control" id="FirstName" placeholder="First Name" name="name">
  <label for="FirstName">First Name</label>
</div>
</div>
<div class="form-group col-md-6">
	<div class="form-floating">
  <input type="text" class="form-control" id="LastName" placeholder="Last Name" name="lname">
  <label for="LastName">Last Name</label>
</div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
<div class="form-floating">
  <input type="text" class="form-control" id="JobTitle" placeholder="Job Title" name="job">
  <label for="JobTitle">Job Title</label>
</div>
</div>
<div class="form-group col-md-6">
	<div class="form-floating">
  <input type="text" class="form-control" id="CompanyName" placeholder="Company Name" name="cname">
  <label for="CompanyName">Company Name</label>
</div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
<div class="form-floating">
  <input type="email" class="form-control" id="Email" placeholder="Email" name="email">
  <label for="Email">Email</label>
</div>
</div>
<div class="form-group col-md-6 position-relative">
	<div class="form-floating">
  <input type="text" class="form-control" id="Phone" placeholder="Phone" name="phone">
  <label for="Phone">Phone</label>
  <div class="hi-inpt-icon"><i class="fas fa-phone"></i></div>
</div>
    </div>
</div>
  <div class="form-group m-0">
    <label for="inputAddress2">Assignment Informations</label>
  </div>
<div class="form-row">
    <div class="form-group col-md-6">
<div class="form-floating">
  <select  id="yearr" class="form-control">
   <option value="01">Lead Owner</option>
   <option value="02">Lead Admin</option>
	</select>
</div>
</div>
<div class="form-group col-md-6">
	<div class="form-floating">
  <select  id="yearr" class="form-control" name="status">
   <option value="">Lead Status</option>
   <option value="1">New</option>
   <option value="2">Won</option>
   <option value="3">Follow Up</option>
	</select>
</div>
    </div>
</div>
    <div class="form-group">
  <div class="form-floating">
    <textarea class="form-control" id="Notes"  placeholder="Notes" name="comment"></textarea>
  <label for="Notes">Notes</label>
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
  <button type="submit" class="btn btn-lbl">Create & Add Another</button>
  </div>
</form>
  </div>
</div>
</div>
</div>






<div class="modal fade" id="AddLeads1" tabindex="-1" role="dialog" aria-labelledby="formModal"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
	<h5 class="modal-title" id="formModal">Update Leads</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>
  <div class="modal-body">
  <form  method="POST" class="hic-dash-form" method="POST" name="enquiry"  action="<?php echo base_url() ?>Enquiries/update_enquiry" >
  <div class="form-group m-0">
    <label for="inputAddress2">Personal Informations</label>
  </div>
<div class="form-row">
    <div class="form-group col-md-6">
<div class="form-floating">
  <input type="text" class="form-control" id="first_name" placeholder="First Name" name="name">
  <label for="FirstName">First Name</label>
</div>
</div>
<div class="form-group col-md-6">
	<div class="form-floating">
  <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname">
  <label for="LastName">Last Name</label>
</div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
<div class="form-floating">
  <input type="text" class="form-control" id="job" placeholder="Job Title" name="job">
  <label for="JobTitle">Job Title</label>
</div>
</div>
<div class="form-group col-md-6">
	<div class="form-floating">
  <input type="text" class="form-control" id="cname" placeholder="Company Name" name="cname">
  <label for="CompanyName">Company Name</label>
    <input type="hidden" class="form-control" id="cid" name="cid">

</div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
<div class="form-floating">
  <input type="email" class="form-control" id="email" placeholder="Email" name="email">
  <label for="Email">Email</label>
</div>
</div>
<div class="form-group col-md-6 position-relative">
	<div class="form-floating">
  <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
  <label for="Phone">Phone</label>
  <div class="hi-inpt-icon"><i class="fas fa-phone"></i></div>
</div>
    </div>
</div>
  <div class="form-group m-0">
    <label for="inputAddress2">Assignment Informations</label>
  </div>
<div class="form-row">
    <div class="form-group col-md-6">
<div class="form-floating">
  <select  id="yearr" class="form-control">
   <option value="01">Lead Owner</option>
   <option value="02">Lead Admin</option>
	</select>
</div>
</div>
<div class="form-group col-md-6">
	<div class="form-floating">
  <select  id="yearr" class="form-control" name="status">
   <option value="">Lead Status</option>
   <option value="1">New</option>
   <option value="2">Won</option>
   <option value="3">Follow Up</option>
	</select>
</div>
    </div>
</div>
    <div class="form-group">
  <div class="form-floating">
    <textarea class="form-control" id="comment"  placeholder="Notes" name="comment"></textarea>
  <label for="Notes">Notes</label>
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
  <button type="submit" class="btn btn-lbl">Update</button>
  <button type="submit" class="btn btn-lbl">Canacel</button>
  </div>
</form>
  </div>
</div>
</div>
</div>












<div class="modal fade" id="AddLeads11" tabindex="-1" role="dialog" aria-labelledby="formModal"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
	<h5 class="modal-title" id="formModal">Add Leads</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>
  <div class="modal-body">
      <form class="row" method="POST" name="enquiry"  action="<?php echo base_url() ?>Enquiries/update_enquiry" >

  <div class="form-group m-0">
    <label for="inputAddress2">Personal Informations</label>
  </div>
<div class="form-row">
    <div class="form-group col-md-6">
<div class="form-floating">
  <input type="text" class="form-control" id="first_name" placeholder="First Name" name="name">
  <label for="FirstName">First Name</label>
</div>
</div>
<div class="form-group col-md-6">
	<div class="form-floating">
  <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname">
  <label for="LastName">Last Name</label>
</div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
<div class="form-floating">
  <input type="text" class="form-control" id="job" placeholder="Job Title" name="job">
  <label for="JobTitle">Job Title</label>
</div>
</div>
<div class="form-group col-md-6">
	<div class="form-floating">
  <input type="text" class="form-control" id="cname" placeholder="Company Name" name="cname">
  <label for="CompanyName">Company Name</label>
  <input type="hidden" class="form-control" id="cid" name="cid">
</div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
<div class="form-floating">
  <input type="email" class="form-control" id="email" placeholder="Email" name="email">
  <label for="Email">Email</label>
</div>
</div>
<div class="form-group col-md-6 position-relative">
	<div class="form-floating">
  <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
  <label for="Phone">Phone</label>
  <div class="hi-inpt-icon"><i class="fas fa-phone"></i></div>
</div>
    </div>
</div>
  <div class="form-group m-0">
    <label for="inputAddress2">Assignment Informations</label>
  </div>
<div class="form-row">
    <div class="form-group col-md-6">
<div class="form-floating">
  <select  id="yearr" class="form-control">
   <option value="01">Lead Owner</option>
   <option value="02">Lead Admin</option>
	</select>
</div>
</div>
<div class="form-group col-md-6">
	<div class="form-floating">
  <select  id="yearr" class="form-control" name="status">
   <option value="">Lead Status</option>
   <option value="1">New</option>
   <option value="2">Won</option>
   <option value="3">Follow Up</option>
	</select>
</div>
    </div>
</div>
    <div class="form-group">
  <div class="form-floating">
    <textarea class="form-control" id="comment"  placeholder="Notes" name="comment"></textarea>
  <label for="Notes">Notes</label>
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
 <button type="submit" class="btn btn-lbl">Update</button>
  <button type="submit" class="btn btn-lbl">Cancel</button>
 
  </div>
</form>
  </div>
</div>
</div>
</div>




















<!--================================================================================================== -->

  <?php 
				      if(!empty($enquiries))
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
	<button type="button" class="btn btn-primary btn-hvr mr-0" data-toggle="modal" data-target="#AddLeads"><i class="fas fa-plus"></i> Create</button>

	
</div>
<div class="hi-fxd-plus">
<button type="button" class="btn btn-primary m-0 wi-hund btn-fxp btn-hvr" data-toggle="modal" data-target="#AddLeads"><i class="fas fa-plus"></i></button>
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
                          aria-controls="profile" aria-selected="false">New</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#Won" role="tab"
                          aria-controls="contact" aria-selected="false">Won</a>
                      </li>
					  <li class="nav-item">
                        <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#FollowUp" role="tab"
                          aria-controls="contact" aria-selected="false">Follow Up</a>
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
                        
                          <table class="table table-striped" id="table-1">
                        
                          <tr>
                            <th >
                             No
                            </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        
                          </tr>
                       
                          <?php 
                         if(isset($enquiries) && is_array($enquiries) && count($enquiries)): $slno=1; 
                          foreach($enquiries as $enquiry) : 
                            $id=$enquiry['id'];
                           // echo $id;
                          ?>
                          <tr>
                           <td><?php echo $slno;?></td>
                           <td class="test" style="display:none;"><?php echo $enquiry['id'];?></td>
                           <td class="test1"><?php echo $enquiry['name'];?></td>
                           <td><?php echo $enquiry['email'];?></td>
                           <td><?php echo $enquiry['phone'];?></td>
                           <td><?php echo $enquiry['comments'];?></td>
                           <td><?php echo $enquiry['date'];?></td>
                                                    <td><?php if($enquiry['type']==1)echo '<a href="#" class="btn btn-primary hi-radius ">Detail</a>'; else echo '<div class="badge badge-danger">Not Active</div>';?></td>

                           <td><?php  echo $enquiry['status_button'];?>
                        
                          </td>
                           <td class="hi-actions">
                          <!-- <button class="btn btn-success gfgselect" data-bs-toggle="modal" data-bs-target="#exampleModal1" id="k"><i class="far fa-edit mr-1"></i>Add Activity</button>
                           <a href="<?php echo base_url() ?>Enquiries/view_lead/<?php echo $id;?>" class="btn btn-info mr-2"><i class="far fa-eye mr-1"></i> View lead Deatils</a>-->

                          <a href="#" id="<?php echo $id;?>" data-bs-toggle="modal" data-bs-target="#exampleModal22" class="update" title="Edit"><i class="fas fa-pencil-alt"></i></a>
							  
							  <a href="<?php echo site_url('manage_products/delete_enq/'.$enquiry['id'])?>" ><i class="fas fa-trash-alt"></i></a>
                          
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
                        
                        
                   
                         <!-- <td class="hi-actions">
							  <a href="#"><i class="fas fa-eye"></i></a>
							  <a href="#"><i class="fas fa-pencil-alt"></i></a>
							  <a href="#"><i class="fas fa-trash-alt"></i></a>
						  </td>-->
                        </tr>
                      
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
                          <table class="table table-striped" id="table-1">
                        
                          <tr>
                            <th >
                             No
                            </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        
                          </tr>
                       
                          <?php
                         
                         if(isset($enquirie) && is_array($enquirie) && count($enquirie)): $slno=1; 
                          foreach($enquirie as $enquiry1) : 
                            $id=$enquiry1['id'];
                         
                          ?>
                          <tr>
                           <td><?php echo $slno;?></td>
                           <td class="test" style="display:none;"><?php echo $enquiry1['id'];?></td>
                           <td class="test1"><?php echo $enquiry1['name'];?></td>
                           <td><?php echo $enquiry1['email'];?></td>
                           <td><?php echo $enquiry1['phone'];?></td>
                           <td><?php echo $enquiry1['comments'];?></td>
                           <td><?php echo $enquiry1['date'];?></td>
                                                    <td><?php if($enquiry1['type']==1)echo '<a href="#" class="btn btn-primary hi-radius ">Detail</a>'; else echo '<div class="badge badge-danger">Not Active</div>';?></td>

                           <td><?php  echo $enquiry1['status_button'];?>
                        
                          </td>
                           <td class="hi-actions">
                          <!-- <button class="btn btn-success gfgselect" data-bs-toggle="modal" data-bs-target="#exampleModal1" id="k"><i class="far fa-edit mr-1"></i>Add Activity</button>
                           <a href="<?php echo base_url() ?>Enquiries/view_lead/<?php echo $id;?>" class="btn btn-info mr-2"><i class="far fa-eye mr-1"></i> View lead Deatils</a>-->

                          <a href="#" id="<?php echo $id;?>" data-bs-toggle="modal" data-bs-target="#exampleModal22" class="update" title="Edit"><i class="fas fa-pencil-alt"></i></a>
						
							  <a href="<?php echo site_url('manage_products/delete_enq/'.$enquiry1['id'])?>" ><i class="fas fa-trash-alt"></i></a>
                          
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
                        
                        
                   
                         <!-- <td class="hi-actions">
							  <a href="#"><i class="fas fa-eye"></i></a>
							  <a href="#"><i class="fas fa-pencil-alt"></i></a>
							  <a href="#"><i class="fas fa-trash-alt"></i></a>
						  </td>-->
                        </tr>
                      
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
                          <table class="table table-striped" id="table-1">
                        
                          <tr>
                            <th >
                             No
                            </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        
                          </tr>
                       
                          <?php 
                         if(isset($enquiries1) && is_array($enquiries1) && count($enquiries1)): $slno=1; 
                          foreach($enquiries1 as $enquiry) : 
                            $id=$enquiry['id'];
                           // echo $id;
                          ?>
                          <tr>
                           <td><?php echo $slno;?></td>
                           <td class="test" style="display:none;"><?php echo $enquiry['id'];?></td>
                           <td class="test1"><?php echo $enquiry['name'];?></td>
                           <td><?php echo $enquiry['email'];?></td>
                           <td><?php echo $enquiry['phone'];?></td>
                           <td><?php echo $enquiry['comments'];?></td>
                           <td><?php echo $enquiry['date'];?></td>
                                                    <td><?php if($enquiry['type']==1)echo '<a href="#" class="btn btn-primary hi-radius ">Detail</a>'; else echo '<div class="badge badge-danger">Not Active</div>';?></td>

                           <td><?php  echo $enquiry['status_button'];?>
                        
                          </td>
                           <td class="hi-actions">
                          <!-- <button class="btn btn-success gfgselect" data-bs-toggle="modal" data-bs-target="#exampleModal1" id="k"><i class="far fa-edit mr-1"></i>Add Activity</button>
                           <a href="<?php echo base_url() ?>Enquiries/view_lead/<?php echo $id;?>" class="btn btn-info mr-2"><i class="far fa-eye mr-1"></i> View lead Deatils</a>-->

                          <a href="#" id="<?php echo $id;?>" data-bs-toggle="modal" data-bs-target="#exampleModal22" class="update" title="Edit"><i class="ffas fa-pencil-alt"></i></a>
							  
							  <a href="<?php echo site_url('manage_products/delete_enq/'.$enquiry['id'])?>" ><i class="fas fa-trash-alt"></i></a>
                          
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
                        
                        
                   
                         <!-- <td class="hi-actions">
							  <a href="#"><i class="fas fa-eye"></i></a>
							  <a href="#"><i class="fas fa-pencil-alt"></i></a>
							  <a href="#"><i class="fas fa-trash-alt"></i></a>
						  </td>-->
                        </tr>
                      
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
                          <table class="table table-striped" id="table-1">
                        
                          <tr>
                            <th >
                             No
                            </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        
                          </tr>
                       
                          <?php 
                         if(isset($enquiries2) && is_array($enquiries2) && count($enquiries2)): $slno=1; 
                          foreach($enquiries2 as $enquiry) : 
                            $id=$enquiry['id'];
                           // echo $id;
                          ?>
                          <tr>
                           <td><?php echo $slno;?></td>
                           <td class="test" style="display:none;"><?php echo $enquiry['id'];?></td>
                           <td class="test1"><?php echo $enquiry['name'];?></td>
                           <td><?php echo $enquiry['email'];?></td>
                           <td><?php echo $enquiry['phone'];?></td>
                           <td><?php echo $enquiry['comments'];?></td>
                           <td><?php echo $enquiry['date'];?></td>
                                                    <td><?php if($enquiry['type']==1)echo '<a href="#" class="btn btn-primary hi-radius ">Detail</a>'; else echo '<div class="badge badge-danger">Not Active</div>';?></td>

                           <td><?php  echo $enquiry['status_button'];?>
                        
                          </td>
                           <td class="hi-actions">
                          <!-- <button class="btn btn-success gfgselect" data-bs-toggle="modal" data-bs-target="#exampleModal1" id="k"><i class="far fa-edit mr-1"></i>Add Activity</button>
                           <a href="<?php echo base_url() ?>Enquiries/view_lead/<?php echo $id;?>" class="btn btn-info mr-2"><i class="far fa-eye mr-1"></i> View lead Deatils</a>-->

                          <a href="#" id="<?php echo $id;?>" data-bs-toggle="modal" data-bs-target="#exampleModal22" class="update" title="Edit"><i class="fas fa-pencil-alt"></i></a>
							
							  <a href="<?php echo site_url('manage_products/delete_enq/'.$enquiry['id'])?>" ><i class="fas fa-trash-alt"></i></a>
                          
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
                        
                        
                   
                         <!-- <td class="hi-actions">
							  <a href="#"><i class="fas fa-eye"></i></a>
							  <a href="#"><i class="fas fa-pencil-alt"></i></a>
							  <a href="#"><i class="fas fa-trash-alt"></i></a>
						  </td>-->
                        </tr>
                      
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
                </div>
              </div>
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
		  </div>
	</div>
</section>
<?php
}
?>
    <!--<section class="section">
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
    </section>-->
     </form>
  </div>

<script>
      $(document).on('click', '.update', function(){  
        
           var user_id = $(this).attr("id");  
      
           $.ajax({  
                url:"<?php echo base_url() ?>Enquiries/view_lead/",  
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
                     $('#AddLeads1').modal('show');  
                     $('#first_name').val(data.name);  
                $('#lname').val(data.lastname);  
                 $('#job').val(data.job_title); 
                  $('#cname').val(data.company_name);  
                   $('#email').val(data.email);
                    $('#phone').val(data.phone); 
                     $('#first_name').val(data.name);  
                     $('#comments').val(data.comments); 
                     $('#cid').val(data.id); 
                    $('#action').val("Edit");  
                }  
           })  
      });  

</script>
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
    var page = 'generatexls/';
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