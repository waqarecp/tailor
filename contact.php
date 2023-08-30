<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<?php include('libraries/navbar.php') ?>
<?php include('libraries/sidebar.php');
$contact = $obj->read_all('*', 'contact', '');
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Contact Listing</h1>
  </div>
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">ID#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Subject</th>
                  <th scope="col">Message</th>
                  <th scope="col">Created Date</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $count = 1;
                foreach ($contact as $row) { ?>
                  <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['subject'] ?></td>
                    <td><?= $row['message'] ?></td>
                    <td><?= $row['created_date'] ?></td>
                    <td><?php if ($row['status'] == 1) { ?>
                        <span data-id="<?= $row['id'] ?>" data-status="<?= $row['status'] ?>" onclick='change_status(this)' class="badge badge-warning" style="cursor:pointer">Pending</span>
                      <?php } else { ?>
                        <span data-id="<?= $row['id'] ?>" data-status="<?= $row['status'] ?>" onclick='change_status(this)' class="badge badge-success" style="cursor:pointer">Resolved</span>
                      <?php }  ?>
                    </td>
                    <td>
                      <!-- <a href="javascript:void(0)" title="Click to edit">
                            <span class="bi bi-pencil"></span>
                          <a>
                          <a href="javascript:void(0)" onclick="alert('Are You Sure?')"><span class="bi bi-trash"></span><a> -->
                      <a href="javascript:void(0)" data-id="<?= $row['id'] ?>" data-name="<?= $row['name'] ?>" data-created-date="<?= $row['created_date'] ?>" data-email="<?= $row['email'] ?>" data-subject="<?= $row['subject'] ?>" data-message="<?= $row['message'] ?>" onclick="request_view_modal(this)" title="Click to View"><span class="bi bi-eye"></span>
                        <a>
                    </td>
                  </tr>
                <?php  }
                ?>
              </tbody>
            </table>
            <!-- End Table with stripped rows -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->

<div class="modal fade" id="view_modal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">View User<br><b class="badge bg-warning">User ID:<span id="view_id"></span></b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body border">

        <div class="row">
          <div class="col-12">
            <span>Created Date : <span id="view_created_date"></span></span>
          </div>
          <div class="col-6">
            <h4>Name : <span id="view_name"></span></h4>
          </div>
          <div class="col-6">
            <h4>Email : <span id="view_email"></span></h4>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <h4>Subject : <span id="view_subject"></span></h4>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h4>Message : <span id="view_message"></span></h4>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include "libraries/footer.php";
include "libraries/script.php";

?>

<script>
  function request_view_modal(element) {
    // Get the data attributes
    var id = $(element).attr("data-id");
    var name = $(element).attr("data-name");
    var email = $(element).attr("data-email");
    var subject = $(element).attr("data-subject");
    var created_date = $(element).attr("data-created-date");
    var message = $(element).attr("data-message");

    // Populate the values
    $("#view_id").text(id);
    $("#view_name").text(name);
    $("#view_email").text(email);
    $("#view_subject").text(subject);
    $("#view_created_date").text(created_date);
    $("#view_message").text(message);
    // Show the modal
    $('#view_modal').modal('show');
  }

  function change_status(element) {
    var id = $(element).attr('data-id');
    var status = $(element).attr('data-status');
    $.ajax({
      url: '../_admin/process/ajax/contact.php',
      method: 'post',
      dataType: 'json',
      data: {
        status: status,
        id: id
      },
      success: function(data) {
        alert(data.message);
        if (data.status == 1) {
          location.reload();
        }
      },
      error: function(data) {
        alert("Error code : " + data.status + " , Error message : " + data.statusText);
      }
    });
  }
</script>