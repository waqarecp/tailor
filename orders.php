<?php include 'header.php';
?>
<style type="text/css">
  @media print {
    /* Styles for print page */

    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 8px;
    }

    .table-key {
      width: 25%;
    }

    .table-value {
      width: 25%;
    }

    .noprint {
      visibility: hidden;
      display: none !important;
    }

    input {
      border: none !important;
    }

    select {
      border: none !important;
      -webkit-appearance: none !important;
      /* Remove arrow in Chrome/Safari/Edge */
      appearance: none !important;
      margin-bottom: 13%;
    }

    /* Additional print styles specific to your layout */
    .row {
      display: flex;
      flex-wrap: wrap;
    }

    .col-md-3 {
      width: 25%;
    }

    .border {
      border: 1px solid #ddd;
      padding: 8px;
    }

    .d-flex {
      display: flex;
      justify-content: end;
    }

    .table-key,
    .table-value {
      width: 25%;
    }

    .table-key,
    .table-value {
      width: auto;
      border: none;
    }

    .d-none {
      display: block !important;
      /* Override display to show it when printing */
    }
  }
</style>

<body>
  <?php include 'navbar.php';
  ?>
  <?php include 'sidebar.php';
  ?>
  <main id="main" class="main noprint">

    <div class="pagetitle">
      <h1> Orders</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Manage Orders</li>
        </ol>
      </nav>
    </div>
    <?php
    if (isset($_SESSION['msg'])); {
      echo $_SESSION['msg'];
      unset($_SESSION['msg']);
    }
    ?><!-- End Page Title -->
    <!-- Table with stripped rows -->
    <table class="table datatable">
      <thead>

        <tr>
          <th scope="col">ID</th>
          <th scope="col">Customer Info</th>
          <th scope="col">Order Date</th>
          <th scope="col">Amount</th>
          <th scope="col">Delivery Date</th>
          <th scope="col">Status</th>
          <th scope="col">Amount</th>
          <th scope="col">Action</th>


        </tr>
      </thead>
      <tbody>

        <?php $query = $object->select("orders.*,orders.status as o_status,orders.id as o_id,measurements.*,customers.*", "orders,customers,measurements", "orders.customer_id=customers.id AND customers.id=measurements.customer_id ORDER BY orders.id DESC");

        while ($row = $query->fetch_assoc()) { ?>

          <tr>
            <td><?php echo "#" . $row['o_id'];  ?></td>
            <td><?php echo $row['name'] . "<br><small>" . $row['contact'] . "</small>";  ?></td>
            <td><?php echo date("d-m-Y h:i A", strtotime($row['created_date'])); ?></td>
            <td><?php echo number_format($row['total_amount'], 2);  ?></td>
            <td><?php echo date("d-m-Y", strtotime($row['delivery_date'])); ?></td>
            <td><?php if ($row['o_status'] == 1) {
                  echo "<span class='badge bg-warning'>Pending</span>";
                } else {
                  echo "<span class='badge bg-success'>Completed</span>";
                } ?></td>
            <td><?php if ($row['amount_status'] == 1) {
                  echo "<span class='badge bg-warning'>Un-paid</span>";
                } else {
                  echo "<span class='badge bg-success'>Paid</span>";
                } ?></td>
            <td>
              <button data-o_id="<?= $row['o_id'] ?>" data-amount_status="<?= $row['amount_status'] ?>" data-detail="<?= $row['detail'] ?>" data-total_amount="<?= $row['total_amount'] ?>" data-name="<?= $row['name'] ?>" data-email="<?= $row['email'] ?>" data-contact="<?= $row['contact'] ?>" data-address="<?= $row['address'] ?>" data-status="<?= $row['o_status'] ?>" data-lenght="<?= $row['lenght'] ?>" data-shoulder="<?= $row['shoulder'] ?>" data-arm="<?= $row['arm'] ?>" data-chest="<?= $row['chest'] ?>" data-back="<?= $row['back'] ?>" data-bent="<?= $row['bent'] ?>" data-surround="<?= $row['surround'] ?>" data-pants="<?= $row['pants'] ?>" data-pouncha="<?= $row['pouncha'] ?>" data-strip_lenght="<?= $row['strip_lenght'] ?>" data-strip_width="<?= $row['strip_width'] ?>" data-daman="<?= $row['daman'] ?>" data-front_pocket="<?= $row['front_pocket'] ?>" data-side_pocket="<?= $row['side_pocket'] ?>" data-half_bean="<?= $row['half_bean'] ?>" data-half_bean_style="<?= $row['half_bean_style'] ?>" onclick="update_customer_modal(this)" title="Click to Update Order" type="button" class="btn btn-sm btn-info text-white">
                <span class="bi bi-eye"> View</span>
              </button>
            </td>

          </tr>
        <?php } ?>
      </tbody>
    </table>
    <!-- End Table with stripped rows -->
  </main><!-- End #main -->
  <div class="modal fade " id="ordersModel" tabindex="-1">
    <div class="modal-dialog modal-lg width_90">
      <div class="modal-content ">
        <form method="POST" action="ajax.php">
          <input type="hidden" class="form-control" id="o_id" name="o_id" required>
          <div class="modal-body ">
            <div class="row">
              <div class="col-md-3 noprint">
                <label for="o_status" class="form-label">Status</label>
                <select id="o_status" class="form-select" name="o_status" required>
                  <option value="1">Pending</option>
                  <option value="2">Completed</option>
                </select>
              </div>
              <div class="col-md-3  d-none">
                <label for="total_amount" class="form-label ">Total Amount:</label>
              </div>
              <div class="col-md-3 ">
                <label for="total_amount" class="form-label noprint">Total Amount</label>
                <input type="text" id="total_amount" class="form-control amount" name="total_amount" required>
              </div>
              <div class="col-md-3 noprint">
                <label for="amount_status" class="form-label">Payment Status</label>
                <select id="amount_status" class="form-select" name="amount_status" required>
                  <option value="1">Un-paid</option>
                  <option value="2">Paid</option>
                </select>
              </div>
              <div class="col-md-3 noprint mt-4">
                <button type="submit" data-o-id="<?= $row['o_id'] ?>" class="btn btn-primary btn-sm" name="btn_update_order" id="btn_update_order">Update</button>
                <button type="button" onclick="window.print();" class="btn btn-success " style="margin-left:30px">Print</button>
              </div>
              <div class="row mt-4">
                <hr>
                <table class="table ">
                  <tr>
                    <td class="table-cell">Name :</td>
                    <td class="table-cell"><b class="o_name" id="order_customer_name"></b></td>
                    <td class="table-cell">Phone No :</td>
                    <td class="table-cell"><b class="o_contact" id="order_customer_contact"></b></td>
                  </tr>
                  <tr>
                    <td class="table-cell">Address :</td>
                    <td class="table-cell-break" colspan="3"><b class="o_address" id="order_customer_address"></b></td>
                  </tr>
                </table>
              </div>
              <div class="row">
                <h2 class="text-center">ناپ</h2>
                <hr>
                <div class="col-md-3 border d-flex justify-content-end">
                  <p class="table-value" id="order_lenght"></p>
                  <label for="order_length" class="form-label table-key"> : لمبائی</label>
                </div>
                <div class="col-md-3 border d-flex justify-content-end">
                  <p class="table-value" id="order_chest"></p>
                  <label for="order_chest" class="form-label table-key"> : چھاتی</label>
                </div>

                <div class="col-md-3 border d-flex justify-content-end">
                  <p class="table-value" id="order_shoulder"></p>
                  <label for="order_shoulder" class="form-label table-key"> : شولڈر</label>
                </div>
                <div class="col-md-3 border d-flex justify-content-end">
                  <p class="table-value" id="order_arm"></p>
                  <label for="order_arm" class="form-label table-key"> : بازو</label>
                </div>

                <div class="col-md-3 border d-flex justify-content-end">
                  <p class="table-value" id="order_half_bean"></p>
                  <label for="order_half_bean" class="form-label table-key"> : ہاف بین</label>
                </div>
                <div class="col-md-3 border d-flex justify-content-end">
                  <select class="table-value" id="order_half_bean_style" name="order_half_bean_style" required>
                    <option value="1">چورس</option>
                    <option vlaue="2">گول</option>
                  </select>
                  <label for="order_half_bean_style" class="form-label table-key"> : ہاف بین سٹائل</label>
                </div>

                <div class="col-md-3 border d-flex justify-content-end">
                  <p class="table-value" id="order_back"></p>
                  <label for="order_back" class="form-label table-key"> : کمر</label>
                </div>
                <div class="col-md-3 border d-flex justify-content-end">
                  <p class="table-value" id="order_pouncha"></p>
                  <label for="order_pouncha" class="form-label table-key"> : پانچه</label>
                </div>

                <div class="col-md-3 border d-flex justify-content-end">
                  <p class="table-value" id="order_surround"></p>
                  <label for="order_surround" class="form-label table-key"> : گھیرا</label>
                </div>
                <div class="col-md-3 border d-flex justify-content-end">
                  <p class="table-value" id="order_pants"></p>
                  <label for="order_pants" class="form-label table-key"> : شلوار </label>
                </div>

                <div class="col-md-3 border d-flex justify-content-end">
                  <p class="table-value" id="order_strip_length"></p>
                  <label for="order_strip_lenght" class="form-label table-key"> : پٹی کی لمبائی</label>
                </div>
                <div class="col-md-3 border d-flex justify-content-end">
                  <p class="table-value" id="order_strip_width"></p>
                  <label for="order_strip_width" class="form-label table-key"> : پٹی کی چوڑائی</label>
                </div>

                <div class="col-md-3 border d-flex justify-content-end">
                  <p class="table-value" id="order_bent"></p>
                  <label for="order_bent" class="form-label table-key"> : موڑہ</label>
                </div>
                <div class="col-md-3 border d-flex justify-content-end">
                  <p class="table-value" id="order_side_pocket"></p>
                  <label for="order_side_pocket" class="form-label table-key"> : بغل جيب </label>
                </div>

                <div class="col-md-3 border d-flex justify-content-end">
                  <p class="table-value" id="order_front_pocket"></p>
                  <label for="order_front_pocket" class="form-label table-key"> : سامنے جیب</label>
                </div>
                <div class="col-md-3 border d-flex justify-content-end">
                  <select class="table-value" id="order_daman" name="order_daman" required>
                    <option value="1">چورس</option>
                    <option vlaue="2">گول</option>
                  </select>
                  <label for="order_daman" class="form-label table-key"> : دامن</label>
                </div>
              </div><br><br>
              <div class="col-md-12 border  noprint">
                <label for="order_detail" class="form-label table-key d-flex justify-content-end"> : تفصیل</label>
                <p class="table-value" id="order_detail"></p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary noprint" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php include 'footer1.php';
  include 'footer2.php';
  ?>
  <script>
    function update_customer_modal(element) {
      // Get the data attributes
      var id = $(element).attr("data-o_id");
      var name = $(element).attr("data-name");
      var email = $(element).attr("data-email");
      var contact = $(element).attr("data-contact");
      var address = $(element).attr("data-address");
      var status = $(element).attr("data-status");
      var amount_status = $(element).attr("data-amount_status");
      var total_amount = $(element).attr("data-total_amount");
      // Populate the customer fields
      $("#o_id").val(id);
      $("#total_amount").val(total_amount);
      $("#order_customer_name").text(name);
      $("#order_customer_email").text(email);
      $("#order_customer_contact").text(contact);
      $("#order_customer_address").text(address);
      $("#o_status").find("option[value='" + status + "']").prop("selected", true);
      $("#amount_status").find("option[value='" + amount_status + "']").prop("selected", true);
      // Populate the measurement fields
      $("#order_half_bean_style").find("option[value='" + half_bean_style + "']").prop("selected", true);
      $("#order_daman").find("option[value='" + daman + "']").prop("selected", true);
      $("#order_lenght").text($(element).attr("data-lenght"));
      $("#order_chest").text($(element).attr("data-chest"));
      $("#order_shoulder").text($(element).attr("data-shoulder"));
      $("#order_arm").text($(element).attr("data-arm"));
      $("#order_back").text($(element).attr("data-back"));
      $("#order_bent").text($(element).attr("data-bent"));
      $("#order_surround").text($(element).attr("data-surround"));
      $("#order_strip_length").text($(element).attr("data-strip_lenght"));
      $("#order_strip_width").text($(element).attr("data-strip_width"));
      $("#order_front_pocket").text($(element).attr("data-front_pocket"));
      $("#order_side_pocket").text($(element).attr("data-side_pocket"));
      $("#order_pants").text($(element).attr("data-pants"));
      $("#order_pouncha").text($(element).attr("data-pouncha"));
      $("#order_half_bean").text($(element).attr("data-half_bean"));
      $("#order_detail").text($(element).attr("data-detail"));
      // Show the modal
      $('#ordersModel').modal('show');
    }

    // function printModalContent() {
    //   // Clone the modal content
    //   var modalContent = document.querySelector('.modal-content').cloneNode(true);

    //   // Create a new window or tab
    //   var printWindow = window.open('', '', 'width=600,height=600');

    //   // Write the modal content to the new window
    //   printWindow.document.write('<html><head><title>Print</title></head><body>');
    //   printWindow.document.write(modalContent.outerHTML);
    //   printWindow.document.write('</body></html>');

    //   // Close the document and trigger print
    //   printWindow.document.close();
    //   printWindow.print();
    //   printWindow.close();
    // }

    // // Trigger the printModalContent function when the "Print" button is clicked
    // document.getElementById('btn_print').addEventListener('click', function() {
    //   printModalContent();
    // });

    function printModalContent() {
      // Create a new window or tab
      var printWindow = window.open('', '', 'width=600,height=600');

      // Write the modal content to the new window
      printWindow.document.write('<html><head><title>Print</title></head><body>');
      printWindow.document.write('<div class="modal-content">');
      // Populate modal content here
      printWindow.document.write('</div>');
      printWindow.document.write('</body></html>');

      // Close the document after printing
      printWindow.document.close();

      // Use setTimeout to allow time for the print window to open
      setTimeout(function() {
        printWindow.print();
        printWindow.close();
      }, 500); // Adjust the delay if needed
    }

    // Trigger the printModalContent function when the "Print" button is clicked
    document.getElementById('btn_print').addEventListener('click', function() {
      update_customer_modal(this);
      printModalContent();
    });
  </script>