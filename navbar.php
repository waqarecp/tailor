<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center noprint">

  <div class="d-flex align-items-center justify-content-between">
    <a href="index.php" class="logo d-flex align-items-center">
      <img src="assets/img/logo.png" alt="">
      <span class="d-none d-lg-block">Tailor </span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle" href="javascript:void(0)">
          <i class="bi bi-search"></i>
        </a>
      </li><!-- End Search Icon-->

      <li class="nav-item px-4">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#customerModal">Add Customer</button>
      </li><!-- End "Add Customer" Button -->


    </ul>
  </nav><!-- End Icons Navigation -->



</header><!-- End Header -->

<!-- add customer model start Modal -->


              <div class="modal fade" id="customerModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                     
                    <div class="modal-body">
                      <!-- Multi Columns Form -->

              <form class="row g-3" method="POST" action="ajax.php">
                


              <form class="row g-3">
              <div class="col-md-4">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="col-md-4">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="col-md-4">
                  <label for="contact" class="form-label">Phone No</label>
                  <input type="number" class="form-control" id="contact" name="contact">
                </div>
                <div class="col-md-4">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" class="form-control" id="address" name="address" >

                </div>
                <hr>
                <h2 class="text-center">ناپ</h2>
                <hr>
                <div class="row">
                <div class="col-md-3">
                  <label for="length" class="form-label">لمبائی</label>
                  <input type="number" class="form-control" id="length" name="length">
                </div>

                <div class="col-md-3">
                  <label for="chest" class="form-label">چھاتی</label>
                  <input type="number" class="form-control" id="chest" name="chest">
                </div>
                 
                <div class="col-md-3">
                  <label for="shoulder" class="form-label">شولڈر</label>
                  <input type="number" class="form-control" id="shoulder" name="shoulder">
                </div>
                <div class="col-md-3">
                  <label for="arm" class="form-label">بازو</label>
                  <input type="number" class="form-control" id="arm" name="arm">
                </div>
                

                <div class="col-md-3">
                  <label for="half_bean" class="form-label">ہاف بین</label>
                  <input type="number" class="form-control" id="half_bean" name="half_bean">
                </div>
                <div class="col-md-3">
                  <label for="half_bean_style" class="form-label">ہاف بین سٹائل</label>
                  <select id="half_bean_style" class="form-select"  name="half_bean_style" >
                    <option  selected>منتخب کریں</option>
                    <option value="1">چورس</option>
                    <option vlaue="2">گول</option>
                  </select>
                </div> 

                <div class="col-md-3">
                  <label for="back" class="form-label">کمر</label>
                  <input type="number" class="form-control" id="back" name="back">
                </div>
  
                <div class="col-md-3">
                  <label for="pouncha" class="form-label">پانچه</label>
                  <input type="number" class="form-control" id="pouncha" name="pouncha">
                </div>

                            <div class="col-md-3">
                              <label for="surround" class="form-label">گھیرا</label>
                              <input type="number" class="form-control" id="surround" name="surround" >
                            </div>
                
                            <div class="col-md-3">
                              <label for="pants" class="form-label">شلوار</label>
                              <input type="number" class="form-control" id="pants" name="pants" >
                            </div>
                            <div class="col-md-3">
                              <label for="strip_lenght" class="form-label"> پٹی کی لمبائی</label>
                              <input type="number" class="form-control" id="strip_length" name="strip_lenght" >
                            </div>

                
                            <div class="col-md-3">
                              <label for="strip_width" class="form-label"> پٹی کی چوڑائی</label>
                              <input type="number" class="form-control" id="strip_width" name="strip_width">
                            </div>

                            <div class="col-md-3">
                              <label for="bent" class="form-label">موڑہ</label>
                              <input type="number" class="form-control" id="bent" name="bent" >
                            </div>
                            <div class="col-md-3">
                              <label for="side_pocket" class="form-label">بغل جيب</label>
                              <select id="side_pocket" class="form-select" name="side_pocket" >
                                <option selected>منتخب کریں</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option vlaue="2">2</option>
                              </select>
                            </div>
                            <div class="col-md-3">
                              <label for="front_pocket" class="form-label">سامنے جیب</label>
                              <select id="front_pocket" name="front_pocket" class="form-select" >
                                <option selected>منتخب کریں</option>
                                <option value="0">0</option>
                                <option vlaue="1">1</option>
                              </select>
                            </div>
                            <div class="col-md-3">
                              <label for="daman" class="form-label">دامن</label>
                              <select id="daman" name="daman" class="form-select" >
                                <option selected>منتخب کریں</option>
                                <option value="1">چورس</option>
                                <option vlaue="2">گول</option>
                              </select>
                            </div>
                          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" name="btn_submit" id="btn_submit" class="btn btn-primary">Submit</button>
          </div>
      </div>
    </div>
  </div><!-- End add customer button Modal-->
</div>
</form><!-- End Multi Columns Form -->

<!-- Small Modal -->

