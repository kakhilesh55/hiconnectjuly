 <div class="main-content">
    <section class="section">
      <div class="row ">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Change Password</h4>
              </div>
              <?php  if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php } ?>
              <div class="card-body">
                <form method="POST" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="old_password">Current Password</label>
                    <input id="old_password" type="password" class="form-control" name="old_password" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your Current Password
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password">New Password</label>
                    <input id="password1" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                      name="password1" tabindex="2" required>
                    <div class="invalid-feedback">
                      Please fill in your New Password
                    </div>
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password2" type="password" class="form-control" name="password2"
                      tabindex="2" required>
                      <div class="invalid-feedback">
                      Please fill in your Confirm Password
                    </div>
                  </div>
                  <div class="form-group">
                     <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Update Password">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </section>
  </div>