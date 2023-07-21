<?php $edit_id = $this->uri->segment(3);
 ?>
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header d-flex" style="justify-content: space-between;">
                    <h4>Services</h4>
                      <a href="#" id="<?php echo $id;?>" data-bs-toggle="modal" data-bs-target="#exampleModal22" class="btn btn-primary update" title="Edit">Add Service</i></a> 
                  </div>
                  <?php  if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php }  ?>
               
                <div class="row">
              <div class="col-12">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Services</th>
                            <th>Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                         if(isset($services) && is_array($services) && count($services)): $slno=1; 
                          foreach($services as $service) : 
                          ?>
                          <tr>
                           <td><?php echo $slno;?></td>
                           <td><?php echo $service['service'];?></td>
                           <td><?php echo $service['description'];?></td>
                            <td><a href="#" id="<?php echo $service['service_id'];?>" data-bs-toggle="modal" data-bs-target="#exampleModal223" class="btn btn-primary update" title="Edit"><i class="fa fa-edit"></i></a>
                             <a href="<?php echo site_url('services/delete_service/'.$service['service_id'])?>" class="btn btn-icon btn-danger" title="Delete"><i class="fa fa-times"></i></a></td>
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
            </div>

              </div>
              </div>
            </section>
          </div>
                 <div class="modal fade" id="exampleModal22" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Add Service</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      
       <form name="services" method="post" action="<?= base_url('services/services') ?>">
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="service">Service Name</label>
                        <input type="text" class="form-control" id="service" name="service" value="<?php echo isset($service->service)?$service->service:'';?>" required="">
                      </div>
                       <div class="form-group col-md-12">
                        <label for="desc">Description</label>
                        <textarea class="form-control" id="description" name="description" maxlength="250"><?php echo isset($service->description)?$service->description:'';?></textarea>
                      </div>
                    </div>
                    </div>
                  <div class="card-footer">
                   <?php if(!empty($edit_id)){?>
                          <input type="hidden" name="action" value="<?php echo @$edit_id; ?>" >
                         <?php  } else {?>
                          <input type="hidden" name="action" value="create">
                          <?php } ?>
                   <input type="submit" name="submit" id="submit" class="btn btn-primary" value="<?php echo isset($edit_id)?'UPDATE':'ADD';?>">
                  </div>
                </form>
      
      </div>
     
    </div>
  </div>
</div>
   <div class="modal fade" id="exampleModal223" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Edit Service</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      
       <form name="services" method="post" action="<?= base_url('education/update_services') ?>">
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="service">Service Name</label>
                                                <input type="hidden" class="form-control" id="service_id" name="service" value="<?php echo isset($service->service)?$service->service:'';?>" required="">

                        <input type="text" class="form-control" id="service_name" name="service_names" value="<?php echo isset($service->service)?$service->service:'';?>" required="">
                      </div>
                       <div class="form-group col-md-12">
                        <label for="desc">Description</label>
                        <textarea class="form-control" id="desc" name="des" maxlength="250"><?php echo isset($service->description)?$service->description:'';?></textarea>
                      </div>
                    </div>
                    </div>
                  <div class="card-footer">
                   <?php if(!empty($edit_id)){?>
                          <input type="hidden" name="action" value="<?php echo @$edit_id; ?>" >
                         <?php  } else {?>
                          <input type="hidden" name="action" value="create">
                          <?php } ?>
                   <input type="submit" name="submit" id="submit" class="btn btn-primary" value="<?php echo isset($edit_id)?'UPDATE':'ADD';?>">
                  </div>
                </form>
      
      </div>
     
    </div>
  </div>
</div>
<script>
      $(document).on('click', '.update', function(){  
           var user_id = $(this).attr("id");  
           $.ajax({  
                url:"<?php echo base_url() ?>Education/view_serv/",  
                method:"POST",  
                data:{user_id:user_id},  
                dataType:"json",  
                success:function(data)  
                {  
                   
                  
               
                     
                     $('#service_name').val(data.service);  
          
                   $('#desc').val(data.description); 
                    $('#service_id').val(data.service_id); 
                }  
           })  
      });  

</script>

