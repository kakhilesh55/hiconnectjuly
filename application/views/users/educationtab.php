 <section class="hi-pfl-view">
 
<?php $edit_id = $this->uri->segment(3);
if(empty($educations))
{
?>
   <div class="d-flex align-items-center justify-content-center">
                <div class="text-center">
                    <img src="<?php echo base_url(); ?>assets/img/users/No-Items.png"/>
                    <h3>No Items</h3>
                    <p>Items added to the task will appear here</p>
                </div>
            </div>
<div class="hi-add-plus">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddEducation" id="<?php echo $id;?>">Add a Education</button>
</div>
<?php
}
?>
<div class="modal fade" id="AddEducation" tabindex="-1" role="dialog" aria-labelledby="formModal"
aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModal">Education</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="hic-dash-form" name="education" method="post" action="<?php echo site_url('education/education_details') ?>">
            <div class="form-group">
              <div class="form-floating">
                <select id="edu_type" name="edu_type" class="form-control" required="">
                  <option value="">Academic</option>
                  <option value="1">School</option>
                  <option value="2">Higher Secondary</option>
                  <option value="3">Bachelor Degree</option>
                  <option value="4">Master Degree</option>
                  <option value="5">PHD</option>
              </select>
            </div>
          </div> 
          <div class="form-group" >
            <div class="form-floating">
              <input type="text" class="form-control" id="name" name="name" value="" required="" placeholder="Name">
              <label for="Name">Name</label>
            </div>
          </div>
          <div class="form-group m-0">
            <label for="inputAddress2">Time Period</label>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="start_date" class="text-center width-per-100">From Date</label>
              <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo isset($education->start_date)?$education->start_date:'';?>">
            </div>
            <div class="form-group col-md-6">
              <label for="end_date" class="text-center width-per-100">To Date</label>
              <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo isset($education->end_date)?$education->end_date:'';?>">
            </div>
          </div>
          <div class="form-group">
            <div class="form-floating">
              <textarea class="form-control" id="description" name="description" placeholder="Description"><?php echo isset($education->description)?$education->description:'';?></textarea>
              <label for="Description">Description</label>
            </div>
          </div>
  

          <div class="form-group">
          </div>
          <div class="card-footer">
            <?php if(!empty($edit_id)){?>
              <input type="hidden" name="action" value="<?php echo $edit_id; ?>" >
            <?php  } else {?>
              <input type="hidden" name="action" value="create">
            <?php } ?>
              <input type="submit" name="submit" id="submit" class="btn btn-lbl" value="Submit">
              <button type="cancel" class="btn btn-lbl">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="EditEducation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Education</h5>
         <!--<h4 class="modal-title" id="exampleModalLabel">Edit Education<?php echo $edit_id;?></h4>-->
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
 <form name="education" method="post" action="<?= base_url('education/update_edu') ?>">
                  <div class="card-body">
                    <div class="form-group">
                      <div class="form-floating">
                        
                        <select id="edu_type" name="edu_type" class="form-control" required="">
                          <option value="">Academic</option>
                          <?php
                          if(isset($education->edu_type))
                          {
                            foreach($education as $edu)
                            {?>
                              <option value="1" <?php echo ($edu->edu_type==1)?'selected':'';?>>School</option>
                              <option value="2" <?php echo ($edu->edu_type==2)?'selected':'';?>>Higher Secondary</option>
                              <option value="3" <?php echo ($edu->edu_type==3)?'selected':'';?>>Bachelor Degree</option>
                              <option value="4" <?php echo ($edu->edu_type==4)?'selected':'';?>>Master Degree</option>
                              <option value="5"<?php echo ($edu->edu_type==5)?'selected':'';?>>PHD</option>
                            <?php 
                            }
                          }
                          ?>
                      </select>
                      <label for="edu_type">Type</label>
                  </div>
                    </div>
                    <div class="form-group" >
                      <div class="form-floating">
                        <input type="text" class="form-control" id="edu_name" name="name" value="<?php  echo isset($education->name)?$education->name:'';?>" required="">
                        <input type="hidden" class="form-control" id="eduid" name="edu_id" value="" required="">
                        <label for="name">Name</label>
                      </div>
                    </div>

          <div class="form-group m-0">
            <label for="inputAddress2">Time Period</label>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="start_date" class="text-center width-per-100">From Date</label>
              <input type="date" class="form-control" id="start" name="start_date" value="<?php echo isset($education->start_date)?$education->start_date:'';?>">
            </div>
            <div class="form-group col-md-6">
              <label for="end_date" class="text-center width-per-100">To Date</label>
              <input type="date" class="form-control" id="end" name="end_date" value="<?php echo isset($education->end_date)?$education->end_date:'';?>">
            </div>
          </div>
          <div class="form-group">
            <div class="form-floating">
              <textarea class="form-control" id="des" name="description" maxlength="250"><?php echo isset($education->description)?$education->description:'';?></textarea>
              <label for="Description">Description</label>
            </div>
          </div>
                    </div>
                  <div class="card-footer">
                    <?php if(!empty($id)){?>
                          <input type="hidden" name="action" value="<?php echo $id; ?>" >
                         <?php  } else {?>
                          <input type="hidden" name="action" value="create">
                          <?php } ?>
                   <input type="submit" name="submit" id="submit" class="btn btn-lbl" value="Submit">
                    <button type="cancel" class="btn btn-lbl">Cancel</button>
                  </div>
                </form>
      
      </div>
     
    </div>
  </div>
