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
      <li class="breadcrumb-item active">Manage Orders</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
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
                    <th scope="col">Action</th>

                  
                  </tr>
                </thead>
                <tbody>
                 
                <?php   $query = $object->select("orders.*,customers.name,customers.contact","orders,customers,measurements","orders.customer_id=customers.id AND customers.id=measurements.customer_id"); 
                
                while ($row=$query->fetch_assoc()) {?>
                
                <tr>
                    <td><?php echo "#".$row['id'];  ?></td>
                    <td><?php echo $row['name']."<br><small>".$row['contact']."</small>";  ?></td>
                    <td><?php echo date("d-m-Y h:i A", strtotime($row['created_date']));?></td>
                    <td><?php echo number_format($row['amount'], 2);  ?></td>
                    <td><?php echo date("d-m-Y", strtotime($row['delivery_date']));?></td>
                    <td><?php  if ($row['status']==1) {
                      echo "<span class='badge bg-warning'>Pending</span>";
                    } else{
                      echo "<span class='badge bg-success'>Completed</span>";
                    } ?></td>
                    <td>
                    <a href="javascript:void(0)" data-id="<?= $row['id'] ?>" data-customer_id="<?= $row['customer_id'] ?>" data-measurment_id="<?= $row['measurement_id'] ?>"       data-status="<?= $row['status'] ?>"   onclick="request_view_modal(this)" title="Click to View">
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

