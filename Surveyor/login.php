<?php
include "./config/config.php";


 
include BASE_PATH.'/includes/header.php';?>




<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-3"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lga-8 mx-auto">
              <h3 class="login-heading mb-4">Welcome back!</h3>
              <form class="user" method="POST" action="authenticate.php">
                <div class="form-label-group">
                  <input type="text" id="inputEmail" class="form-control"  placeholder="Enter Username" name="surveyor_name" value="<?php  if(isset($_COOKIE["csurveyor_name"])) {
                      echo @$_COOKIE['csurveyor_name'];
                  } ?>" required autofocus>
                  <label for="inputEmail">Enter Username</label>
                </div>

                <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control" placeholder="password" name="password" value="<?php  if(isset($_COOKIE["cpass"])) {
                      echo @$_COOKIE['cpass'];
                  } ?>" required>
                  <label for="inputPassword">Enter Password</label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <!-- <input type="checkbox" class="custom-control-input" name="" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Remember password</label> -->
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign in</button>
                
              </form>
            </div>
            <div class="text-center"><a href="../index.php">Admin Login</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include BASE_PATH.'/includes/footer.php'; ?>
