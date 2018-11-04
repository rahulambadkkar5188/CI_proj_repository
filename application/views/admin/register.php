<?php
$this->load->view('admin/header');
?>

<div class="container-fluid">
  <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        <div class="card-body">
          <form id ="register-form">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="name" name="uname" class="form-control" placeholder="Name" required="required" autofocus="autofocus">
                    <label for="name">Name</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="mobile" name="umobile" class="form-control" placeholder="Mobile" required="required">
                    <label for="mobile">Mobile</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="file" id="file" name="uprofile" class="form-control" placeholder="Srelect Profile" required="required">
                <label for="uprofile">Select Profile</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" name="uemail" class="form-control" placeholder="Email address" required="required">
                <label for="inputEmail">Email address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="inputPassword" name="upass" class="form-control" placeholder="Password" required="required">
                    <label for="inputPassword">Password</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="confirmPassword" name="ucpass" class="form-control" placeholder="Confirm password" required="required">
                    <label for="confirmPassword">Confirm password</label>
                  </div>
                </div>
              </div>
            </div>
            <button type="button" class="btn btn-primary btn-block btn-register">Register</button>
          </form>
          </div>
          <div class="err">  </div>
  </div>
</div>


<?php
	$this->load->view('admin/footer');
?>
        
 