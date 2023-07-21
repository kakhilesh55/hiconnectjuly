<?php $edit_id = $this->uri->segment(3);?>
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4>Manage Products</h4>
                  </div>
                   <?php 
                  if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php } ?>
                  <form name="products" method="post" action="<?= base_url('manage_products/product_details') ?>" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo isset($product->product_name)?$product->product_name:'';?>" required="">
                      </div>
                      
                    <div class="form-group col-md-4">
                        <label for="price">Regular Price</label>
                        <input type="text" class="form-control" id="regular_price" name="regular_price" value="<?php echo isset($product->regular_price)?$product->regular_price:'';?>">
                      </div>
                    <div class="form-group col-md-4">
                        <label for="price">Sale Price</label>
                        <input type="text" class="form-control" id="sale_price" name="sale_price" value="<?php echo isset($product->sale_price)?$product->sale_price:'';?>">
                      </div>
                    </div>
                    <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="price">SKU</label>
                        <input type="text" class="form-control" id="sku" name="sku" value="<?php echo isset($product->sku)?$product->sku:'';?>">
                      </div>

                      <div class="form-group col-md-4">
                        <label for="price">Units</label>
                        <input type="text" class="form-control" id="units" name="units" value="<?php echo isset($product->units)?$product->units:'';?>">
                      </div>

                      <div class="form-group col-md-4">
                        <label for="price">Length</label>
                        <input type="text" class="form-control" id="length" name="length" value="<?php echo isset($product->length)?$product->length:'';?>">
                      </div>

                      <div class="form-group col-md-4">
                        <label for="price">Breadth</label>
                        <input type="text" class="form-control" id="breadth" name="breadth" value="<?php echo isset($product->breadth)?$product->breadth:'';?>">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="price">Height</label>
                        <input type="text" class="form-control" id="height" name="height" value="<?php echo isset($product->height)?$product->height:'';?>">
                      </div>
                       <div class="form-group col-md-4">
                        <label for="price">Colour</label>
                        <input type="text" class="form-control" id="clr" name="clr" value="<?php echo isset($product->colour)?$product->colour:'';?>">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="price">Video Url</label>
                        <input type="text" name="video" id="image" class="form-control" value="<?php echo isset($product->video)?$product->video:'';?>"/>                      </div>
                      <div class="form-group col-md-4">
                      <label for="image">Thumb Image</label>
                          <input type="file" name="image" id="image" class="form-control" multiple=""/>
                          <?php if(!empty($product->image)){ ?>
                        <div class="img-box">
                            <img src="<?php echo base_url('uploads/manage_products/'.$product->image); ?>" height="100px" width="100px">
                        </div>
                    <?php } ?>
                      </div>
                       <div class="form-group col-md-4">
                      <label for="image">Image</label>
                                <input type="file" class="form-control" name="files[]" multiple/>

                      
                   
                      </div>
                       <div class="form-group col-md-8">
                        <label for="desc">Short Description</label>
                        <textarea class="form-control" id="short_description" name="short_description" maxlength="250"><?php echo isset($product->short_description)?$product->short_description:'';?></textarea>
                      </div>
                    </div>
                    <div class="form-row">
                       <div class="form-group col-md-12">
                        <label for="desc">Full Description</label>
                        <textarea class="form-control" id="long_description" name="long_description" maxlength="250"><?php echo isset($product->long_description)?$product->long_description:'';?></textarea>
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
                            <th>Product Image</th>
                            <th>Name</th>
                            <th>Regular Price</th>
                            <th>Sale Price</th>
                            <th>Short Description</th>
                            <th>Full Description</th>
                           <th>Status</th>

                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                         if(isset($products) && is_array($products) && count($products)): $slno=1; 
                          foreach($products as $product) : 
                          ?>
                          <tr>
                           <td><?php echo $slno;?></td>
                           <td><?php if($product['image']!=''){ ?>
                            <img src="<?php echo base_url('uploads/manage_products/'.$product['image']); ?>" width="100px" height="100px">
                          <?php } else { ?>
                            <img src="<?php echo base_url('uploads/manage_products/default_product_image.png'); ?>" width="100px" height="100px" >
                          <?php } ?></td>
                           <td><?php echo $product['product_name'];?></td>
                            <td><?php echo $product['regular_price'];?></td>
                           <td><?php echo $product['sale_price'];?></td>
                           <td><?php echo $product['short_description'];?></td>
                           <td><?php echo $product['long_description'];?></td>
                           <td><?php if($product['status']==1){;?><span class="badge badge-danger">Not Active</span><?php } else {?><span class="badge badge-success">Active</span><?php }?></td>
                            <td><a href="<?php echo site_url('manage_products/product_details/'.$product['id'])?>" class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></a> 
                             <a href="<?php echo site_url('manage_products/delete_product/'.$product['id'])?>" class="btn btn-icon btn-danger" title="Delete"><i class="fa fa-times"></i></a>
                             <a href="<?php echo site_url('manage_products/dis_product/'.$product['id'])?>" class="btn btn-icon btn-info" title="Discontinue"><i class="fa fa-edit"></i></a>
                             
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

              </div>
              </div>
            </section>
          </div>
