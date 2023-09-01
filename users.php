<?php include 'header.php';
?>
<body>
<?php include 'navbar.php';
?>

<?php include 'sidebar.php';
?>
  <main id="main" class="main">

<div class="pagetitle">
  <h1>Users</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active" >Users</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<!-- Table with stripped rows -->
<table class="table datatable">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Role</th>
                <th scope="col">Name</th>
                <th scope="col">Password</th>
                <th scope="col">Status</th>

              
              </tr>
            </thead>
            <tbody>
             
            <?php   $query = $object->select("admin.*,roles.title","admin,roles","admin.role_id=roles.id"); 
            
            while ($row=$query->fetch_assoc()) {
              
            ?>
            
            <tr>
                <td><?php echo $row['id'];  ?></td>
                <td><?php echo $row['title'];  ?></td>
                <td><?php echo $row['name'];?>
                <td><?php echo $row['password'];  ?></td>
                <td><?php  if ($row['status']==1) {
                  echo "<span class='badge bg-primary'>Active</span>";
                } else{
                  echo "<span class='badge bg-danger'>Disabled</span>";
                } ?></td>
                <td>
                <a href="javascript:void(0)" data-id="<?= $row['id'] ?>"data-role_id="<?= $row['role_id'] ?>" data-name="<?= $row['name'] ?>" data-password="<?= $row['password'] ?>"data-status="<?= $row['status'] ?>"onclick="request_view_modal(this)"title="Click to View">

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



