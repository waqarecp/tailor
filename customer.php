<?php include 'header.php';
?>

<body>

 <?php include 'navbar.php';
 include 'sidebar.php';
 ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Customer</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active" >Customer</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

   <!-- Table with stripped rows -->
   <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Address</th>
                    <th scope="col">Status</th> 
                    <th scope="col">Actions</th>
                  
                  </tr>
                </thead>
                <tbody>
                 
                <?php   $query = $object->select("*","customers","1"); 
                
                while ($row=$query->fetch_assoc()) {
                  
                ?>
                
                <tr>
                    <td><?php echo $row['id'];  ?></td>
                    <td><?php echo $row['name'];  ?></td>
                    <td><?php echo $row['contact'];?> <br><small> <?php echo $row['email']; ?></td>
                    <td><?php echo $row['address'];  ?></td>
                    <td><?php  if ($row['status']==1) {
                      echo "<span class='badge bg-primary'>Active</span>";
                    } else{
                      echo "<span class='badge bg-danger'>Disabled</span>";
                    } ?></td>
                    <td>
                    <a href="javascript:void(0)" data-id="<?= $row['id'] ?>" data-name="<?= $row['name'] ?>" data-created-date="<?= $row['created_date'] ?>" data-email="<?= $row['email'] ?>" data-contact="<?= $row['contact'] ?>" data-address="<?= $row['address'] ?>"  data-name="<?= $row['name'] ?>"  data-updated_by="<?= $row['updated_by'] ?>"  data-status="<?= $row['status'] ?>"   onclick="request_view_modal(this)" title="Click to View">
  <button type="button" class="btn btn-sm btn-info text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="More Information">
  <span class="bi bi-eye"></span>
    </button>                   </a>

    <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#editModal">
  <span class="bi bi-pencil"></span>
    </button>  
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

<div class="modal fade" id="view_model" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                     
                    <div class="modal-body">
                      <!-- Multi Columns Form -->
             <!-- Table with stripped rows -->
                <hr>


                <div class="row ">
                  <div class="col-md-6">
                  <span class="bi bi-file-person"></span><label class="px-1">ID: </label>     <span id="view_id"></span>
              
                  </div>
                  <div class="col-md-6">
                  <span class="bi bi-person-plus-fill "></span><label class="px-1">Name: </label>   <span id="view_name"></span>

                  </div>
                </div>

                
                <div class="row pt-5">
                  <div class="col-md-6">
                  <span class="bi bi-envelope-fill "></span><label class="px-1">Email: </label>    <span id="view_email"></span>
                  </div>
                  <div class="col-md-6">
                  <span class="bi bi-telephone-fill "></span><label class="px-1">Contact: </label>   <span id="view_contact"></span>
                  </div>
                </div>
                 

   <div class="row pt-5">
    <div class="col-md-12">
    <span class="bi bi-house-fill "></span><label class="px-1">Address: </label>   <span id="view_address"></span>

</div>
</div>

<div class="row pt-5">
                  <div class="col-md-6">
                  <label >Created_by:</label><span id="view_name"></span>
                  </div>
                  <div class="col-md-6">
                  <span class="bi bi-calendar-event-fill"></span><label class="px-1">Created_date: </label><span>     <span id="view_created_date"></span></span>
                  </div>
                </div>

                <div class="row pt-5">
                  <div class="col-md-6">
                  <span class="bi bi-calendar-event-fill"></span><label class="px-1">updated_date: </label><span>      <span id="view_updated_date"></span></span>

                  </div>
                  <div class="col-md-6">
                  <label>Status:</label>     <span id="view_status"></span>
                  </div>
                </div>
                <hr>
                <form class="row g-3">
              

            

               <h2 class="text-center">ناپ</h2>
                <hr>
                <div class="row">
                  <div class="col-md-1"></div>
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
               <div class="col-md-1"></div>
                <div class="col-md-2">
                  <label for="inputZip" class="form-label">ہاف بین سٹائل</label>
                  <select id="inputState" class="form-select"  >
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
                <div class="col-md-1"></div>
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
                  <select id="inputState" class="form-select">
                    <option  selected>منتخب کریں</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option vlaue="2">2</option>
                  </select>
                </div>  
                <div class="col-md-2">
                  <label for="inputCity" class="form-label">سامنے جیب</label>
                  <select id="inputState" class="form-select">
                    <option  selected>منتخب کریں</option>
                    <option value="0">0</option>
                    <option vlaue="1">1</option>
                  </select>
                </div> 
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                  <label for="inputZip" class="form-label" >دامن</label>
                  <select id="inputState" class="form-select">
                    <option  selected>منتخب کریں</option>
                    <option value="1">چورس</option>
                    <option vlaue="2">گول</option>
                  </select>
                </div>
              <!-- End Table with stripped rows -->
              </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                  </div>
                </div>
              </div><!-- End Large Modal-->
            </div>
              </form><!-- End Multi Columns Form -->
              
                    </div>
                  </div>
                </div>
              </div><!-- End Large Modal-->
              

              <script>
  function request_view_modal(element) {
    // Get the data attributes
    var id = $(element).attr("data-id");
    var name = $(element).attr("data-name");
    var email = $(element).attr("data-email");
    var contact = $(element).attr("data-contact");
    var address = $(element).attr("data-address");
    var name = $(element).attr("data-name");
    var created_date = $(element).attr("data-created_date");
    var updated_date = $(element).attr("data-updated_date");
    var status = $(element).attr("data-status");
if (status==1){
  var status='Active';
}
else{
  var status='Disabled';
}
    // Populate the values
    $("#view_id").text(id);
    $("#view_name").text(name);
    $("#view_email").text(email);
    $("#view_contact").text(contact);
    $("#view_address").text(address);
    $("#view_name").text(name);
    $("#view_created_date").text(created_date);
    $("#view_updated_date").text(updated_date);
    $("#view_status").text(status);
    // Show the modal
    $('#view_model').modal('show');
  }

  </script>

 <!-- Large Modal -->
 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                Large Modal
              </button>

              <div class="modal fade" id="editModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                    <form class="row g-3">
                <div class="col-md-3">
                  <label for="inputName5" class="form-label">نام</label>
                  <input type="text" class="form-control" id="name">
                </div>
                <div class="col-md-3">
                  <label for="inputEmail5" class="form-label">ایمیل</label>
                  <input type="email" class="form-control" id="email">
                </div>
                <div class="col-md-3">
                  <label for="inputPassword5" class="form-label">فون</label>
                  <input type="number" class="form-control" id="contact">
                </div>
                <div class="col-3">
                  <label for="inputAddress5" class="form-label">پتہ</label>
                  <input type="text" class="form-control" id="address" placeholder="1234 Main St">
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
                  <select id="inputState" class="form-select"  >
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
                  <select id="inputState" class="form-select">
                    <option  selected>منتخب کریں</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option vlaue="2">2</option>
                  </select>
                </div>  
                <div class="col-md-2">
                  <label for="inputCity" class="form-label">سامنے جیب</label>
                  <select id="inputState" class="form-select">
                    <option  selected>منتخب کریں</option>
                    <option value="0">0</option>
                    <option vlaue="1">1</option>
                  </select>
                </div> 
                </div>
                <div class="col-md-2">
                  <label for="inputZip" class="form-label" >دامن</label>
                  <select id="inputState" class="form-select">
                    <option  selected>منتخب کریں</option>
                    <option value="1">چورس</option>
                    <option vlaue="2">گول</option>
                  </select>
                </div>   
                </div>

        
                   
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-primary">Edit Order</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Large Modal-->
            </div>
              </form><!-- End Multi Columns Form -->
                    </div>
                  </div>
                </div>
              </div><!-- End Large Modal-->

  <!-- Medium Modal -->

            