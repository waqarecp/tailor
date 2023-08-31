<?php include 'header.php';
?>
<?php include 'navbar.php';
?>

<?php include 'sidebar.php';
?>


<div class="col-lg-6 col-md-7 d-flex flex-column align-items-center justify-content-center " style="margin-left: 40%; margin-top: 130px;">

<div class="d-flex justify-content-center py-4">
  <a href="index.html" class="logo d-flex align-items-center w-auto">
  </a>
</div><!-- End Logo -->

<div class="card mb-3">

  <div class="card-body">

    <div class="pt-4 pb-2">
    </div>

    <form class="row g-3 needs-validation" novalidate="" style="height: 350px;">

      <div class="col-12">
        <label for="yourUsername" class="form-label">Role:</label>
        <div class="input-group has-validation">
        <div class="radio">
      <label><input type="radio" name="optradio" checked>Admin</label>
    </div>
    <div class="radio">
      <label><input type="radio" name="optradio">User</label>
    </div>
        </div>
      </div>

      <div class="col-12">
        <label for="yourPassword" class="form-label">Name:</label>
        <input type="text" name="name" class="form-control" id="yourname" required="">
        <div class="invalid-feedback">Please enter your Name!</div>
      </div>

      <div class="col-12">
        <label for="yourPassword" class="form-label">Password:</label>
        <input type="password" name="password" class="form-control" id="yourPassword" required="">
        <div class="invalid-feedback">Please enter your password!</div>
      </div>

      </div>
      <div class="col-4 px-1 ">
        <button class="btn btn-primary w-100 " type="submit">Add User</button>
      </div>
     

  </div>
</div>



</div>
<?php  include 'footer2.php';
 ?>