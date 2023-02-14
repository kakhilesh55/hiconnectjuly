
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header d-flex" style="justify-content: space-between;">
                    <h4>Enquiry Report</h4>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">Add Leads</button>
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
                <?php if(isset($enquiries)) { ?>
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
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        
                          </tr>
                        </thead>
                        <tbody>
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
                           <td><?php  echo $enquiry['status_button'];?>
                        
                          </td>
                           <td>
                           <button class="btn btn-success gfgselect" data-bs-toggle="modal" data-bs-target="#exampleModal1" id="k"><i class="far fa-edit mr-1"></i>Add Activity</button>
                           <a href="<?php echo base_url() ?>Enquiries/view_lead/<?php echo $id;?>" class="btn btn-info mr-2"><i class="far fa-eye mr-1"></i> View lead Deatils</a>
                          
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


          <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Add Activity</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form  method="POST" name="lead"  action="<?php echo base_url() ?>Enquiries/add_lead">
        <div class="mb-3">
        <label for="" class="form-label">Add Lead</label>
        <input type="text" id="name" name="name" class="form-control" readonly>
          </div>
       
          <div class="mb-3">
          <label for="" class="form-label">Activity Type</label>
          <input type="hidden" id="ename" name="eid">
        <select class="form-select" aria-label="Default select example" name="type">
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
            <input class="form-check-input" type="radio" name="status" id="" checked>
            <label class="form-check-label" for="">
              Scheduled
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="" >
            <label class="form-check-label" for="">
              Completed
            </label>
          
          </div>
         </div>
          </div>
         
          <div class="mb-3">
            <label for="" class="form-label">Date - Time</label>
            <input type="date" class="form-control" name="date" id="" placeholder="name@example.com">
          </div>
                <div class="mb-3">
        <label for="" class="form-label">Comments</label>
        <textarea class="form-control" name="comment"  id="" rows="5"></textarea>
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



<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Add Lead</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="row g-3" method="POST" name="enquiry"  action="<?php echo base_url() ?>Enquiries/add_enquiry" >
        <h5>Personal Informations</h5>
  <div class="col-md-6">
    <label for="" class="form-label">First name</label>
    <input type="text" class="form-control" id="" name="name">
  </div>
  <!--<div class="col-md-6">
    <label for="" class="form-label">Last name</label>
    <input type="text" class="form-control" id="">
  </div>-->
  <!--<div class="col-md-6">
    <label for="" class="form-label">Job title</label>
    <input type="text" class="form-control" id="">
  </div>
  <div class="col-md-6">
    <label for="" class="form-label">Company name</label>
    <input type="text" class="form-control" id="">
  </div>-->
  <div class="col-md-6">
    <label for="" class="form-label">Lead Email</label>
    <input type="email" class="form-control" id="" name="email">
  </div>
  <div class="col-md-6">
    <label for="" class="form-label">Phone Number</label>
    <input type="number" class="form-control" id="" name="phone">
  </div>
  <div class="col-md-6">
        <label for="" class="form-label">Comments</label>
        <textarea class="form-control" id="" rows="5" name="comment"></textarea>
      </div>
 <!-- <h5 class="mt-4">Assignment Informations</h5>
  <div class="col-md-6">
  <label for="" class="form-label">Lead Owner</label>
  <select class="form-select" aria-label="Default select example">
          <option selected>Open this select menu</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
  </div>
  <div class="col-md-6">
  <label for="" class="form-label">Lead Status</label>
  <select class="form-select" aria-label="Default select example">
          <option selected>Open this select menu</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
  </div>
  <div class="mb-3 col-md-12">
        <label for="" class="form-label">Comments</label>
        <textarea class="form-control" id="" rows="5"></textarea>
      </div>-->

  <div class="modal-footer m-auto">
        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Add</button>
        <button type="button" class="btn btn-primary">Reset</button>
      </div>
</form>
      </div>
    
    </div>
  </div>
</div>
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