<?php include'header.php';
?>
<body>
<?php include'navbar.php';
?>
<?php include'sidebar.php';
?>


<main id="main" class="main">

<div class="pagetitle">
  <h1>  Orders</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active">Orders</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<!-- Table with stripped rows -->
<table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Customer_ID</th>
                    <th scope="col">Measurement_ID</th>
                    <th scope="col">Created_by</th>
                    <th scope="col">Created_date</th> 
                    <th scope="col">Updated_date</th>
                    <th scope="col">Updated_by</th>
                    <th scope="col">Status</th>
                  
                  </tr>
                </thead>
                <tbody>
                 
                <?php   $query = $object->select("*","orders","1"); 
                
                while ($row=$query->fetch_assoc()) {
                  
                ?>
                
                <tr>
                    <td><?php echo $row['id'];  ?></td>
                    <td><?php echo $row['customer_id'];  ?></td>
                    <td><?php echo $row['measurement_id'];?>
                    <td><?php echo $row['created_by'];  ?></td>
                    <td><?php echo $row['created_date'];  ?></td>
                    <td><?php echo $row['updated_date'];  ?></td>
                    <td><?php echo $row['updated_by'];  ?></td>
                    <td><?php  if ($row['status']==1) {
                      echo "<span class='badge bg-primary'>Active</span>";
                    } else{
                      echo "<span class='badge bg-danger'>Disabled</span>";
                    } ?></td>
                    <td>
                    <a href="javascript:void(0)" data-id="<?= $row['id'] ?>" data-name="<?= $row['customer_id'] ?>" data-created-date="<?= $row['measurement_id'] ?>" data-email="<?= $row['created_by'] ?>" data-contact="<?= $row['created_date'] ?>" data-address="<?= $row['updated_date'] ?>"  data-updated_by="<?= $row['updated_by'] ?>"  data-status="<?= $row['status'] ?>"   onclick="request_view_modal(this)" title="Click to View">

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

