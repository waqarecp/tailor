<?php include 'header.php'; ?>

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
          <li class="breadcrumb-item active">Customer</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <?php
    if (isset($_SESSION['msg'])) {
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

        <?php $query = $object->select("customers.*,measurements.*", "customers,measurements", "measurements.customer_id=customers.id ORDER BY customers.id DESC");

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
              <a href="javascript:void(0)" data-id="<?= $row['id'] ?>" data-name="<?= $row['name'] ?>" data-email="<?= $row['email'] ?>" data-contact="<?= $row['contact'] ?>" data-address="<?= $row['address'] ?>" data-name="<?= $row['name'] ?>" data-status="<?= $row['status'] ?>" onclick="edit_customer_modal(this)" title="Click to View">
                <button type="button" class="btn btn-sm btn-info text-white" title="More Information">
                  <span class="bi bi-pencil"></span>
                </button> </a>

              <button type="button" onclick="<?php echo $row['id'];  ?>" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#orderModal">
                New Order
              </button>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <!-- End Table with stripped rows -->
  </main>

  <div class="modal fade" id="view_model" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-body">
          <hr>

          <form method="POST" action="ajax.php">
            <div class="row ">
              <div class="col-md-4">
                <label for="customer_name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="col-md-4">
                <label for="customer_email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
              <div class="col-md-4">
                <label for="customer_contact" class="form-label">Phone No</label>
                <input type="number" class="form-control" id="contact" name="contact" required>
              </div>
              <div class="col-md-8">
                <label for="customer_address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
              </div>
            </div>
            <hr>
            <h2 class="text-center">ناپ</h2>
            <hr>
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-2">
                <label for="length" class="form-label">لمبائی</label>
                <input type="number" class="form-control" id="length" name="length" value=>
              </div>

              <div class="col-md-2">
                <label for="chest" class="form-label">چھاتی</label>
                <input type="number" class="form-control" id="chest" name="chest">
              </div>

              <div class="col-md-2">
                <label for="shoulder" class="form-label">شولڈر</label>
                <input type="number" class="form-control" id="shoulder" name="shoulder">
              </div>
              <div class="col-md-2">
                <label for="arm" class="form-label">بازو</label>
                <input type="number" class="form-control" id="arm" name="arm">
              </div>


              <div class="col-md-2">
                <label for="haff_bean" class="form-label">ہاف بین</label>
                <input type="number" class="form-control" id="haff_bean" name="haff_bean">
              </div>
            </div>
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-2">
                <label for="half_bean_style" class="form-label">ہاف بین سٹائل</label>
                <select id="half_bean_style" class="form-select" name="half_bean_style">
                  <option selected>منتخب کریں</option>
                  <option value="1">چورس</option>
                  <option vlaue="2">گول</option>
                </select>
              </div>

              <div class="col-md-2">
                <label for="back" class="form-label">کمر</label>
                <input type="number" class="form-control" id="back" name="back">
              </div>

              <div class="col-md-2">
                <label for="pouncha" class="form-label">پانچه</label>
                <input type="number" class="form-control" id="pouncha" name="pouncha">
              </div>

              <div class="col-md-2">
                <label for="surround" class="form-label">گھیرا</label>
                <input type="number" class="form-control" id="surround" name="surround">
              </div>

              <div class="col-md-2">
                <label for="pants" class="form-label">شلوار</label>
                <input type="number" class="form-control" id="pants" name="pants">
              </div>
            </div>
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-2">
                <label for="strip_length" class="form-label"> پٹی کی لمبائی</label>
                <input type="number" class="form-control" id="strip_length" name="strip_length">
              </div>


              <div class="col-md-2">
                <label for="strip_width" class="form-label"> پٹی کی چوڑائی</label>
                <input type="number" class="form-control" id="strip_width" name="strip_width">
              </div>

              <div class="col-md-2">
                <label for="bent" class="form-label">موڑہ</label>
                <input type="number" class="form-control" id="bent" name="bent">
              </div>
              <div class="col-md-2">
                <label for="side_pocket" class="form-label">بغل جيب</label>
                <select id="side_pocket" class="form-select" name="side_pocket">
                  <option selected>منتخب کریں</option>
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option vlaue="2">2</option>
                </select>
              </div>
              <div class="col-md-2">
                <label for="front_pocket" class="form-label">سامنے جیب</label>
                <select id="front_pocket" class="form-select" name="front_pocket">
                  <option selected>منتخب کریں</option>
                  <option value="0">0</option>
                  <option vlaue="1">1</option>
                </select>
              </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2">
              <label for="daman" class="form-label">دامن</label>
              <select id="daman" class="form-select" name="daman">
                <option selected>منتخب کریں</option>
                <option value="1">چورس</option>
                <option vlaue="2">گول</option>
              </select>
            </div>
            <!-- End Table with stripped rows -->
        </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div><!-- End Large Modal-->
  </div>
  </form><!-- End Multi Columns Form -->

  </div>
  </div>
  </div>
  </div><!-- End Large Modal-->

  <!-- Edit customer model start -->
  <div class="modal fade" id="editModel" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body">
          <form class="row g-3" method="POST" action="ajax.php">
            <input type="hidden" class="form-control" id="edit_customer_id" name="edit_customer_id" required>
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
                  <option selected>Select an Option</option>
                  <option value="1">Active</option>
                  <option vlaue="2">Disable</option>
                </select>
              </div>
            <hr>
            <h2 class="text-center">ناپ</h2>
            <hr>
            <div class="row">
              <div class="col-md-3">
                <label for="edit_length" class="form-label">لمبائی</label>
                <input type="number" class="form-control" id="edit_length" name="edit_length" required>
              </div>
              <div class="col-md-3">
                <label for="edit_chest" class="form-label">چھاتی</label>
                <input type="number" class="form-control" id="edit_chest" name="edit_chest" required>
              </div>
              <div class="col-md-3">
                <label for="edit_shoulder" class="form-label">شولڈر</label>
                <input type="number" class="form-control" id="edit_shoulder" name="edit_shoulder" required>
              </div>
              <div class="col-md-3">
                <label for="edit_arm" class="form-label">بازو</label>
                <input type="number" class="form-control" id="edit_arm" name="edit_arm" required>
              </div>
              <div class="col-md-3">
                <label for="edit_half_bean" class="form-label">ہاف بین</label>
                <input type="number" class="form-control" id="edit_haff_bean" name="edit_half_bean" required>
              </div>
              <div class="col-md-3">
                <label for="edit_half_bean_style" class="form-label">ہاف بین سٹائل</label>
                <select id="edit_half_bean_style" class="form-select" name="edit_half_bean_style" required>
                  <option selected>منتخب کریں</option>
                  <option value="1">چورس</option>
                  <option vlaue="2">گول</option>
                </select>
              </div>

              <div class="col-md-3">
                <label for="edit_back" class="form-label">کمر</label>
                <input type="number" class="form-control" id="edit_back" name="edit_back" required>
              </div>
              <div class="col-md-3">
                <label for="edit_pouncha" class="form-label">پانچه</label>
                <input type="number" class="form-control" id="edit_pouncha" name="edit_pouncha" required>
              </div>
              <div class="col-md-3">
                <label for="edit_surround" class="form-label">گھیرا</label>
                <input type="number" class="form-control" id="edit_surround" name="edit_surround" required>
              </div>
              <div class="col-md-3">
                <label for="edit_pants" class="form-label">شلوار</label>
                <input type="number" class="form-control" id="edit_pants" name="edit_pants" required>
              </div>
              <div class="col-md-3">
                <label for="edit_strip_lenght" class="form-label"> پٹی کی لمبائی</label>
                <input type="number" class="form-control" id="edit_strip_length" name="edit_strip_lenght" required>
              </div>
              <div class="col-md-3">
                <label for="edit_strip_width" class="form-label"> پٹی کی چوڑائی</label>
                <input type="number" class="form-control" id="edit_strip_width" name="edit_strip_width" required>
              </div>

              <div class="col-md-3">
                <label for="edit_bent" class="form-label">موڑہ</label>
                <input type="number" class="form-control" id="edit_bent" name="edit_bent" required>
              </div>
              <div class="col-md-3">
                <label for="edit_side_pocket" class="form-label">بغل جيب</label>
                <select id="edit_side_pocket" class="form-select" name="edit_side_pocket" required>
                  <option selected>منتخب کریں</option>
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option vlaue="2">2</option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="edit_front_pocket" class="form-label">سامنے جیب</label>
                <select id="edit_front_pocket" name="edit_front_pocket" class="form-select" required>
                  <option selected>منتخب کریں</option>
                  <option value="0">0</option>
                  <option vlaue="1">1</option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="edit_daman" class="form-label">دامن</label>
                <select id="edit_daman" name="edit_daman" class="form-select" required>
                  <option selected>منتخب کریں</option>
                  <option value="1">چورس</option>
                  <option vlaue="2">گول</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" name="btn_edit_customer" id="btn_edit_customer" class="btn btn-primary">Save Order</button>
            </div>
        </div>
      </div>
    </div>
    <!-- End edit customer Modal-->
  </div>
  </form>




  <div class="modal fade" id="orderModal" tabindex="-1">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">New Order</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row g-3" method="POST" action="ajax.php">
            <div class="col-md-6">
              <label for="customer_name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="col-md-6">
              <label for="quantity" class="form-label">Quantity</label>
              <input type="number" class="form-control" id="quantity" name="quantity">
            </div>
            <div class="col-md-6">
              <label for="amount" class="form-label">Amount</label>
              <input type="number" class="form-control" id="amount" name="amount" required>
            </div>
            <div class="col-md-6">
              <label for="total" class="form-label">Total</label>
              <input type="number" class="form-control" id="total" name="total" required>
            </div>
            <div class="col-md-12">
              <label for="date" class="form-label">Delivery Date</label>
              <input type="date" class="form-control" id="date" name="date" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save Order</button>
        </div>
      </div>
    </div>
  </div><!-- End Small Modal-->
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
      // Populate the values
      $("#edit_customer_id").val(id);
      $("#edit_customer_name").val(name);
      $("#edit_customer_email").val(email);
      $("#edit_customer_contact").val(contact);
      $("#edit_customer_address").val(address);
      $("#edit_customer_status").find("option[value='"+status+"']").prop("selected", true);
      // Show the modal
      $('#editModel').modal('show');
    }
  </script>
  <?php include 'footer1.php';
  include 'footer2.php';
  ?>