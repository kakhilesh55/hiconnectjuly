<?php $edit_id = $this->uri->segment(3);?>
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4>leads</h4>
                  </div>
     
                  
                  <div class="card-body">
                      <div class="container">
      <form class="row" method="POST" name="enquiry"  action="<?php echo base_url() ?>Enquiries/update_enquiry" >
           <h5 class="mt-4">Personal Informations</h5>
 <hr>
       <div class="row">
  <div class="col-md-6">
    <label for="" class="form-label">First name</label>
    <input type="text" class="form-control" id="" name="name" value="<?php echo $lead->name;?>" >
       <input type="hidden" class="form-control" id="" name="id" value="<?php echo $lead->id;?>" >
  </div>
<div class="col-md-6">
    <label for="" class="form-label">Last name</label>
    <input type="text" class="form-control" id="" name="lname" value="<?php echo $lead->lastname;?>">
  </div>
  <div class="col-md-6">
    <label for="" class="form-label">Job title</label>
    <input type="text" class="form-control" id="" name="job" value="<?php echo $lead->job_title;?>">
  </div>
  <div class="col-md-6">
    <label for="" class="form-label">Company name</label>
    <input type="text" class="form-control" id="" name="cname" value="<?php echo $lead->company_name;?>">
  </div>
  <div class="col-md-6">
    <label for="" class="form-label">Lead Email</label>
    <input type="email" class="form-control" id="" name="email" value="<?php echo $lead->email;?>">
  </div>
  <div class="col-md-6">
    <label for="" class="form-label">Phone Number</label>
    <input type="number" class="form-control" id="" name="phone" value="<?php echo $lead->phone;?>">
  </div>
</div>
 <h5 class="mt-4">Assignment Informations</h5>
 <hr>
 <div class="row">
  <div class="col-md-6">
  <label for="" class="form-label">Lead Owner</label>
  <select class="form-select form-control" aria-label="Default select example" name="owner">
          <option selected>Open this select menu</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
  </div>
  <div class="col-md-6">
  <label for="" class="form-label">Lead Status</label>
  <select class="form-select form-control" aria-label="Default select example" name="status">
          <option selected>Open this select menu</option>
          <option value="1">New</option>
          <option value="2">Follow Up</option>
          <option value="3">Won</option>
            <option value="4">Unqualified/lost</option>
        </select>
  </div>
  <div class="mb-3 col-md-12">
        <label for="" class="form-label">Comments</label>
        <textarea class="form-control" id="" rows="5" name="comment"><?php echo $lead->comments;?></textarea>
      </div>

  <div class="modal-footer m-auto">
        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Update</button>
        <button type="button" class="btn btn-primary">Reset</button>
      </div>
</form>
      </div>
    </div>
    </div>
    </div>
  </div>
                <div class="row">
            
            </div>

              </div>
              </div>
            </section>
          </div>
