<?php
$this->load->view('admin/header');
?>

<div class="container-fluid">
  <div class="card card-register mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
          <form id="login_form">
              
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" name="uemail" class="form-control" placeholder="Email address" required="required">
                <label for="inputEmail">Email address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-label-group">
                    <input type="password" id="inputPassword" name="upass" class="form-control" placeholder="Password" required="required">
                    <label for="inputPassword">Password</label>
                  </div>
                </div>
                
              </div>
            </div>
            <button type="button" class="btn btn-primary btn-block btn-login">Login</button>
          </form>
        </div>
            <div class="err">  </div>
      </div>
</div>


<?php
	$this->load->view('admin/footer');
?>
        
 