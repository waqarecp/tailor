
<?php include 'header.php'; ?><?php
if(!isset($_SESSION['id']) & empty($_SESSION['id'])){
  echo "<script>setTimeout(function(){ window.location.href='logout.php'; }, 0);</script>";
}?>

</head>

<body>

<?php  include'navbar.php'; 
       include'sidebar.php'; 
       
       ?>

 <?php 
 $select=$object->select("*","customers","status=1"); 
 $row_count = $select->num_rows;
 $select=$object->select("*","orders","status=1"); 
 $order_count = $select->num_rows;
 ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
      <!-- Customers Card -->
      <div class="col-md-6">
      <div class="card info-card customers-card">
      

  <div class="card-body">
    <h5 class="card-title"><a href="customers.php">Customers</a> <span>| Today</span></h5>

    <div class="d-flex align-items-center">
      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
        <i class="bi bi-people"></i>
      </div>
      <div class="ps-3">
        <h6><?php echo $row_count; ?></h6>

      </div>
    </div>

  </div>
</div>

</div><!-- End Customers Card -->


            <!-- Order Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title"><a href="orders.php">Orders</a> <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $order_count; ?></h6> 

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Order Card -->
    </section>

  </main><!-- End #main -->

 <?php 
 include 'footer1.php'; 
 include 'footer2.php'; 
 ?>
 