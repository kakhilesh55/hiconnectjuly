<?php $edit_id = $this->uri->segment(3); 
if(isset($experiences) && is_array($experiences) && count($experiences))  { ?>
<div class="row">
  <div class="col-12">
    <div class="card shadow-none m-0 p-0">
      <div class="d-flex">
        <div class="col-10 pl-0 pr-0">
                  <div class="card-header d-block p-0">
                    <div class="card-header-form pb-4">
                      <form>
                        <div class="input-group position-relative">
                          <input type="text" class="hi-form-control hi-search-in" placeholder="Search">
                          <div class="input-group-btn hi-ing">
                            <button class="hi-search-btn"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
          <div class="col-2 pr-0 position-relative">
            <div class="position-relative">
              <div class="hi-add-plus">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddAWork" id="<?php echo $id;?>">Add a Work Place</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>No</th>
                          <th>Company</th>
                          <th>Position</th>
                          <th>City/Town</th>
                          <th>Description</th>
                          <th>Time Period</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                       <tbody>
                          <?php 
                          $slno=1; 
                          foreach($experiences as $experience) : 
                          ?>
                          <tr>
                           <td><?php echo $slno;?></td>
                           <td><?php echo $experience['company'];?></td>
                           <td><?php echo $experience['position'];?></td>
                           <td><?php echo $experience['place'];?></td>
                           <td><?php echo $experience['description'];?></td>
                           <td><?php echo date("d-m-Y", strtotime($experience['start_date']))." - ".date("d-m-Y", strtotime($experience['end_date']));?></td>
                            <td><div class="badge <?php echo ($experience['status']==0)?'badge-danger':'badge-success'; ?> hi-radius"><?php echo $experience['status']==0?'Not Active':'Active';?></div></td>
                             <td class="hi-actions">
                              <a href="#"><i class="fas fa-eye"></i></a>
                              <a onclick = "editwork(<?php echo $experience['experience_id'];?>)" href="#" id="<?php echo $experience['experience_id'];?>" data-bs-toggle="modal" data-bs-target="#EditWork" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                              <a href="<?php echo site_url('experiences/delete_experience/'.$experience['experience_id'])?>" data-toggle="tooltip" title="" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')" data-original-title="Delete"><i class="fas fa-trash-alt"></i></a>
                            </td>
                          </tr>
                           <?php  
                          $slno++;
                        endforeach; 
                        ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
            <?php } else { ?>

            <div class="d-flex align-items-center justify-content-center">
              <div class="text-center">
                <img src="<?php echo base_url(); ?>assets/img/users/No-Items.png"/>
                <h3>No Items</h3>
                <p>Items added to the task will appear here</p>
              </div>
            </div>
            <div class="hi-add-plus">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddAWork" id="<?php echo $id;?>">Add a Work Place</button>
            </div>
            <?php } ?>

