<?php include 'header.php';
?>

<body>

 <?php include 'navbar.php';
 include 'sidebar.php';
 ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Customer</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Customer</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

   <!-- Table with stripped rows -->
   <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">contact</th>
                    <th scope="col">Address</th>
                    <th scope="col">Status</th> 
                    <th scope="col">Actions</th>
                  
                  </tr>
                </thead>
                <tbody>
                 
                <?php   $query = $object->select("*","customers","1"); 
                
                while ($row=$query->fetch_assoc()) {
                  
                ?>
                
                <tr>
                    <td><?php echo $row['id'];  ?></td>
                    <td><?php echo $row['name'];  ?></td>
                    <td><?php echo $row['contact'];?> <br> <?php echo $row['email']; ?></td>
                    <td><?php echo $row['address'];  ?></td>
                    <td><?php  if ($row['status']==1) {
                      echo "<span class='badge bg-primary'>Active</span>";
                    } else{
                      echo "<span class='badge bg-danger'>Disabled</span>";
                    } ?></td>
                    <td>
                    <a href="javascript:void(0)" data-id="<?= $row['id'] ?>" data-name="<?= $row['name'] ?>" data-created-date="<?= $row['created_date'] ?>" data-email="<?= $row['email'] ?>" data-contact="<?= $row['contact'] ?>" data-address="<?= $row['address'] ?>"  data-name="<?= $row['name'] ?>"  data-updated_by="<?= $row['updated_by'] ?>"  data-status="<?= $row['status'] ?>"   onclick="request_view_modal(this)" title="Click to View">
                      <span class="bi bi-eye"></span>
                    </a>

                    <a href="javascript:void(0)"><span class="bi bi-pencil"></span></a>  
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
  </main><!-- End #main -->

  <?php include 'footer1.php';
  include 'footer2.php';
  ?>

<div class="modal fade" id="view_model" tabindex="-1">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                     
                    <div class="modal-body">
                      <!-- Multi Columns Form -->
             <!-- Table with stripped rows -->
  
                <h5 class="card-title">Profile Details</h5>

                 
            
                
<div class="row">
  <div class="col-lg-3 col-md-4 label ">ID</div>
  <div class="col-lg-9 col-md-8"><span id="view_id"></span></div>
</div>

<div class="row">
  <div class="col-lg-3 col-md-4 label">Name</div>
  <div class="col-lg-9 col-md-8"><span id="view_name"></span></div>
</div>

<div class="row">
  <div class="col-lg-3 col-md-4 label">Email</div>
  <div class="col-lg-9 col-md-8"><span id="view_email"></span></div>
</div>

<div class="row">
  <div class="col-lg-3 col-md-4 label">Contact</div>
  <div class="col-lg-9 col-md-8"><span id="view_contact"></span></div>
</div>

<div class="row">
  <div class="col-lg-3 col-md-4 label">Address</div>
  <div class="col-lg-9 col-md-8"><span id="view_address"></span></div>
</div>

<div class="row">
  <div class="col-lg-3 col-md-4 label">Created_by</div>
  <div class="col-lg-9 col-md-8"><span id="view_name"></span></div>
</div>

<div class="row">
  <div class="col-lg-3 col-md-4 label">Created_date</div>
  <div class="col-lg-9 col-md-8"><span id="view_created_date"></span></div>
</div>

<div class="row">
  <div class="col-lg-3 col-md-4 label">updated_date</div>
  <div class="col-lg-9 col-md-8"><span id="view_updated_date"></span></div>
</div>

<div class="row">
  <div class="col-lg-3 col-md-4 label">Status</div>
  <div class="col-lg-9 col-md-8"><span id="view_status"></span></div>
</div>
              <!-- End Table with stripped rows -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      
                    </div>
                  </div>
                </div>
              </div><!-- End Large Modal-->
              

              <script>
  function request_view_modal(element) {
    // Get the data attributes
    var id = $(element).attr("data-id");
    var name = $(element).attr("data-name");
    var email = $(element).attr("data-email");
    var contact = $(element).attr("data-contact");
    var address = $(element).attr("data-address");
    var name = $(element).attr("data-name");
    var created_date = $(element).attr("data-created_date");
    var updated_date = $(element).attr("data-updated_date");
    var status = $(element).attr("data-status");
if (status==1){
  var status='Active';
}
else{
  var status='Disabled';
}
    // Populate the values
    $("#view_id").text(id);
    $("#view_name").text(name);
    $("#view_email").text(email);
    $("#view_contact").text(contact);
    $("#view_address").text(address);
    $("#view_name").text(name);
    $("#view_created_date").text(created_date);
    $("#view_updated_date").text(updated_date);
    $("#view_status").text(status);
    // Show the modal
    $('#view_model').modal('show');
  }

  </script>





