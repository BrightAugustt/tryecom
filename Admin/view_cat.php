<?php
session_start();
if (empty($_SESSION['customer_id']) and empty($_SESSION['customer_name']) and empty($_SESSION['customer_email']) and empty($_SESSION['user_role']!= 1) )
   {
      header('Location:../Login/login.php');
   };

include("../controllers/product_controller.php");


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tables / General - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="admin.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">YesIDO</span>
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
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Augustt Bright</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Augustt Bright</h6>
              <span>Admin</span>
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

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="admin.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Manage Services</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
      <li>
        <a href="add_brand.php" class="active">
          <i class="bi bi-circle"></i><span>Add Brand</span>
        </a>
      </li>

      <li>
        <a href="add_category.php" class="active">
          <i class="bi bi-circle"></i><span>Add Category</span>
        </a>
      </li>
      <li>
        <a href="add_product.php" class="active">
          <i class="bi bi-circle"></i><span>Add Products</span>
        </a>
      </li>
      
    </ul>
  </li><!-- End Forms Nav -->

  <li class="nav-item">
    <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>View Services</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="view_brands.php">
          <i class="bi bi-circle"></i><span>Brands</span>
        </a>
      </li>
      <li>
        <a href="view_cat.php">
          <i class="bi bi-circle"></i><span>Category</span>
        </a>
      </li>
      <li>
        <a href="view_product.php">
          <i class="bi bi-circle"></i><span>Product</span>
        </a>
      </li>
    </ul>
  </li>
    <!-- End Tables Nav -->

</ul>

</aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Category Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
          <li class="breadcrumb-item">Services</li>
          <li class="breadcrumb-item active">Category</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

  

    <table class="table table-striped">
         <thead>
              <tr>
                <th scope="col">shoot Name</th>
                <th scope="col"></th>
                <th scope="col">Edit</th>
                <th scope="col"></th>
                <th scope="col">Delete</th>
              </tr>
        </thead>
        <tbody>
            <?php
                function displayCtr(){

                    $display = selectall_category_ctr();
                    for ($i =0; $i < count($display); $i++){
                        echo "<tr>";
                        echo "<td>". $display[$i]['cat_name']. "<td>";
                        echo "<th><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#examplemodal$i'>
                        Update
                      </button><th>";
                        echo "<th><form action='../actions/delete_cat.php' method='POST'>
                        <input type='submit' class='btn btn-outline-danger' value='delete'  name='delete'>
                        <input type='hidden' name='cat_id' value='" . $display[$i]['cat_id'] . "'></form></th>";
                        echo "</tr>";

                        echo 
                        "
                        <div class='modal fade' id='examplemodal$i' tabindex='-1' role='dialog' aria-labelledby='examplemodalLabel' aria-hidden='true'>
                        <div class='modal-dialog' role='document'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h5 class='modal-title' id='examplemodalLabel'>Brand Edit</h5>
                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                              </button>
                            </div>
                            <div class='modal-body'>
                              <form action='../actions/updatecategoryprocess.php' method='POST'>
                                 <div class='formgroup'>
                                    <input type='hidden' name='brand_id' value= '".$display[$i]['cat_id']."'>
                                </div>
                                <div class='form-group'>
                                  <label for='recipient-name' class='col-form-label'>Category Name:</label>
                                  <input type='text' class='form-control' id='brand_name' name='brand_name' required placeholder= '".$display[$i]['cat_name']."'>
                                  <input type='hidden' name='brand_id'  value= '".$display[$i]['cat_id']."'>
                                </div>
                                <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
                                <input type = 'submit' value='update' name='updatecat' class='btn btn-primary'>
                                <input type='hidden' name='brand_id' value='".$display[$i]['cat_id']."'>
                              </div>
                              </form>
                      
                      </div>";
                    }
                }	   
                displayCtr();
                ?>
        </tbody>

</table>

<?php  


echo
               
" 
                <div class='modal fade' id='modal2' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
               <div class='modal-dialog' role='document'>
                 <div class='modal-content'>
                   <div class='modal-header'>
                     <h5 class='modal-title' id='exampleModalLabel'>New message</h5>
                     <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                     </button>
                   </div>
                   <div class='modal-body'>
                     <form>
                       <div class='form-group'>
                         <label for='recipient-name' class='col-form-label'>Recipient:</label>
                         <input type='text' class='form-control' id='recipient-name'>
                       </div>
                       <div class='form-group'>
                         <label for='message-text' class='col-form-label'>Message:</label>
                         <textarea class='form-control' id='message-text'></textarea>
                       </div>

                       <div class='form-group'>
                         <label for='message-text' class='col-form-label'>Message:</label>
                         <textarea class='form-control' id='message-text'></textarea>
                       </div>
                     </form>
                   </div>
                   <div class='modal-footer'>
                     <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                     <button type='button' class='btn btn-primary'>Send message</button>
                   </div>
                 </div>
               </div>
             </div>
               ";

?>;


   
<script>
$('#exampleModal$i').on('shown.bs.modal', function (event) {
$('#myInput').trigger('focus')
})
$('modal2').on('shown.bs.modal', function (event) {
$('#myInput').trigger('focus')
})


</script>


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>