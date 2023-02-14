
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4>Upgrade Account</h4>
                  </div>
                   <?php 
                  if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php } ?>
                  <div class="card-body">
                  <form name="user" method="post" action="" enctype="multipart/form-data">

                    <?php //if(isset($show_selected_package)){ ?>
                    <div class="form-row"> 
                      <div class="form-group col-md-4 ">
                        <label for="upgrade_option">Upgrade Options</label>
                        <select id="upgrade_option" name="upgrade_option" class="form-control" onchange="upgrade_change(this.value)" >
                          <?php /*$('.upgrade').hide();$('.'+this.value).show();*/?>
                          <option value="package">Package</option>
                          <option value="product">Product</option>
                          <option value="both">Both</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-row "> 
                      <div class="form-group col-md-4 upgrade package both">
                        <label for="package">Package</label>
                        <select id="package" name="package" class="form-control package" onchange="package_details(this.value)" >
                          <?php 
                          if(isset($packages) && count($packages)):
                            foreach($packages as $package) :
                            ?>
                            <option value="<?php echo $package['package_id'];?>"  <?php if(isset($show_selected_package) && $show_selected_package!=0){echo ($show_selected_package== $package['package_id'])?'selected':'';} ?>>
                              <?php echo $package['package'];?>
                              </option>
                             <?php  
                            endforeach; 
                          endif; ?>
                        </select>
                      </div>
                      <div class="form-group col-md-4 upgrade package both">
                        <label for="package_amount">Amount</label>
                        <input type="text" name="package_amount" id="package_amount" class="form-control"  value="<?php if(isset($show_selected_package) && $show_selected_package!=0){ echo $selected_package_amount;} ?>">
                      </div>
                    </div>
                    <div class="form-row"> 
                      <div class="form-group col-md-4 upgrade product both" style="display: none;">
                        <label for="product">Product</label>
                        <select id="product" name="product" class="form-control product" onchange="product_details(this.value)"  >
                          <?php 
                          if(isset($products) && count($products)):
                            foreach($products as $product) :
                            ?>
                            <option value="<?php echo $product['id'];?>"  <?php if(isset($show_selected_product) && $show_selected_product!=''){echo ($show_selected_product== $product['id'])?'selected':'';} ?>>
                              <?php echo $product['product_name'];?>
                              </option>
                             <?php  
                            endforeach; 
                          endif; ?>
                        </select>
                      </div>
                      <div class="form-group col-md-4 upgrade product both" style="display: none;">
                        <label for="product_amount">Amount</label>
                        <input type="text" name="product_amount" id="product_amount" class="form-control"  value="<?php if(isset($selected_product_amount) && $selected_product_amount!=''){echo $selected_product_amount;} ?>">
                      </div>
                    </div>
                    <div class="form-row"> 
                      <div class="form-group col-md-4 upgrade both" style="display: none;">
                        <label for="total_amount">Total Amount</label>
                        <input type="text" name="total_amount" id="total_amount" class="form-control">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-4 cover both">
                        <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit">
                      </div>
                    </div>
                  <?php //} ?>

                    </div>
                </form>
              
            </div>

              </div>
              </div>
            </section>
          </div>
          <script type="text/javascript">
            function SelectTheme(e)
            {
              $('#select_themeimg').val(e);
            }

            function upgrade_change(val)
            {
              $('.upgrade').hide();
              $('.'+val).show();
              if(val=='both')
              {
                calculate_total();
              }
            }

            function calculate_total()
            {
              var val1 = (isNaN(parseInt($('#package_amount').val()))) ? 0 : parseInt($('#package_amount').val());
              var val2 = (isNaN(parseInt($('#product_amount').val()))) ? 0 : parseInt($('#product_amount').val());
              $('#total_amount').val(val1 + val2);
            }

            function package_details(package_id) {
              $.ajax({
                url: 'get_package_details/'+package_id,
                type:'POST',
                data: {'package_id': package_id },
                success:function(result){
                    $('#package_amount').val(result);
                    calculate_total();
                }
              })
            }

            function product_details(product_id) {
              $.ajax({
                url: 'get_product_details/'+product_id,
                type:'POST',
                data: {'product_id': product_id },
                success:function(result){
                    $('#product_amount').val(result);
                    calculate_total();
                }
              })
            }
          </script>
