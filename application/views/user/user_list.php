
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4>User List</h4>
                  </div>
                  <div class="card-body">
                     <?php if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php }  ?>
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">Sl No. </th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>User ID</th>
                            <th>Type</th>
                            <th>User Level</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Added By</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                         if(isset($users) && is_array($users) && count($users)): $slno=1; 
                          foreach($users as $user) : 
                          ?>
                          <tr>
                            <td><?php echo $slno;?></td>
                            <td><?php echo $user['name'];?></td>
                            <td class="align-middle"><?php echo $user['phone'];?></td>
                            <td><?php echo $user['user_id'];?></td>
                            <td><?php if($user['type']==1) echo "Personal"; else if($user['type']==2) echo "Business"; else echo "";?></td>
                            <td><?php if($user['user_level']==1) echo "Admin"; else if($user['user_level']==2) echo "Manager"; else if($user['user_level']==3) echo "User";?></td>
                            <td><?php echo $user['register_date'];?></td>
                            <td><?php echo ($user['status']==1)?'Active':'Inactive';?></td>
                            <td><?php
                            if($this->session->userdata('user_level') ==2)
                            {
                                echo $this->session->userdata('username');
                            }
                            else
                            {
                             if(isset($added_by) && count($added_by)):
                              foreach($added_by as $added) : 
                                $user_level = ($added['user_level']==1)?'Admin':'Manager';
                                echo ($added['id']==$user['added_by'])?$added['name'].'('.$user_level.')':'';
                              endforeach; 
                            endif;
                            }?></td>
                            <td>
                              <a href="<?php echo site_url('admin/user/'.$user['id'])?>" class="btn btn-icon icon-left btn-primary" title="Edit"><i class="far fa-edit"></i></a>
                              <a href="<?php echo site_url('admin/delete_user/'.$user['id'])?>" class="btn btn-icon icon-left btn-danger" title="Delete"><i class="fas fa-times"></i></a>
                              <a href="<?php echo site_url('admin/active_user/'.$user['id'])?>" class="btn btn-icon icon-left btn-success" title="Activate"><i class="fas fa-check"></i></a>
                              <a href="<?php echo site_url('admin/inactive_user/'.$user['id'])?>" class="btn btn-icon icon-left btn-warning" title="Deactivate"><i class="fas fa-exclamation-triangle"></i></a>
                            </td>
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

    
          </script>

