<?php 
include 'header.php'; 
include 'actions.php'; ?>
<title>Login </title>
<?php 
if(isset($_SESSION['id']) & !empty($_SESSION['id'])){
  echo "<script>setTimeout(function(){ window.location.href='index.php'; }, 0);</script>";
}
     if (isset($_POST['btn_login'])) {
     
          $email=$_POST['email'];
          $password=$_POST['password'];
  
          if(!empty($email) && !empty($password)){
              $result=$object->select("*","admin","email='".$email."' AND password='".$password."'");
          
              $row=$result->fetch_assoc();
            
            if(!empty($row['id'])){
             
                if($row['status']==1){
                  $_SESSION['id']=$row['id'];
                  $_SESSION['name']=$row['name'];
                  $msg="<div class='alert alert-success alert-dismissible'><a href='javascript:void(0)' class='close' data-dismiss='alert' aria-label='close'>&times;</a><h4>Welcome to Admin Panel.</h4></div>";
                  echo "<script>setTimeout(function(){ window.location.href='index.php'; }, 2000);</script>";
                }else{
                  $msg= "<div class='alert alert-danger alert-dismissible'><a href='javascript:void(0)' class='close' data-dismiss='alert' aria-label='close'>&times;</a><h4>Your account has been blocked or deleted! Contact support.</h4></div>";
                }
             }else{
                $msg= "<div class='alert alert-danger alert-dismissible'><a href='javascript:void(0)' class='close' data-dismiss='alert' aria-label='close'>&times;</a><h4>Wrong Email or Password entered! Try again.</h4></div>";
             }
          }else{
            $msg= "<div class='alert alert-danger alert-dismissible'><a href='javascript:void(0)' class='close' data-dismiss='alert' aria-label='close'>&times;</a><h4>Fill all the fields!</h4></div>";
          }
        }
  ?>
</head>
<body>
 
<main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">NiceAdmin</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username &amp; password to login</p>
                  </div>

                  <form class="row g-3 needs-validation" action="" method="POST">

                  <div><?php echo isset($msg)?$msg:''; ?></div>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" id="email" name="email" class="form-control"required="">
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" id="password" name="password" class="form-control"  required="">
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100"  name="btn_login" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->
</body>
</html>
