<?php $edit_id = $this->uri->segment(3); 
if(isset($achievements) && is_array($achievements) && count($achievements))  { ?>

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
                  </div></div>
          <div class="col-2 pr-0 position-relative">
          <div class="position-relative">
          <div class="hi-add-plus">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddAAchievementsWork">Add a Achievements</button>
</div></div>
          </div>
          </div></div>
          <div class="card">
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th>Time Period</th>
                          <th>Description</th>
                          <th>Action</th>
                        </tr>
                         <?php 
                          $slno=1; 
                          foreach($achievements as $achievement) : 
                          ?>
                        <tr>
                          <td><?php echo $slno;?></td>
                          <td><?php echo $achievement['name'];?></td>
                          <td><?php echo $achievement['date'];?></td>
                          <td><?php echo $achievement['description'];?></td>
                          <td>
                            <a href="#"><i class="fas fa-eye"></i></a>
                            <a href="#" onclick = "editachievement(<?php echo $achievement['achievement_id'];?>)" id="<?php echo $achievement['achievement_id'];?>" data-bs-toggle="modal" data-bs-target="#EditAchievement" title="Edit"><i class="fas fa-pencil-alt"></i></a> 
                            <a href="<?php echo site_url('achievements/delete_achievement/'.$achievement['achievement_id'])?>" title="Delete"><i class="fas fa-trash-alt"></i></a></td>
                          </tr>
                           <?php  
                          $slno++;
                        endforeach; ?>
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
             <button type="button" class="btn btn-primary" data-toggle="modal" id="<?php echo $id;?>" data-target="#AddAAchievementsWork">Add a Achievements</button>
           </div>
          <?php } ?>

<div class="modal fade" id="AddAAchievementsWork" tabindex="-1" role="dialog" aria-labelledby="formModal"
aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModal">Achievements</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form class="hic-dash-form" name="achievements" method="post" enctype="multipart/form-data" action="<?=site_url('achievements/achievements') ?>">
          <div class="form-group">
          <div class="form-floating">
            <input type="text" class="form-control" name="name" placeholder="Title">
          <label for="Title">Title</label>
          </div>
          </div>
            <div class="form-group">
        <label for="start_date">Date</label>
          <input type="date" class="form-control" name="date" >
        </div>
        <div class="form-group">
          <div class="form-floating">
            <textarea class="form-control" name="description" placeholder="Description"></textarea>
          <label for="Description">Description</label>
          </div>
        </div>
        <div class="form-group">
          <label for="profile"> 
            <input type="file" name="ach_image" class="form-control hic-upl text-right" />   
          </label>
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

<div class="modal fade" id="EditAchievement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Edit Achievements</h4>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

 <form name="achievements" method="post" action="<?= base_url('achievements/update_ach') ?>" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="ach_name" name="name" value="" required="">
                        <label for="name">Title</label>
                        <input type="hidden" class="form-control" id="achid" name="ach" value="" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="start_date">Date</label>
                      <input type="date" class="form-control" id="ach_date" name="date" >
                    </div>
                      <div class="form-group">
                        <div class="form-floating">
                          <textarea class="form-control" id="ach_description" name="description"></textarea>
                          <label for="description">Description</label>
                        </div>
                      </div>
                    <div class="form-group">
                      <label for="profile"> 
                        <input type="file" name="ach_image" id="ach_image" class="form-control hic-upl text-right" /> 
                        <span class="mb-1" data-dz-name="" id="old_file_name"> </span> 
                      </label>
                    </div>
                    </div>
                  <div class="card-footer">
                     <?php if(!empty($edit_id)){?>
                          <input type="hidden" name="action" value="<?php echo @$edit_id; ?>" >
                         <?php  } else {?>
                          <input type="hidden" name="action" value="create">
                          <?php } ?>
                   <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit">
                  </div>
                </form>


      
      </div>
     
    </div>
  </div>
</div>

  <script>

            function editachievement(id)
            {
              $.ajax({
                url:'<?php echo site_url() ?>achievements/view_achievement/'+id,
                method: 'post', 
                dataType:"json",  
                success: function(data) {
                  //alert(data.status);
                  $('#EditAchievement').modal('show');
                  $('#ach_name').val(data.ach_name);             
                  $('#achid').val(data.achievement_id);  
                  $('#ach_date').val(data.ach_date); 
                  $('#ach_image').val(data.image);
                  $('#ach_description').val(data.ach_description);
                  $('#old_file_name').text(data.ach_image)
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
            }
          </script>