<div class="modal fade" id="AddAWork" tabindex="-1" role="dialog" aria-labelledby="formModal"
  aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModal">Work</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="hic-dash-form" name="work" method="post" action="<?=site_url('experiences/experiences') ?>">
            <div class="form-group">
              <div class="form-floating">
                <input type="text" class="form-control" name="company" placeholder="Company" value="<?php echo isset($experience->company)?$experience->company:'';?>">
              <label for="company">Company</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-floating">
                <input type="text" class="form-control" name="position" placeholder="Position" value="<?php echo isset($experience->position)?$experience->position:'';?>">
              <label for="Position">Position</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-floating">
                <input type="text" class="form-control" name="place" placeholder="Place">
                <label for="place">Place</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-floating">
                <textarea class="form-control" name="description" placeholder="Description"></textarea>
                <label for="Description">Description</label>
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress2">Time Period</label>
              <div class="text-right">
                <input type="checkbox" class="status_check" name="work_status" value="1"> 
                <label for="work_status">Currently work here</label> 
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="start_date" class="text-center width-per-100">From Date</label>
                <input type="date" class="form-control" name="start_date" value="">
              </div>
            <div class="form-group col-md-6">
              <label for="end_date" class="text-center width-per-100">To Date</label>
              <input type="date" class="form-control" name="end_date" value="">
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
            <input type="hidden" name="action" value="create">
            <button type="submit" class="btn btn-lbl">Cancel</button>
            <button type="submit" class="btn btn-lbl">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="EditWork" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Work</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body">
      
      
 <form name="experience" method="post" action="<?= base_url('experiences/update_exp') ?>">
            <div class="form-group">
              <div class="form-floating">
                <input type="text" class="form-control" id="work_company" name="company" placeholder="Company" value="<?php echo isset($experience->company)?$experience->company:'';?>" >
              <label for="company">Company</label>
              <input type="hidden" class="form-control" id="exp_id" name="exp_id" value="">
              </div>
            </div>
            <div class="form-group">
              <div class="form-floating">
                <input type="text" class="form-control" id="work_position" name="position" placeholder="Position">
              <label for="Position">Position</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-floating">
                <input type="text" class="form-control" id="work_place" name="place" placeholder="Place">
                <label for="place">Place</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-floating">
                <textarea class="form-control" id="work_description" name="description" placeholder="Description"></textarea>
                <label for="Description">Description</label>
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress2">Time Period</label>
              <div class="text-right">
                <input type="checkbox" id="work_status" class="status_check" name="work_status" value="1" <?php echo ($experience->status==1)?'checked':'';?>> 
                <label for="work_status">Currently work here</label> 
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="start_date" class="text-center width-per-100">From Date</label>
                <input type="date" class="form-control" id="work_start_date" name="start_date" value="">
              </div>
            <div class="form-group col-md-6">
              <label for="end_date" class="text-center width-per-100">To Date</label>
              <input type="date" class="form-control" id="work_end_date" name="end_date" value="">
            </div>
          </div>
              <div class="card-footer">
                <?php if(!empty($edit_id)){?>
                <input type="hidden" name="action" value="<?php echo @$edit_id; ?>" >
                <?php  } else {?>
                <input type="hidden" name="action" value="create">
                <?php } ?>
                <button type="submit" class="btn btn-lbl">Cancel</button>
                <input type="submit" name="submit" id="submit" class="btn btn-lbl" value="Submit">
              </div>
            </form>
      
      </div>
     
    </div>
  </div>
</div>

          <script>

             $(document).ready(function() {
                $(".status_check").click(function() {
                    if ($("input[type=checkbox]").is(
                      ":checked")) {
                        //alert("Check box in Checked");
                        $(".status_check").val(1);
                        this.setAttribute("checked", "checked");
                        this.checked = true;

                    } else {
                       // alert("Check box is Unchecked");
                        $(".status_check").val(0);
                        this.removeAttribute("checked"); // For other browsers
                        this.checked = false;
                    }
                });
            });

            function editwork(id)
            {
              $.ajax({
                url:'<?php echo site_url() ?>experiences/view_work/'+id,
                method: 'post', 
                dataType:"json",  
                success: function(data) {
                  //alert(data.status);
                  $('#EditWork').modal('show');
                  $('#work_company').val(data.company);             
                  $('#exp_id').val(data.experience_id);  
                  $('#work_position').val(data.position); 
                  $('#work_place').val(data.place);
                  $('#work_description').val(data.description);
                  $('#work_status').val(data.status);
                  $('#work_start_date').val(data.start_date); 
                  $('#work_end_date').val(data.end_date);
                  if(data.status=1)     
                  {
                    $(".status_check").setAttribute("checked", "checked");           
                    $(".status_check").checked = true;
                  }  
                  else   
                  {                
                    $(".status_check").removeAttribute("checked");
                    $(".status_check").checked = false;
                  }
                  //$('#action').val("Edit"); 
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
            }
          </script>