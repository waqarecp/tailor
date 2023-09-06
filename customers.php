<?php include 'header.php';
?>

<body>

 <?php include 'navbar.php';
 include 'sidebar.php';
 ?>
<!-- page title  -->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Customers</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active" >Customers</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

   <!-- Table with stripped rows -->
   <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact</th>
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
                    <td><?php echo $row['contact'];?> <br><small> <?php echo $row['email']; ?></td>
                    <td><?php echo $row['address'];  ?></td>
                    <td><?php  if ($row['status']==1) {
                      echo "<span class='badge bg-primary'>Active</span>";
                    } else{
                      echo "<span class='badge bg-danger'>Disabled</span>";
                    } ?></td>
                    <td>
                      <button data-id="<?= $row['id'] ?>" data-name="<?= $row['name'] ?>" data-email="<?= $row['email'] ?>" data-contact="<?= $row['contact'] ?>" data-address="<?= $row['address'] ?>"  data-name="<?= $row['name'] ?>" data-status="<?= $row['status'] ?>" onclick="edit_customers(this)" title="Click to Edit Customers" type="button" class="btn btn-sm btn-info text-white">
                        <span class="bi bi-pencil"></span>
                      </button>
                      <button class="btn btn-sm btn-primary"  data-bs-toggle="modal" data-bs-target="#ordermodel"> New Order</button>
                   
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

 <!-- Edit Customers Modal -->

              <div class="modal fade" id="editModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                    <form class="row g-3">
                      <input type="hidden" id="customer_id">
                <div class="col-md-4">
                  <label for="edit_name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="edit_name">
                </div>
                <div class="col-md-4">
                  <label for="edit_email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="edit_email">
                </div>
                <div class="col-md-4">
                  <label for="edit_contact" class="form-label">Phone No</label>
                  <input type="number" class="form-control" id="edit_contact">
                </div>
                <div class="col-md-4">
                  <label for="edit_address" class="form-label">Address</label>
                  <input type="text" class="form-control" id="edit_address" placeholder="1234 Main St">
                </div>
                <div class="col-md-4">
                  <label for="edit_status" class="form-label" >Status</label>
                  <select id="edit_status" class="form-select">
                    <option  selected>-- Select an option --</option>
                    <option value="1">Active</option>
                    <option value="2">Disabled</option>
                  </select>
                </div>  

                <hr>

                <h2 class="text-center">ناپ</h2>
                <hr>
                <div class="row">
                <div class="col-md-3">
                  <label for="inputCity" class="form-label">لمبائی</label>
                  <input type="number" class="form-control" id="length">
                </div>

                <div class="col-md-3">
                  <label for="inputCity" class="form-label">چھاتی</label>
                  <input type="number" class="form-control" id="chest">
                </div>
                 
                <div class="col-md-3">
                  <label for="inputState" class="form-label">شولڈر</label>
                  <input type="number" class="form-control" id="shoulder">
                </div>
                <div class="col-md-3">
                  <label for="inputZip" class="form-label">بازو</label>
                  <input type="number" class="form-control" id="arm">
                </div>
                

                <div class="col-md-3">
                  <label for="inputCity" class="form-label">ہاف بین</label>
                  <input type="number" class="form-control" id="haff_bean">
                </div>
                <div class="col-md-3">
                  <label for="inputZip" class="form-label">ہاف بین سٹائل</label>
                  <select id="inputState" class="form-select"  >
                    <option  selected>منتخب کریں</option>
                    <option value="1">چورس</option>
                    <option vlaue="2">گول</option>
                  </select>
                </div> 

                <div class="col-md-3">
                  <label for="inputZip" class="form-label">کمر</label>
                  <input type="number" class="form-control" id="back">
                </div>
  
                <div class="col-md-3">
                  <label for="inputZip" class="form-label">پانچه</label>
                  <input type="number" class="form-control" id="pouncha">
                </div>

                <div class="col-md-3">
                  <label for="inputState" class="form-label">گھیرا</label>
                  <input type="number" class="form-control" id="surround">
                </div>
                
                <div class="col-md-3">
                  <label for="inputState" class="form-label">شلوار</label>
                  <input type="number" class="form-control" id="pants">
                </div>
                <div class="col-md-3">
                  <label for="inputState" class="form-label"> پٹی کی لمبائی</label>
                  <input type="number" class="form-control" id="strip_length">
                </div>

                
                <div class="col-md-3">
                  <label for="inputZip" class="form-label"> پٹی کی چوڑائی</label>
                  <input type="number" class="form-control" id="strip_width">
                </div>

                <div class="col-md-3">
                  <label for="inputZip" class="form-label">موڑہ</label>
                  <input type="number" class="form-control" id="bent">
                </div>                 
                <div class="col-md-3">
                  <label for="inputCity" class="form-label">بغل جيب</label>
                  <select id="inputState" class="form-select">
                    <option  selected>منتخب کریں</option>
                    <option value="0">No</option>
                    <option value="1">1</option>
                    <option vlaue="2">2</option>
                  </select>
                </div>  
                <div class="col-md-3">
                  <label for="inputCity" class="form-label">سامنے جیب</label>
                  <select id="inputState" class="form-select">
                    <option  selected>منتخب کریں</option>
                    <option value="0">No</option>
                    <option vlaue="1">1</option>
                    <option vlaue="2">2</option>
                  </select>
                </div> 
                <div class="col-md-3">
                  <label for="inputZip" class="form-label" >دامن</label>
                  <select id="inputState" class="form-select">
                    <option  selected>منتخب کریں</option>
                    <option value="1">چورس</option>
                    <option vlaue="2">گول</option>
                  </select>
                </div>   
                </div>

        
                   
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-primary">Edit Order</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Edit custoemrs Modal-->
            </div>
              </form><!-- End Form -->

<!-- Order Modal -->


              <div class="modal fade" id="ordermodel" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Make New Order</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                <div class="col-md-3">
                  <label for="quantity" class="form-label">Quantity</label>
                  <input type="number" class="form-control" id="quantity">
                </div>
                <div class="col-md-3">
                  <label for="total_amount" class="form-label">Total Amount</label>
                  <input type="number" class="form-control" id="total_amount">
                </div>
                <div class="col-md-3">
                  <label for="delivery_date" class="form-label">Delivery Date</label>
                  <input type="date" class="form-control" id="delivery_date">
                </div>
                  </div>
                  </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Update</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Order Modal-->

<!-- javascript -->

  <script>
  function edit_customers(element) {
    // Get the data attributes
    var id = $(element).attr("data-id");
    var name = $(element).attr("data-name");
    var email = $(element).attr("data-email");
    var contact = $(element).attr("data-contact");
    var address = $(element).attr("data-address");
    var status = $(element).attr("data-status");

    // Populate the values
    $("#customer_id").val(id);
    $("#edit_name").val(name);
    $("#edit_email").val(email);
    $("#edit_contact").val(contact);
    $("#edit_address").val(address);
    $("#edit_status option[value='"+status+"']").prop("selected", true);
    // Show the modal
    $('#editModal').modal('show');
  }

  </script>
  <!-- End of Java Script -->