<?php
$this->load->view('admin/header');
?>

<div class="container-fluid">
  <div class="card card-register mx-auto mt-5">
        <div class="card-header">Update Password</div>
        <div class="card-body">
          <form id="password_form">
              
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="old_password" name="old_password" class="form-control" placeholder="Old Password" required="required">
                    <label for="inputPassword">Old Password</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-label-group">
                    <input type="password" id="new_password" name="new_password" class="form-control" placeholder="New Password" required="required">
                    <label for="inputPassword">New Password</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-label-group">
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm New Password" required="required">
                    <label for="inputPassword">Confirm New Password</label>
                  </div>
                </div>
              </div>
            </div>
            <button type="button" class="btn btn-primary btn-block btn-password">Update Password</button>
          </form>
        </div>
            <div class="err">  </div>
      </div>
</div>


<?php
	$this->load->view('admin/footer');
?>
        
 