
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4>Free Accounts</h4>
                  </div>
                  <div class="card-body">
                     <?php if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>

<div class="card-body">
                
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php }  ?>
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
                    <div class="table-responsive">
                    <button  name="btnExport" class="pull-right btn btn-primary btn-xs" onclick="generate_excel()" ><i class="fa fa-file-excel-o"></i> Export data to Excel</button>

                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">Sl No. </th>
                            <th>Name</th>
                            <th>User ID</th>
                           
                            <th>Created Date</th>
                            <th>Last Login</th>
                            <th>Status</th>
                            <th>Actions</th>
                            <?php /*<th>Actions</th>*/ ?>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                         if(isset($users) && is_array($users) && count($users)): $slno=1; 
                          foreach($users as $user) : 
                            if($user['status']==1)
                            {
                              $st="Active";
                            }
                            else if($user['status']==2)
                            {
                              $st="Deactive";
                            }
                            else
                            {
                              $st="Suspended";
                            }
                          ?>
                          <tr>
                          <td class="test" style="display:none;"><?php echo $user['user_id'];?></td>
                            <td><?php echo $slno;?></td>
                            <td><?php echo $user['name'];?></td>
                            <td><?php echo $user['user_id'];?></td>
                          
                            <td><?php echo $user['register_date'];?></td>
                            <td class="align-middle"><?php echo $user['login_date'];?></td>
                            <td><?php if($user['status']==1) echo "Active";else if($user['status']==2) echo "Deactive";else echo "Suspended";?></td>
                            <td> <button class="btn btn-success gfgselect" data-bs-toggle="modal" data-bs-target="#exampleModal11" id="k"><i class="far fa-edit mr-1"></i>Change Status</button></td>
                          </tr>
                          <?php  
                          $slno++;
                        endforeach; 
                        else: ?>
                          <tr>
                              <td colspan="7" align="center" >No Records Found..</td>
                          </tr>
                          <?php
                              endif;?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              </div>
           
            </section>
          </div>
          <div class="modal fade" id="exampleModal11" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Cahnge Status</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form  method="POST" name="lead"  action="<?php echo base_url() ?>Free_accounts/update_act">
        
       
          <div class="mb-3">
          <label for="" class="form-label">Status</label>
          <input type="hidden" id="ename" name="eid">
        <select class="form-select form-control" aria-label="Default select example" name="type">
          <option selected>Open this select menu</option>
          <option value="1">Active</option>
          <option value="2">Deactive</option>
          <option value="3">Suspended</option>
          
        </select>
          </div>
          
      
                <div class="mb-3">
        <label for="" class="form-label">Comments</label>
        <textarea class="form-control" name="reason"  id="" rows="5"></textarea>
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
          <script>


$(function () {
                // ON SELECTING ROW
                $(".gfgselect").click(function () {
   //FINDING ELEMENTS OF ROWS AND STORING THEM IN VARIABLES
                    var a =
             $(this).parents("tr").find(".test").text();
          
                  // alert(b);
                   $('#ename').val(a);
                   
                //   $('#name').val(b);
                
            });
          });
        </script>
    
          </script>

          <script type="text/javascript">
  function generate_excel(){
    var from_date = $('#from_date').val();
    var to_date = $('#to_date').val();
    var page = 'generatexls/'+from_date+'/'+to_date;
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