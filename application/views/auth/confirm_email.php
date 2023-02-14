 <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Confirm Email</h4>
              </div>
              <?php  if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php } ?>
              <div class="card-body">
                <p class="text-muted">Enter Your New Password</p>
                <form method="POST">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" value="<?php echo $_GET['email'];?>" required readonly>
                  </div>
                  <div class="form-group">
                    <label for="password">New Password</label>
                    <input id="password1" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                      name="password1" tabindex="2" required>
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password2">Confirm Password</label>
                    <input id="password2" type="password" class="form-control" name="password2"
                      tabindex="2" required>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Reset Password">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>