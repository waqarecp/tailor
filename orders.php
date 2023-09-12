<style type="text/css">
    @media print {
    .width_90{width: 100% important;}
        .noprint { 
            visibility: hidden;
            display: none!important;
        }
        input{
            border: none !important;
        }
        .show_in_print{display: block!important;
        
        } .modal.fade.in {
    display: block !important;
    position: absolute !important;
    top: 0 !important;
    right: 0 !important;
    bottom: 0 !important;
    left: 0 !important;
    z-index: 1050 !important;
    overflow: hidden !important;
  }

  .modal-dialog {
    width: 90% !important;
    max-width: none !important;
    margin: 0 !important;
  }

  .modal-content {
    border: 0 !important;
    box-shadow: none !important;
  }

  .modal-body {
    
    max-height: 100% !important;
    overflow: auto !important;
  }
  .a{
    margin-left:350px;
  }
  .b{
    margin-left:50px;
  }
  .modal-header,
  .modal-footer {
    display: none !important;
  }
    }
  </style>
<?php include 'header.php';
?>

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
              <button
               data-o_id="<?= $row['o_id'] ?>" 
               data-amount_status="<?= $row['amount_status'] ?>" 
               data-detail="<?= $row['detail'] ?>" 
               data-total_amount="<?= $row['total_amount'] ?>" 
               data-name="<?= $row['name'] ?>" 
               data-email="<?= $row['email'] ?>" 
               data-contact="<?= $row['contact'] ?>" 
               data-address="<?= $row['address'] ?>" 
               data-status="<?= $row['o_status'] ?>" 
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
               data-half_bean_style="<?= $row['half_bean_style'] ?>" 
                 onclick="update_customer_modal(this)" title="Click to Update Order" type="button" class="btn btn-sm btn-info text-white">
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
    <div class="modal-dialog modal-lg width_90" >
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
              <div class="col-md-3  ">
                <label for="total_amount" class="form-label">Total Amount</label>
                <input type="text" id="total_amount" class="form-control" name="total_amount" required>
              </div>
              <div class="col-md-3 noprint">
                <label for="amount_status" class="form-label">Payment Status</label>
                <select id="amount_status" class="form-select" name="amount_status" required>
                  <option value="1">Un-paid</option>
                  <option value="2">Paid</option>
                </select>
              </div>
              <div class="col-md-3 noprint" style="margin-top:35px">
                <button type="submit" data-o-id="<?= $row['o_id'] ?>" class="btn btn-primary btn-sm" name="btn_update_order" id="btn_update_order">Update</button>
                <button type="button" onclick="window.print();" class="btn btn-success "style="margin-left:30px" >Print</button>
              </div>
         
              <div class="row mt-4">
                <hr>
                <div class="col-md-4">
                  <label for="order_customer_name" class="form-label noprint">Name : </label><b class="o_name " id="order_customer_name"></b>
                </div>
                <div class="col-md-4">
                  <label for="order_customer_contact" class="form-label noprint">Phone No : </label><b class="o_contact col-sm-offset-3" id="order_customer_contact"></b>
                </div>
                <div class="col-md-4">
                  <label for="order_customer_address" class="form-label noprint">Address : </label><b class="o_address" id="order_customer_address"></b>
                </div>
              </div>
              <div class="row">
                <h2 class="text-center" style="margin-top:35px">ناپ</h2>
                <hr>
                <div class="col-md-3 a">
                  <label for="order_length" class="form-label">لمبائی : <b  id="order_lenght"></b></label>
                </div>
                <div class="col-md-3 b">
                  <label for="order_chest" class="form-label">چھاتی : <b id="order_chest"></b></label>
                </div>
                <div class="col-md-3 a">
                  <label for="order_shoulder" class="form-label">شولڈر : <b id="order_shoulder"></b></label>
                </div>
                <div class="col-md-3 b">
                  <label for="order_arm" class="form-label">بازو : <b id="order_arm"></b></label>
                </div>
                <div class="col-md-3 a">
                  <label for="order_half_bean" class="form-label">ہاف بین : <b id="order_half_bean"></b></label>
                </div>
                <div class="col-md-3 b">
                  <label for="order_half_bean_style" class="form-label">ہاف بین سٹائل : <b id="order_half_bean_style"></b></label>
                   
                </div>
                <div class="col-md-3 a">
                  <label for="order_back" class="form-label">کمر : <b id="order_back"></b></label>
                </div>
                <div class="col-md-3 b">
                  <label for="order_pouncha" class="form-label">پانچه : <b id="order_pouncha"></b></label>
                </div>
                <div class="col-md-3 a">
                  <label for="order_surround" class="form-label">گھیرا : <b id="order_surround"></b></label>
                </div>
                <div class="col-md-3 b">
                  <label for="order_pants" class="form-label">شلوار : <b id="order_pants"></b></label>
                </div>
                <div class="col-md-3 a">
                  <label for="order_strip_lenght" class="form-label"> پٹی کی لمبائی : <b id="order_strip_length"></b></label>
                </div>
                <div class="col-md-3 b">
                  <label for="order_strip_width" class="form-label"> پٹی کی چوڑائی : <b id="order_strip_width"></b></label>
                </div>

                <div class="col-md-3 a">
                  <label for="order_bent" class="form-label">موڑہ : <b id="order_bent"></b></label>
                </div>
                <div class="col-md-3 b">
                  <label for="order_side_pocket" class="form-label">بغل جيب : <b id="order_side_pocket"></b></label>
             
                </div>
                <div class="col-md-3 a">
                  <label for="order_front_pocket" class="form-label">سامنے جیب : <b id="order_front_pocket"></b></label>
                </div>
                <div class="col-md-3 b">
                  <label for="order_daman" class="form-label">دامن : <b id="order_daman"></b></label>
                </div> 
                
              </div><div class="col-md-12  noprint">
                  <label for="order_detail" class="form-label">Details :<b id="order_detail"></b></label>
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
      $("#order_daman").text($(element).attr("data-daman"));
      $("#order_pants").text($(element).attr("data-pants"));
      $("#order_pouncha").text($(element).attr("data-pouncha"));
      $("#order_half_bean").text($(element).attr("data-half_bean"));
      $("#order_detail").text($(element).attr("data-detail"));
      $("#order_half_bean_style").find("option[value='" + order_half_bean_style + "']").prop("selected", true).text($(element).attr("data-half_bean_style"));
      // Show the modal
      $('#ordersModel').modal('show');
    }
    function printModalContent() {
  // Clone the modal content
  var modalContent = document.querySelector('.modal-content').cloneNode(true);

  // Create a new window or tab
  var printWindow = window.open('', '', 'width=600,height=600');

  // Write the modal content to the new window
  printWindow.document.write('<html><head><title>Print</title></head><body>');
  printWindow.document.write(modalContent.outerHTML);
  printWindow.document.write('</body></html>');

  // Close the document and trigger print
  printWindow.document.close();
  printWindow.print();
  printWindow.close();
}

// Trigger the printModalContent function when the "Print" button is clicked
document.getElementById('btn_print').addEventListener('click', function() {
  printModalContent();
});

  </script>