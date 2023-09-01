
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin </span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->
    <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle" href="#">
                <i class="bi bi-search"></i>
            </a>
        </li><!-- End Search Icon-->

        <li class="nav-item px-2">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#customerModal">Add Customer</button>
        </li><!-- End "Add Customer" Button -->

        <li class="nav-item dropdown pe-3">
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                <span class="d-none d-md-block dropdown-toggle ps-2">Nice Admin</span>
            </a><!-- End Profile Image Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                    <h6>Nice Admin</h6>
                    <span>Web Designer</span>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                        <i class="bi bi-person"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                        <i class="bi bi-gear"></i>
                        <span>Account Settings</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="pages-faq.php">
                        <i class="bi bi-question-circle"></i>
                        <span>Need Help?</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                    </a>
                </li>
            </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

    </ul>
</nav><!-- End Icons Navigation -->



  </header><!-- End Header -->

  <!-- Large Modal -->


              <div class="modal fade" id="customerModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                     
                    <div class="modal-body">
                      <!-- Multi Columns Form -->
              <form class="row g-3" method="POST" action="ajax.php">
                
              
                <div class="col-md-3">
                  <label for="inputName5" class="form-label">نام</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="col-md-3">
                  <label for="inputEmail5" class="form-label">ایمیل</label>
                  <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="col-md-3">
                  <label for="inputPassword5" class="form-label">فون</label>
                  <input type="number" class="form-control" id="contact" name="contact">
                </div>
                <div class="col-3">
                  <label for="inputAddress5" class="form-label">پتہ</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St">
                </div>

                <hr>

                <h2 class="text-center">ناپ</h2>
                <hr>
                <div class="row">
                <div class="col-md-2">
                  <label for="inputCity" class="form-label">لمبائی</label>
                  <input type="number" class="form-control" id="length">
                </div>

                <div class="col-md-2">
                  <label for="inputCity" class="form-label">چھاتی</label>
                  <input type="number" class="form-control" id="chest">
                </div>
                 
                <div class="col-md-2">
                  <label for="inputState" class="form-label">شولڈر</label>
                  <input type="number" class="form-control" id="shoulder">
                </div>
                <div class="col-md-2">
                  <label for="inputZip" class="form-label">بازو</label>
                  <input type="number" class="form-control" id="arm">
                </div>
                

                <div class="col-md-2">
                  <label for="inputCity" class="form-label">ہاف بین</label>
                  <input type="number" class="form-control" id="haff_bean">
                </div>
                </div>
                <div class="row">
                <div class="col-md-2">
                  <label for="inputZip" class="form-label">ہاف بین سٹائل</label>
                  <select id="half_bean_style" class="form-select"  >
                    <option  selected>منتخب کریں</option>
                    <option value="1">چورس</option>
                    <option vlaue="2">گول</option>
                  </select>
                </div> 

                <div class="col-md-2">
                  <label for="inputZip" class="form-label">کمر</label>
                  <input type="number" class="form-control" id="back">
                </div>
  
                <div class="col-md-2">
                  <label for="inputZip" class="form-label">پانچه</label>
                  <input type="number" class="form-control" id="pouncha">
                </div>

                <div class="col-md-2">
                  <label for="inputState" class="form-label">گھیرا</label>
                  <input type="number" class="form-control" id="surround">
                </div>
                
                <div class="col-md-2">
                  <label for="inputState" class="form-label">شلوار</label>
                  <input type="number" class="form-control" id="pants">
                </div> 
                </div>
                <div class="row">
                <div class="col-md-2">
                  <label for="inputState" class="form-label"> پٹی کی لمبائی</label>
                  <input type="number" class="form-control" id="strip_length">
                </div>

                
                <div class="col-md-2">
                  <label for="inputZip" class="form-label"> پٹی کی چوڑائی</label>
                  <input type="number" class="form-control" id="strip_width">
                </div>

                <div class="col-md-2">
                  <label for="inputZip" class="form-label">موڑہ</label>
                  <input type="number" class="form-control" id="bent">
                </div>                 
                <div class="col-md-2">
                  <label for="inputCity" class="form-label">بغل جيب</label>
                  <select id="side_pocket" class="form-select">
                    <option  selected>منتخب کریں</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option vlaue="2">2</option>
                  </select>
                </div>  
                <div class="col-md-2">
                  <label for="inputCity" class="form-label">سامنے جیب</label>
                  <select id="front_pocket" class="form-select">
                    <option  selected>منتخب کریں</option>
                    <option value="0">0</option>
                    <option vlaue="1">1</option>
                  </select>
                </div> 
                </div>
                <div class="col-md-2">
                  <label for="inputZip" class="form-label" >دامن</label>
                  <select id="daman" class="form-select">
                    <option  selected>منتخب کریں</option>
                    <option value="1">چورس</option>
                    <option vlaue="2">گول</option>
                  </select>
                </div>   
                </div>

        
                   
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button type="submit" name="btn_submit" id="btn_submit" class="btn btn-primary">Save Order</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Large Modal-->
            </div>
              </form><!-- End Multi Columns Form -->
              





