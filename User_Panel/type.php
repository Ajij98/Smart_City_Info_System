<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>



<!-- Select Types -->
 <?php

   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_GET['city_id']))
   {
     $city_id   = $_GET['city_id'];
     $city_name = $_GET['city_name'];
     
     $sql = "SELECT * FROM tb_type WHERE city_id = $city_id AND city_name = '$city_name'";

     $read_type = $db->select($sql);
   }
  ?>




  <!-- City List Data Load -->
 <?php
   $user_name = $_SESSION['user_name'];
   $db        = new Database();
   $sql       = "SELECT * FROM tb_city";
   $read_city = $db->select($sql);
  ?>









<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SMART CITY - All Types</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/city_img/c_1.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/city_img/c_1.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/city_img/c_1.png">
  <link rel="manifest" href="assets/images/icons/site.html">
  <link rel="mask-icon" href="assets/city_img/c_1.png" color="#666666">
  <link rel="shortcut icon" href="assets/city_img/c_1.png">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/my_css.css" rel="stylesheet">

  <!-- Fontawsome (Version-4.7.0)-->
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">smartcity@gmail.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+880 1625-137629</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 style="border: none; font-size: 22px;"><a href="index.php"><img class="d-inline mb-2 mx-1" src="assets/city_img/c_1.png" width="25" height="25"><span style="color: #E96B56;">Smart</span> City</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="index.php">HOME</a></li>
          <li><a href="about.php">ABOUT US</a></li>
          <li><a href="index.php" class="scroll-to">ALL CITIES</a></li>
          <li><a href="dashboard.php">MY ACCOUNT</a></li>
          <li><a onclick="return confirm('Sure to logout?')" href="logout_user.php">LOGOUT</a></li>
          <li><a href="contact.php">CONTACT US</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Home</a></li>
          <li>All Types</li>
        </ol>
        <h2>All Types - <?php echo $city_name; ?></h2>

      </div>
    </section><!-- End Breadcrumbs -->


    <div id="cities" class="col-10 m-auto">
      <div class="input-group mb-3">
        <strong style="margin-right: 10px; margin-top: 3px; font-size: 14px;">SEARCH YOUR TYPE: </strong>
        <input type="text" id="search" placeholder="Search.." aria-describedby="basic-addon2" style="border-radius: 3px; border: 1px solid #535353;">
        <div class="input-group-append">
          <span class="input-group-text" id="basic-addon2" style="background-color: #E96B56; color: white;"><i class="fa fa-search"></i></span>
        </div>
      </div>
     <hr>
    </div>

    <!-- ======= Category Section ======= -->
    <section id="blog featured" class="blog featured my-0 py-0">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <div class="row" id="search_category">

              <?php if($read_type){ $i = 0; ?>
              <?php while($result = $read_type->fetch_assoc()){ $i = $i + 1; ?>
              <div class="col-lg-6 col-md-6 col-sm-12" id="category">
                <a href="type_details.php?city_id=<?php echo $result['city_id']; ?>&city_name=<?php echo $result['city_name']; ?>&type=<?php echo $result['type_name']; ?>">
                  <div class="card card-body shadow-sm mb-3">
                    <div class="row">
                      <div class="col-10">
                        <p class="pb-0 my-2"><?php echo $result['type_name']; ?></p>
                      </div>
                      <div class="col-2">
                        <p class="pb-0 my-2"><img class="my-0 py-0" src="assets/city_img/c_3.png" width="25" height="25"></p>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <?php } ?>
              <?php }else{ ?>
              <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                echo $msg; ?>
              <?php } ?>

          </div>

          </div><!-- End category list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->


              <h3 class="sidebar-title" style="font-size: 15px;">Related Cities</h3>
              <div class="sidebar-item recent-posts">

                <?php if($read_city){ $i = 0; ?>
                 <?php while($result = $read_city->fetch_assoc()){ $i = $i + 1; ?>
                <div class="post-item clearfix">
                  <a href="type.php?city_id=<?php echo $result['city_id']; ?>&city_name=<?php echo $result['city_name']; ?>">
                    <img src="assets/city_img/c_4.png" height="30">
                    <h4><?php echo $result['city_name']; ?></h4>
                    <time datetime="2020-01-01">Explore Now</time>
                  </a>
                </div>
                <?php } ?>
                <?php }else{ ?>
                <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                  echo $msg; ?>
                <?php } ?>

              </div><!-- End sidebar recent posts-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="about.php">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">All Cities</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="dashboard.php">My Account</a></li>
              <li><i class="bx bx-chevron-right"></i> <a onclick="return confirm('Sure to logout?')" href="logout_user.php">Logout</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contact.php">Contact Us</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Zia Bhaban <br>
              Agrabad, Chattogram<br><br>
              <strong>Phone:</strong> +880 1625-137629<br>
              <strong>Email:</strong> smartcity@gmail.com<br>
            </p>

          </div>

          <div class="col-lg-4 col-md-6 footer-info">
            <h3>About Us</h3>
            <p>A smart city is a municipality that uses information and communication technologies (ICT) to increase operational efficiency, share information with the public and improve both the quality of government services and citizen welfare.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        <?php echo date("Y"); ?> &copy; Copyright <strong><span>SMART CITY</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/ -->
        Developed by <a href="https://bootstrapmade.com/">Shanto</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


  <!-- jQuery Search CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
  $(document).ready(function(){
    $("#search").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#search_category #category").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
  </script>

</body>

</html>