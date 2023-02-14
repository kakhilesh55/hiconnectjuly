<?php $edit_id = $this->uri->segment(3);?>
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4>leads</h4>
                  </div>
             
                  <form name="products" method="post" action="" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $lead->name;?>" required="">
                      </div>
                      
                    <div class="form-group col-md-4">
                        <label for="price">Type</label>
                        <input type="text" class="form-control" id="regular_price" name="regular_price" value="<?php echo $lead->type;?>">
                      </div>
                    <div class="form-group col-md-4">
                        <label for="price">Status</label>
                        <input type="text" class="form-control" id="sale_price" name="sale_price" value="<?php echo $lead->status;?>">
                      </div>
                    </div>
                    <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="price">Comment</label>
                        <input type="text" class="form-control" id="sku" name="sku" value="<?php echo $lead->comment;?>">
                      </div>

                </form>
                <div class="row">
            
            </div>

              </div>
              </div>
            </section>
          </div>
