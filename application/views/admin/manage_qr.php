<?php $edit_id = $this->uri->segment(3);?>
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4>Manage Qr</h4>
                  </div>
                   <?php 
                  if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                 
                  </div>
                  <?php } ?>
                 
                <div class="container">
                  <div class="row">
                      <div class="col-md-3"><button type="button" class="btn btn-primary">
                       Total <span class="badge badge-transparent"><?php $query = $this->db->query('SELECT * FROM qr_images');
echo $query->num_rows();?></span>
                      </button></div>
                                            <div class="col-md-3"><button type="button" class="btn btn-success">
                       Downloaded <span class="badge badge-transparent"><?php $query = $this->db->query('SELECT * FROM qr_images where status=1');
echo $query->num_rows();?></span>
                      </button></div>

                      <div class="col-md-3"><button type="button" class="btn btn-warning">
                        Remaining <span class="badge badge-transparent"><?php $query = $this->db->query('SELECT * FROM qr_images where status=0');
echo $query->num_rows();?></span>
                      </button></div>

                      <div class="col-md-3"><button type="button" class="btn btn-danger btn-icon icon-left">
                        User Assigned <span class="badge badge-transparent"><?php $query = $this->db->query('SELECT * FROM qr_images where user_id!=0');
echo $query->num_rows();?></span>
                      </button></div>

                  </div>
                  </div>
                  <div class="card-footer">
                 
                <div class="row">
              <div class="col-12">
                  <div class="card-body">
                      <div class="col-md-6" style="float:left"> <input type="submit" name="download" class="btn btn" value="Download" /></div>
 <div class="col-md-6" style="float:right"> <a href="#" id="<?php echo $id;?>" data-bs-toggle="modal" data-bs-target="#exampleModal22" class="btn btn-primary update" title="Edit">Create QR</i></a></div>
                    <div class="table-responsive">
                        <form method="post" action="<?php echo base_url(); ?>Qrimages/download1">
 
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                            <input type="checkbox" id="allcb" name="allcb" class="form-control"/>
                            </th>
                            <th></th>
                            <th>Qr Image</th>
                            <th>Id</th>
                            <th>User</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Download</th>
                       
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                         if(isset($products) && is_array($products) && count($products)): $slno=1; 
                          foreach($products as $product) : 
                          ?>
                          <tr>
                              <td>    <input type="checkbox" name="images[]" class="select" value="<?php echo $product['qr_image'];?>" />
</td>
                           <td><?php echo $slno;?></td>
                           <td><?php if($product['qr_image']!=''){ ?>
                            <img src="<?php echo base_url('uploads/qr_image/'.$product['qr_image']); ?>" width="100px" height="100px">
                          <?php } else { ?>
                            <img src="<?php echo base_url('uploads/manage_products/default_product_image.png'); ?>" width="100px" height="100px" >
                          <?php } ?></td>
                           <td><?php echo $product['qr_text'];?></td>
                            <td><?php echo $product['user_id'];?></td>
                                                      <td><?php echo $product['created_date'];?></td>
                                                                                  <td><?php if($product['status']==1)echo "<span class='badge badge-danger'>Downloaded</span>"; else echo "<span class='badge badge-success'>created</span>";?></td>
                                                                                  <td>
                                                                                     
                                            	<a id="yearr" onclick="ab('<?php echo $product['qr_image'];?>')" class="btn btn-primary" href="<?php echo base_url('uploads/qr_image/'. $product['qr_image']);?>" download="<?php echo $product['qr_image'];?>">Download QR</a>                                          
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
                    <!--  <div align="center">
   <input type="submit" name="download" class="btn btn-primary" value="Download" />
  </div>-->
  </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            

            
            
            <script>
               $('#allcb').change(function(){
    if($(this).prop('checked')){
        $('tbody tr td input[type="checkbox"]').each(function(){
            $(this).prop('checked', true);
        });
    }else{
        $('tbody tr td input[type="checkbox"]').each(function(){
            $(this).prop('checked', false);
        });
    }
});
            </script>
<script type="text/javascript">
    $('#selectAll').click(function(e) {
    if($(this).hasClass('checkedAll')) {
      $('input').prop('checked', false);   
      $(this).removeClass('checkedAll');
    } else {
      $('input').prop('checked', true);
      $(this).addClass('checkedAll');
    }
});
function ab(user)
{
    
    
        $.ajax({

type: "GET",
url: "<?php echo base_url() ?>Qrimages/file_download/"+user,
//data: "user="+user+ "&scan=" +content,
dataType: "json",

success: function(data) {
alert(data);
e.preventDefault();
}
});
}
</script>
              </div>
              </div>
            </section>
          </div>
                                          <div class="modal fade" id="exampleModal22" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Create Qr</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      
       <form name="products" method="post" action="<?= base_url('Qrimages/qr_generater') ?>" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="name">No Of Qr</label>
                        <input type="text" class="form-control" id="product_name" name="qr" value="" required="">
                      </div>
                
                  </div>
                   
                   <input type="submit" name="submit" id="submit" class="btn btn-primary" value="<?php echo isset($edit_id)?'UPDATE':'CREATE';?>">
                  </div>
                </form>
      </div>
     
    </div>
  </div>
</div>

