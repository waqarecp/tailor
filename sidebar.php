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
    <a class="nav-link collapsed" href="customer.php">
      <i class="bi bi-book"></i>
      <span>Orders</span>
    </a>
  </li><!-- End Orders Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="customer.php">
      <i class="bi bi-gear"></i>
      <span>Settings</span>
    </a>
  </li><!-- End setting Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" >
      <i class="bi bi-power" ></i>
      <span data-bs-toggle="modal" style="cursor:pointer" data-bs-target="#smallModal">Log Out</span>
    </a>
  </li><!-- End setting Page Nav -->


</ul>

</aside><!-- End Sidebar-->


              <!-- Small Modal -->

              <div class="modal fade" id="smallModal" tabindex="-1">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     Are you sure to Logout..!
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="logout.php" class="btn btn-danger">Logout</a>
                    </div>
                  </div>
                </div>
              </div><!-- End Small Modal-->