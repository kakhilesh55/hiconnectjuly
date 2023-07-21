<?php $edit_id = $this->uri->segment(3);
if(isset($testimonials) && is_array($testimonials) && count($testimonials))
{ ?>
  <div class="row ">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card shadow-none m-0">
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
                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddTestimonial" id="<?php echo $id;?>">Add a Testimonials</button>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="card">
                  <?php if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php } ?>
                      
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Company</th>
                            <th>Message</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php 
                          $slno=1; 
                          foreach($testimonials as $testimonial) : 
                          ?>
                          <tr>
                            <td><?php echo $slno;?></td>
                            <td><?php echo $testimonial['name'];?></td>
                            <td><?php echo $testimonial['designation'];?></td>
                            <td><?php echo $testimonial['company'];?></td>
                            <td><?php echo $testimonial['message'];?></td>
                            <td class="hi-actions">
                              <a href="#"><i class="fas fa-eye"></i></a>
                              <a onclick = "edittestimonial(<?php echo $testimonial['testimonial_id'];?>)" href="#" id="<?php echo $testimonial['testimonial_id'];?>" data-bs-toggle="modal" data-bs-target="#EditTestimonial" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                              <a href="<?php echo site_url('testimonials/delete_testimonial/'.$testimonial['testimonial_id'])?>" title="Delete"><i class="fas fa-trash-alt"></i></a></td>
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
            <?php }
            else { ?>
            <div class="d-flex align-items-center justify-content-center">
                <div class="text-center">
                    <img src="<?php echo base_url(); ?>assets/img/users/No-Items.png"/>
                    <h3>No Items</h3>
                    <p>Items added to the task will appear here</p>
                </div>
            </div>
<div class="hi-add-plus">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddTestimonial" id="<?php echo $id;?>">Add a Testimonial</button>
</div>
 <?php }?>
  <div class="modal fade" id="AddTestimonial" tabindex="-1" aria-labelledby="formModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="formModal">Add Testimonials</h4>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <form name="testimonials" method="post" action="<?= base_url('testimonials/testimonials') ?>">
                  <div class="card-body">
                    <div class="form-group">
                      <div class="form-floating">
                        <input type="text" class="form-control" name="name" value="<?php echo isset($testimonial->name)?$testimonial->name:'';?>" required="">
                        <label for="name">Name</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-floating">
                        <input type="text" class="form-control" name="designation" value="<?php echo isset($testimonial->designation)?$testimonial->designation:'';?>">
                        <label for="designation">Designation</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-floating">
                        <input type="text" class="form-control" name="company" value="<?php echo isset($testimonial->company)?$testimonial->company:'';?>">
                        <label for="company">Company</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-floating">
                        <textarea class="form-control" name="message"  required="" maxlength="250"><?php echo isset($testimonial->message)?$testimonial->message:'';?></textarea>
                        <label for="message">Message</label>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <?php if(!empty($edit_id)){?>
                      <input type="hidden" name="action" value="<?php echo @$edit_id; ?>" >
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
<div class="modal fade" id="EditTestimonial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Edit Testimonials</h4>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <form name="testimonials" method="post" action="<?= base_url('testimonials/update_testimonial') ?>">
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="name">Name</label>
                          <input type="hidden" class="form-control" id="testi_id" name="id" value="<?php echo isset($testimonial->name)?$testimonial->name:'';?>" required="">

                        <input type="text" class="form-control" id="testi_name" name="name" value="<?php echo isset($testimonial->name)?$testimonial->name:'';?>" required="">
                      </div>
                      <div class="form-group col-md-12">
                        <label for="designation">Designation</label>
                        <input type="text" class="form-control" id="testi_designation" name="designation" value="<?php echo isset($testimonial->designation)?$testimonial->designation:'';?>">
                      </div>
                      <div class="form-group col-md-12">
                        <label for="company">Company</label>
                        <input type="text" class="form-control" id="testi_company" name="company" value="<?php echo isset($testimonial->company)?$testimonial->company:'';?>">
                      </div>
                    </div>
                     <div class="form-row">
                       <div class="form-group col-md-12">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="testi_message" name="message"  required="" maxlength="250"><?php echo isset($testimonial->message)?$testimonial->message:'';?></textarea>
                      </div>
                    </div>
                    </div>
                  <div class="card-footer">
                    <?php if(!empty($edit_id)){?>
                          <input type="hidden" name="action" value="<?php echo @$edit_id; ?>" >
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

   <script>
            function edittestimonial(id)
            {
              $.ajax({
                url:'<?php echo site_url() ?>testimonials/view_testimonial/'+id,
                method: 'post', 
                dataType:"json",  
                success: function(data) {
                  $('#EditTestimonial').modal('show');
                  $('#testi_name').val(data.tname);             
                  $('#testi_id').val(data.testimonial_id); 
                  $('#testi_designation').val(data.tdesignation); 
                  $('#testi_company').val(data.tcompany);
                  $('#testi_message').val(data.tmessage); 
                  $('#action').val("Edit"); 
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
            }
          </script>

<script>
      $(document).on('click', '.update', function(){  
           var user_id = $(this).attr("id");  
           $.ajax({  
                url:"<?php echo base_url() ?>Education/view_testi/",  
                method:"POST",  
                data:{user_id:user_id},  
                dataType:"json",  
                success:function(data)  
                {  
                   
                  
               
                     
                     $('#testi_name').val(data.name);  
          
                   $('#testi_designation').val(data.designation); 
                   $('#testi_company').val(data.company); 
                   $('#testi_message').val(data.message); 
                    $('#testi_id').val(data.testimonial_id); 
                }  
           })  
      });  

</script>
