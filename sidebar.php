 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="index.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="customer.php">
      <i class="bi bi-person"></i>
      <span>Customer</span>
    </a>
  </li><!-- End customer Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="orders.php">
      <i class="bi bi-cart"></i>
      <span>Orders</span>
    </a>
  </li><!-- End Orders Page Nav -->

  
  <div class="dropdown nav-item nav-link collapsed">
   <span class="bi bi-person"></span> <a class="btn btn-default dropdown-toggle" data-toggle="dropdown">Users
    </a>
    <ul class="dropdown-menu">
      <li><a href="user.php">User</a></li>
      <li class="divider"></li>
      <li><a href="add-user.php">Add User</a></li>
      
    </ul>
  </div>
  <li class="nav-item">
    <a class="nav-link collapsed" href="settings.php">
      <i class="bi bi-gear"></i>
      <span>Settings</span>
    </a>
  </li><!-- End setting Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" >
      <i class="bi bi-power" ></i>
      <span data-bs-toggle="modal" data-bs-target="#mediumModal">Log Out</span>
    </a>
  </li><!-- End setting Page Nav -->


</ul>

</aside><!-- End Sidebar-->


              <!-- Medium Modal -->

              <div class="modal fade" id="mediumModal" tabindex="-1">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     Are you sure to Logout..!
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-danger">Logout</button>
                    </div>
                  </div>
                </div>
              </div><!-- End medium Modal-->







