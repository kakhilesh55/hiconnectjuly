
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4>Contact Details</h4>
                  </div>
                   <?php 
                  if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php } ?>
                  <form name="contact" method="post" action="<?= base_url('Contact/contact_details') ?>">
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($contact_details->email)?$contact_details->email:'';?>" required="">
                      </div>
                       <div class="form-group col-md-3">
                        <label for="mob1">Mobile - 1</label>
                        <input type="text" class="form-control" id="mob1" name="mob1" value="<?php echo isset($contact_details->mob1)?$contact_details->mob1:'';?>">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="mob2">Mobile - 2</label>
                        <input type="text" class="form-control" id="mob2" name="mob2" value="<?php echo isset($contact_details->mob2)?$contact_details->mob2:'';?>">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="mob3">Mobile - 3</label>
                        <input type="text" class="form-control" id="mob3" name="mob3" value="<?php echo isset($contact_details->mob3)?$contact_details->mob3:'';?>">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="whatsapp1">WhatsApp - 1</label>
                        <input type="text" class="form-control" id="whatsapp1" name="whatsapp1" value="<?php echo isset($contact_details->whatsapp1)?$contact_details->whatsapp1:'';?>" required="">
                      </div>
                       <div class="form-group col-md-3">
                        <label for="whatsapp2">WhatsApp - 2</label>
                        <input type="text" class="form-control" id="whatsapp2" name="whatsapp2" value="<?php echo isset($contact_details->whatsapp2)?$contact_details->whatsapp2:'';?>">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="whatsapp3">WhatsApp - 3</label>
                        <input type="text" class="form-control" id="whatsapp3" name="whatsapp3" value="<?php echo isset($contact_details->whatsapp3)?$contact_details->whatsapp3:'';?>">
                      </div>
                    </div>
                    
                  </div>
                  <div class="card-footer">
                    <?php if(!empty($contact_details)){?>
                          <input type="hidden" name="action" value="<?php echo $contact_details->contact_id; ?>" >
                         <?php  } else {?>
                          <input type="hidden" name="action" value="create">
                          <?php } ?>
                    <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Save">
                  </div>
                </form>
                </div>
              </div>
              </div>
            </section>
          </div>
