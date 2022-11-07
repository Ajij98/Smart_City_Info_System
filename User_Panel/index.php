<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
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

  <title>SMART CITY - Home</title>
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
          <li><a href="#cities" class="scroll-to">ALL CITIES</a></li>
          <li><a href="dashboard.php">MY ACCOUNT</a></li>
          <li><a onclick="return confirm('Sure to logout?')" href="logout_user.php">LOGOUT</a></li>
          <li><a href="contact.php">CONTACT US</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background: url(assets/banner_img/5.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">WELCOME TO <span>SMART</span> CITY</h2>
                <p class="animate__animated animate__fadeInUp">A smart city is a municipality that uses information and communication technologies (ICT) to increase operational efficiency, share information with the public and improve both the quality of government services and citizen welfare.</p>
                <a href="#cities" class="btn-get-started animate__animated animate__fadeInUp">Explore Cities</a>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background: url(assets/banner_img/10.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated fanimate__adeInDown"><span>SMART</span> CITY</h2>
                <p class="animate__animated animate__fadeInUp">The main goal of a smart city is to optimise city functions and promote economic growth while also improving the quality of life for citizens by using smart technologies and data analysis.</p>
                <a href="#cities" class="btn-get-started animate__animated animate__fadeInUp">Explore Cities</a>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background: url(assets/banner_img/9.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span>SMART</span> CITY</h2>
                <p class="animate__animated animate__fadeInUp">
                Smart city is envisaged to have four pillars, its Social Infrastructure, Physical Infrastructure, Institutional Infrastructure (including Governance) and Economic Infrastructure.</p>
                <a href="#cities" class="btn-get-started animate__animated animate__fadeInUp">Explore Cities</a>
              </div>
            </div>
          </div>

          <!-- Slide 4 -->
          <div class="carousel-item" style="background: url(assets/banner_img/8.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span>SMART</span> CITY</h2>
                <p class="animate__animated animate__fadeInUp">
                Smart cities put data and digital technology to work to make better decisions and improve the quality of life. More comprehensive, real-time data gives agencies the ability to watch events as they unfold, understand how demand patterns are changing, and respond with faster and lower-cost solutions.</p>
                <a href="#cities" class="btn-get-started animate__animated animate__fadeInUp">Explore Cities</a>
              </div>
            </div>
          </div>

          <!-- Slide 5 -->
          <div class="carousel-item" style="background: url(assets/banner_img/7.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span>SMART</span> CITY</h2>
                <p class="animate__animated animate__fadeInUp">
                A city is considered to be “smart” when it can collect and analyze mass quantities of data from a wide variety of industries, from urban planning to garbage collection.</p>
                <a href="#cities" class="btn-get-started animate__animated animate__fadeInUp">Explore Cities</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <div id="cities" class="col-10 m-auto">
      <div class="input-group mb-3">
        <strong style="margin-right: 10px; margin-top: 3px; font-size: 14px;">SEARCH CITY TO EXPLORE: </strong>
        <input type="text" id="search" placeholder="Search.." aria-describedby="basic-addon2" style="border-radius: 3px; border: 1px solid #535353;">
        <div class="input-group-append">
          <span class="input-group-text" id="basic-addon2" style="background-color: #E96B56; color: white;"><i class="fa fa-search"></i></span>
        </div>
      </div>
     <hr>
    </div>

    <!-- ======= Featured Section ======= -->
    <section id="featured" class="featured">
      <div class="container">

        <div class="row" id="search_category">

          <?php if($read_city){ $i = 0; ?>
          <?php while($result = $read_city->fetch_assoc()){ $i = $i + 1; ?>
          <div class="col-lg-4 col-md-6 col-sm-12" id="category">
            <a href="type.php?city_id=<?php echo $result['city_id']; ?>&city_name=<?php echo $result['city_name']; ?>">
              <div class="card card-body shadow-sm mb-3">
                <div class="row">
                  <div class="col-10">
                    <p class="pb-0 my-2"><?php echo $result['city_name']; ?></p>
                  </div>
                  <div class="col-2">
                    <p class="pb-0 my-2"><img class="my-0 py-0" src="assets/city_img/c_4.png" width="25" height="25"></p>
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

      </div>
    </section><!-- End Featured Section -->


    <div class="col-10 m-auto">
      <h6><strong>ABOUT US</strong></h6><hr>
    </div>

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <img src="assets/banner_img/11.jpg" class="img-fluid" alt="" style="border-radius: 5px;">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
            <h3>ABOUT US</h3>
            <p>
              A smart city is a municipality that uses information and communication technologies (ICT) to increase operational efficiency, share information with the public and improve both the quality of government services and citizen welfare.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Choose City to Explore.</li>
              <li><i class="bi bi-check-circle"></i> Select Place Type.</li>
              <li><i class="bi bi-check-circle"></i> Visite Place.</li>
            </ul>

            <a href="about.php" class="btn btn-sm px-4" style="border-radius: 20px; background-color: #E96B56; color: white;">Read More...</a>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

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
              <li><i class="bx bx-chevron-right"></i> <a href="#cities">All Cities</a></li>
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