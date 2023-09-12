<?php include 'header.php';?>
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
          <li class="breadcrumb-item active">Customers</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <?php
    if (isset($_SESSION['msg'])); {
      echo $_SESSION['msg'];
      unset($_SESSION['msg']);
    }
    ?>
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

        <?php $query = $object->select("measurements.*,customers.*,measurements.id as measurement_id", "customers,measurements", "measurements.customer_id=customers.id ORDER BY customers.id DESC");

        while ($row = $query->fetch_assoc()) {

        ?>

          <tr>
            <td><?php echo $row['id'];  ?></td>
            <td><?php echo $row['name'];  ?></td>
            <td><?php echo $row['contact']; ?> <br><small> <?php echo $row['email']; ?></td>
            <td><?php echo $row['address'];  ?></td>
            <td><?php if ($row['status'] == 1) {
                  echo "<span class='badge bg-primary'>Active</span>";
                } else {
                  echo "<span class='badge bg-danger'>Disabled</span>";
                } ?></td>
            <td>
              <button
                data-id="<?= $row['id'] ?>"
                data-name="<?= $row['name'] ?>"
                data-email="<?= $row['email'] ?>" 
                data-contact="<?= $row['contact'] ?>" 
                data-address="<?= $row['address'] ?>" 
                data-status="<?= $row['status'] ?>" 
                data-lenght="<?= $row['lenght'] ?>" 
                data-shoulder="<?= $row['shoulder'] ?>" 
                data-arm="<?= $row['arm'] ?>" 
                data-chest="<?= $row['chest'] ?>" 
                data-back="<?= $row['back'] ?>" 
                data-bent="<?= $row['bent'] ?>" 
                data-surround="<?= $row['surround'] ?>" 
                data-pants="<?= $row['pants'] ?>" 
                data-pouncha="<?= $row['pouncha'] ?>" 
                data-strip_lenght="<?= $row['strip_lenght'] ?>" 
                data-strip_width="<?= $row['strip_width'] ?>" 
                data-daman="<?= $row['daman'] ?>" 
                data-front_pocket="<?= $row['front_pocket'] ?>" 
                data-side_pocket="<?= $row['side_pocket'] ?>" 
                data-half_bean="<?= $row['half_bean'] ?>" 
                data-half_style="<?= $row['half_bean_style'] ?>" 
                data-detail="<?= $row['detail'] ?>" 
                 onclick="edit_customer_modal(this)" title="Click to Edit Customers" type="button" class="btn btn-sm btn-info text-white">
                <span class="bi bi-pencil"></span>
              </button>
              <?php if ($row['status']==1 ) { ?>
                    <button data-customer-id="<?= $row['id'] ?>" data-measurement-id="<?= $row['measurement_id'] ?>" data-customer-name="<?= $row['name'] ?>" data-customer-contact="<?= $row['contact'] ?>" class="btn btn-sm btn-primary" onclick="new_order_modal(this)"> New Order</button>

              <?php } ?>
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

  <!-- Edit customer model start -->
  <div class="modal fade" id="editModel" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <form class="row g-3" method="POST" action="ajax.php">
            <input type="hidden" class="form-control" id="edit_customer_id" name="edit_customer_id" required>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-4">
                  <label for="edit_customer_name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="edit_customer_name" name="edit_customer_name" required>
                </div>
                <div class="col-md-4">
                  <label for="edit_customer_email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="edit_customer_email" name="edit_customer_email">
                </div>
                <div class="col-md-4">
                  <label for="edit_customer_contact" class="form-label">Phone No</label>
                  <input type="number" class="form-control" id="edit_customer_contact" name="edit_customer_contact" required>
                </div>
                <div class="col-md-8">
                  <label for="edit_customer_address" class="form-label">Address</label>
                  <input type="text" class="form-control" id="edit_customer_address" name="edit_customer_address" required>
                </div>
                <div class="col-md-3">
                    <label for="edit_customer_status" class="form-label">Status</label>
                    <select id="edit_customer_status" class="form-select" name="edit_customer_status" required>
                      <option value="" selected>Select an Option</option>
                      <option value="1">Active</option>
                      <option value="2">Disabled</option>
                    </select>
                  </div>
              </div>
              <div class="row">
                <h2 class="text-center">ناپ</h2>
                <hr>
                <div class="col-md-2">
                  <label for="edit_length" class="form-label">لمبائی</label>
                  <input type="number" class="form-control" id="edit_lenght" name="edit_lenght" required>
                </div>
                <div class="col-md-2">
                  <label for="edit_chest" class="form-label">چھاتی</label>
                  <input type="number" class="form-control" id="edit_chest" name="edit_chest" required>
                </div>
                <div class="col-md-2">
                  <label for="edit_shoulder" class="form-label">شولڈر</label>
                  <input type="number" class="form-control" id="edit_shoulder" name="edit_shoulder" required>
                </div>
                <div class="col-md-2">
                  <label for="edit_arm" class="form-label">بازو</label>
                  <input type="number" class="form-control" id="edit_arm" name="edit_arm" required>
                </div>
                <div class="col-md-2">
                  <label for="edit_half_bean" class="form-label">ہاف بین</label>
                  <input type="number" class="form-control" id="edit_half_bean" name="edit_half_bean" required>
                </div>
                <div class="col-md-2">
                  <label for="edit_half_style" class="form-label">ہاف بین سٹائل</label>
                  <select id="edit_half_style" class="form-select" name="edit_half_style" required>
                    <option selected>منتخب کریں</option>
                    <option value="1">چورس</option>
                    <option value="2">گول</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <label for="edit_back" class="form-label">کمر</label>
                  <input type="number" class="form-control" id="edit_back" name="edit_back" required>
                </div>
                <div class="col-md-2">
                  <label for="edit_pouncha" class="form-label">پانچه</label>
                  <input type="number" class="form-control" id="edit_pouncha" name="edit_pouncha" required>
                </div>
                <div class="col-md-2">
                  <label for="edit_surround" class="form-label">گھیرا</label>
                  <input type="number" class="form-control" id="edit_surround" name="edit_surround" required>
                </div>
                <div class="col-md-2">
                  <label for="edit_pants" class="form-label">شلوار</label>
                  <input type="number" class="form-control" id="edit_pants" name="edit_pants" required>
                </div>
                <div class="col-md-2">
                  <label for="edit_strip_lenght" class="form-label"> پٹی کی لمبائی</label>
                  <input type="number" class="form-control" id="edit_strip_length" name="edit_strip_lenght" required>
                </div>
                <div class="col-md-2">
                  <label for="edit_strip_width" class="form-label"> پٹی کی چوڑائی</label>
                  <input type="number" class="form-control" id="edit_strip_width" name="edit_strip_width" required>
                </div>

                <div class="col-md-2">
                  <label for="edit_bent" class="form-label">موڑہ</label>
                  <input type="number" class="form-control" id="edit_bent" name="edit_bent" required>
                </div>
                <div class="col-md-2">
                  <label for="edit_side_pocket" class="form-label">بغل جيب</label>
                  <select id="edit_side_pocket" class="form-select" name="edit_side_pocket" required>
                    <option selected>منتخب کریں</option>
                    <option value="0">None</option>
                    <option value="1">1</option>
                    <option vlaue="2">2</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <label for="edit_front_pocket" class="form-label">:سامنے جیب</label>
                  <select id="edit_front_pocket" name="edit_front_pocket" class="form-select" required>
                    <option selected>منتخب کریں</option>
                    <option value="0">None</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <label for="edit_daman" class="form-label">:دامن</label>
                  <select id="edit_daman" name="edit_daman" class="form-select" required>
                    <option selected>منتخب کریں</option>
                    <option value="1">چورس</option>
                    <option vlaue="2">گول</option>
                  </select>
                </div>
                </div>
                
                <div class="col-md-12">
                  <label for="detail" class="form-label">Details</label>
                  <input type="text" class="form-control" id="edit_detail" name="edit_detail" >
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" name="btn_edit_customer" id="btn_edit_customer" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End edit customer Modal-->

  <!-- Order Modal -->
  <div class="modal fade" id="orderModel" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Make New Order</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="row g-3" method="POST" action="ajax.php">
          <input type="hidden" class="form-control" id="order_customer_id" name="order_customer_id" required>
          <input type="hidden" class="form-control" id="order_measurement_id" name="order_measurement_id" required>
          <div class="modal-body">
              <div class="row">
                <div class="col-md-12 mt-2">
                  <h5>Customer Name: <b id="order_customer_name">Waqar Ahmad</b></h5>
                  <h5>Customer Phone: <b id="order_customer_contact">03015698197</b></h4>
                  <hr>
                </div>
                <div class="col-md-3">
                  <label for="order_quantity" class="form-label">Quantity</label>
                  <input type="number" class="form-control" id="order_quantity" name="order_quantity">
                </div>
                <div class="col-md-3">
                  <label for="order_total_amount" class="form-label">Total Amount</label>
                  <input type="number" class="form-control" id="order_total_amount" name="order_total_amount">
                </div>
                <div class="col-md-3">
                  <label for="order_delivery_date" class="form-label">Delivery Date</label>
                  <input type="date" class="form-control" id="order_delivery_date" name="order_delivery_date" >
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="btn_new_order" id="btn_new_order">Create New Order</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End Order Modal-->

  <script>
    function edit_customer_modal(element) {
      // Get the data attributes
      var id = $(element).attr("data-id");
      var name = $(element).attr("data-name");
      var email = $(element).attr("data-email");
      var contact = $(element).attr("data-contact");
      var address = $(element).attr("data-address");
      var name = $(element).attr("data-name");
      var status = $(element).attr("data-status");
      // Populate the customer fields
      $("#edit_customer_id").val(id);
      $("#edit_customer_name").val(name);
      $("#edit_customer_email").val(email);
      $("#edit_customer_contact").val(contact);
      $("#edit_customer_address").val(address);
      $("#edit_customer_status").find("option[value='"+status+"']").prop("selected", true);
      // Populate the measurement fields
      $("#edit_lenght").val($(element).attr("data-lenght"));
      $("#edit_chest").val($(element).attr("data-chest"));
      $("#edit_shoulder").val($(element).attr("data-shoulder"));
      $("#edit_arm").val($(element).attr("data-arm"));
      $("#edit_back").val($(element).attr("data-back"));
      $("#edit_bent").val($(element).attr("data-bent"));
      $("#edit_surround").val($(element).attr("data-surround"));
      $("#edit_strip_length").val($(element).attr("data-strip_lenght"));
      $("#edit_strip_width").val($(element).attr("data-strip_width"));
      $("#edit_front_pocket").val($(element).attr("data-front_pocket"));
      $("#edit_side_pocket").val($(element).attr("data-side_pocket"));
      $("#edit_daman").val($(element).attr("data-daman"));
      $("#edit_pants").val($(element).attr("data-pants"));
      $("#edit_pouncha").val($(element).attr("data-pouncha"));
      $("#edit_half_bean").val($(element).attr("data-half_bean"));
      $("#edit_half_style").val($(element).attr("data-half_style"));
      $("#edit_detail").val($(element).attr("data-detail"));
      // Show the modal
      $('#editModel').modal('show');
    }
    function new_order_modal(element) {
      // Get the data attributes
      var order_customer_id = $(element).attr("data-customer-id");
      var order_measurement_id = $(element).attr("data-measurement-id");
      var order_customer_name = $(element).attr("data-customer-name");
      var order_customer_contact = $(element).attr("data-customer-contact");
      $("#order_customer_id").val(order_customer_id);
      $("#order_measurement_id").val(order_measurement_id);
      $("#order_customer_name").text(order_customer_name);
      $("#order_customer_contact").text(order_customer_contact);
      // Show the modal
      $('#orderModel').modal('show');
    }
  </script>
  <!-- End of Java Script -->