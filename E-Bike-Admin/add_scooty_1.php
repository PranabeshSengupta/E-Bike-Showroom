<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Add Scooty</title>
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="data_insert_form.css">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="logout_modal.css">

</head>

<body id="page-top">
  <div id="wrapper">

    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <img src="img/logo/scooter.png">
        </div>
        <div class="sidebar-brand-text mx-3" style="margin-top: 15px;">Diamond
          <p style="font-size:12px;">E-Bike</p>
        </div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">



      <li class="nav-item active sidebar">
        <div class="bg-dark py-2 rounded operations-menu">
          <h6 class="collapse-header operations-header">
            <i class="fas fa-cogs icon"></i> <!-- Added icon for Manage Operations -->
            <span class="menu-text">Manage Operations</span>
          </h6>
          <a class="collapse-item" href="add_scooty_1.php">
            <i class="fas fa-motorcycle icon"></i><span class="menu-text">Add new scooty</span>
          </a>
          <!-- <a class="collapse-item" href="add_toto.html">
            <i class="fas fa-car icon"></i><span class="menu-text">Add new Toto</span>
          </a>
          <a class="collapse-item" href="add_other_products.html">
            <i class="fas fa-box icon"></i><span class="menu-text">Add Other Products</span>
          </a> -->
          <a class="collapse-item" href="query.php">
            <i class="fas fa-question-circle icon"></i><span class="menu-text">Queries</span>
          </a>
          <a class="collapse-item" href="review.php">
            <i class="fas fa-comments icon"></i><span class="menu-text">Reviews</span>
          </a>
          <a class="collapse-item" href="contact.php">
            <i class="fas fa-envelope icon"></i><span class="menu-text">Contact</span>
          </a>
          <a class="collapse-item" href="add_video.php">
            <i class="fas fa-video icon"></i><span class="menu-text">Add video</span>
          </a>
        </div>
      </li>



    </ul>

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $_SESSION["hello"] ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profiles.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profiles
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" onclick="showLogoutModal();">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>



        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add new scooty</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.php">Home</a>
              </li>
              <li class="breadcrumb-item">Operations</li>
              <li class="breadcrumb-item active" aria-current="page">Add new scooty</li>
            </ol>
          </div>




          <!-- Add new scooty form -->


          <section class="product">
            <form action="add_scooty.php" method="post" enctype="multipart/form-data">
              <div class="form-grid">
                <h2 class="heading">Product Basic Details</h2>
                <label class="inp-heading">Model Name :</label>
                <input type="text" name="model" id="model" placeholder="Model Name" required>

                <label class="inp-heading">Price :</label>
                <input type="text" name="price" id="price" placeholder="Price" required>

                <label class="inp-heading">Range :</label>
                <input type="text" name="range" id="range" placeholder="Km/charge" required>

                <h2 class="heading">Specifications</h2>
                <label class="inp-heading">Displacement :</label>
                <input type="text" name="displacement" id="displacement" placeholder="CC" required>

                <label class="inp-heading">Top speed :</label>
                <input type="text" name="top_speed" id="top_speed" placeholder="Km/h" required>

                <label class="inp-heading">Charging Time :</label>
                <input type="text" name="charging_time" id="charging_time" placeholder="hours" required>

                <label class="inp-heading">Weight Capacity :</label>
                <input type="text" name="weight_capacity" id="weight_capacity" placeholder="Kg" required>

                <label class="inp-heading">Weight of the Vehicle :</label>
                <input type="text" name="weight_vehicle" id="weight_vehicle" placeholder="Kg" required>

                <h2 class="heading">Key Features</h2>
                <label class="inp-heading">Smart Dashboard :</label>
                <input type="text" name="smart_dashboard" id="smart_dashboard" required>

                <label class="inp-heading">App Connectivity :</label>
                <input type="text" name="app_connectivity" id="app_connectivity" required>

                <label class="inp-heading">Safety Features :</label>
                <input type="text" name="safety_features" id="safety_features" required>

                <label class="inp-heading">Lights and Indicators :</label>
                <input type="text" name="light" id="light" required>

                <h2 class="heading">Service & Maintenance Schedule</h2>
                <label class="inp-heading">1st Service :</label>
                <input type="text" name="service_1" id="service_1" required>

                <label class="inp-heading">2nd Service :</label>
                <input type="text" name="service_2" id="service_2" required>

                <label class="inp-heading">3rd Service :</label>
                <input type="text" name="service_3" id="service_3" required>

                <h2 class="heading">Upload Product Images</h2>
                <label class="inp-heading">Main Image :</label>
                <input type="file" name="image" id="image" required>

                <label class="inp-heading">Gallery Image-1 :</label>
                <input type="file" name="g_image_1" id="g_image_1" required>

                <label class="inp-heading">Gallery Image-2 :</label>
                <input type="file" name="g_image_2" id="g_image_2" required>

                <label class="inp-heading">Gallery Image-3 :</label>
                <input type="file" name="g_image_3" id="g_image_3" required>

                <label class="inp-heading">Gallery Image-4 :</label>
                <input type="file" name="g_image_4" id="g_image_4" required>

                <label class="inp-heading">Gallery Image-5 :</label>
                <input type="file" name="g_image_5" id="g_image_5" required>

                <input type="submit" class="submit" name="submit" value="Submit">
              </div>
            </form>
          </section>


          <script>
            document.querySelectorAll('input[type="file"]').forEach(input => {
              input.addEventListener('change', function () {
                const fileNameDisplay = this.parentNode.nextElementSibling.querySelector('.file-name');
                fileNameDisplay.textContent = this.files.length > 0 ? this.files[0].name : 'No file selected';
              });
            });
          </script>







          <!-- Modal Logout -->



          <div class="modal" id="logoutModal">
            <div class="modal-content">
              <span class="close" onclick="closeModal()"></span>
              <h2>Confirm Logout </h2>
              <p>Are you sure you want to logout?</p>
              <div class="modal-buttons">
                <button class="btn-confirm" onclick="confirmLogout()">Logout</button>
                <button class="btn-cancel" onclick="hideLogoutModal()">Cancel</button>
              </div>
            </div>
          </div>





        </div>
        <!---Container Fluid-->
      </div>

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy;
              <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://github.com/Tahir1605" target="_blank">Tahirul islam</a></b>
            </span>
          </div>
        </div>
      </footer>

    </div>
  </div>
  <!-- Scrollto to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="js/index.js"></script>
  <script src="my_js/logout_modal.js"></script>

</body>

</html>