</div>

<?php

if(isset($educations) && is_array($educations) && count($educations))  { ?>
<section class="hi-leads">
	<div class="row">
          <div class="col-12">
			<div class="col-12">
<div class="card shadow-none m-0 pding pb-0">
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
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddEducation" id="<?php echo $id;?>">Add a Education</button>
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
                            <thead>
                                <th>No</th>
                                <th>Accademic</th>
                                <th>Name</th>
                                <th>Time Period</th>
                                <th>Description</th>
                                <th>Action</th>
                            </thead>
                        </tr>
                        <?php  
                          $slno=1; 
                          foreach($educations as $education) : 
                            switch($education['edu_type'])
                            {
                              case 1 : $edutype="School";break;
                              case 2 : $edutype="Higher Secondary";break;
                              case 3 : $edutype="Bachelor Degree";break;
                              case 4 : $edutype="Master Degree";break;
                              case 5 : $edutype="PHD";break;
                            }
                          ?>
                          <tr>
                           <td><?php echo $slno;?></td>
                           <td><?php echo $edutype;?></td>
                           <td><?php echo $education['name'];?></td>
                           <td><?php echo date("d-m-Y", strtotime($education['start_date']))." - ".date("d-m-Y", strtotime($education['end_date']));?></td>
                           <td><?php echo $education['description'];?></td>
                           <td class="hi-actions">
                            <a href="#"><i class="fas fa-eye"></i></a>
                            <a onclick = "editeducation(<?php echo $education['education_id'];?>)" href="#" id="<?php echo $education['education_id'];?>" data-bs-toggle="modal" data-bs-target="#EditEducation" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                            <a href="<?php echo site_url('education/delete_education/'.$education['education_id'])?>" title="Delete"><i class="fas fa-trash-alt"></i></a>
                            </td>
                           </tr>
                           <?php  
                          $slno++;
                        endforeach; 
                       ?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
            <?php }
            ?>
            
   

</div>
</div>
</section>

          <script>
            function editeducation(id)
            {
              $.ajax({
                url:'<?php echo site_url() ?>education/view_educ/'+id,
                method: 'post', 
                dataType:"json",  
                success: function(data) {
                  $('#EditEducation').modal('show');
                  $('#edu_name').val(data.name);             
                  $('#eduid').val(data.education_id); 
                  $('#start').val(data.start_date); 
                  $('#end').val(data.end_date);
                  $('#des').val(data.description); 
                  $('select#edu_type').html(''); 

                    var selectValues = {
                      "1": "School",
                      "2": "Higher Secondary",
                      "3": "Bachelor Degree",
                      "4": "Master Degree",
                      "5": "PHD"
                    };
                    var $mySelect = $('#edu_type');
                    $.each(selectValues, function(key, value) {   
                      $('select#edu_type')
                      .append($("<option></option>")
                      .attr("value", key)
                      .attr("selected", key==data.edu_type)
                      .text(value)); 
                    });

                    $('#action').val("Edit"); 
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
            }
          </script>