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
                  <form name="products" method="post" action="<?= base_url('Qrimages/qr_generater') ?>" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="name">No Of Qr</label>
                        <input type="text" class="form-control" id="product_name" name="qr" value="" required="">
                      </div>
                
                  </div>
                  <div class="card-footer">
                  
                   <input type="submit" name="submit" id="submit" class="btn btn-primary" value="<?php echo isset($edit_id)?'UPDATE':'CREATE';?>">
                  </div>
                </form>
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
<script type="text/javascript">
        
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
