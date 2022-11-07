<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../../login.php');
  }
 ?>



<!-- Select City Details -->
 <?php

   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_GET['city_id']))
   {
     $city_id   = $_GET['city_id'];
     
     $sql     = "SELECT * FROM tb_city WHERE city_id = $city_id";

     $result  = $db->select($sql);

     while($getData = $result->fetch_assoc())
     {
        $city_id   = $getData['city_id'];
        $city_name = $getData['city_name'];
     }
   }
  ?>




<!-- Select Type -->
 <?php
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');
    
    $sql       = "SELECT type_name FROM tb_type WHERE city_id = $city_id AND city_name = '$city_name'";
    $read_type = $db->select($sql);
  ?>



<!-- Select Area -->
 <?php
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');
    
    $sql       = "SELECT area_name FROM tb_area WHERE city_id = $city_id AND city_name = '$city_name'";
    $read_area = $db->select($sql);
  ?>




  <!-- Add Place Section -->
 <?php
   $user_name = $_SESSION['user_name'];
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_POST['submit']))
   {  
      $city_id           = $city_id;
      $city_name         = $_POST['city_name'];
      $type_name         = $_POST['type_name'];
      $area_name         = $_POST['area_name'];
      $place_name        = $_POST['place_name'];
      $place_description = $_POST['place_description'];
      $place_loc_details = $_POST['place_loc_details'];
      $place_gmap_link   = $_POST['place_gmap_link'];
      $place_added_on    = $_POST['place_added_on'];
      $added_by          = $user_name;

      $tmp              = md5(time());
      $place_img = $_FILES["place_img"]["name"];
      $dst              = "./place_image/".$tmp.$place_img;
      $dst_db           = "place_image/".$tmp.$place_img;
      move_uploaded_file($_FILES["place_img"]["tmp_name"],$dst);

      $sql = "INSERT INTO tb_place(city_id,city_name,type_name,area_name,place_name,place_img,place_description,place_loc_details,place_gmap_link,place_added_on,added_by,entry_time)values('$city_id','$city_name','$type_name','$area_name','$place_name','$dst_db','$place_description','$place_loc_details','$place_gmap_link','$place_added_on','$added_by','$current_datetime')";
         
      $insert_row = $db->insert($sql);

        if($insert_row)
        {
          ?>
          <script type="text/javascript">
            window.alert("Place details added successfully.");
            window.location='add_place.php?city_id=<?php echo $city_id; ?>&city_name=<?php echo $city_name; ?>';
          </script>
        <?php
        }
        else 
        {
          $msg = '<div class="alert alert-danger alert-dismissable w-75 m-auto" id="flash-msg"><strong>Error!</strong> Something went wrong! Data not added.</div><br />';
          echo $msg;
          return false;
        }
   }
  ?>




  <!-- Place List Table Data Load -->
 <?php
   $user_name  = $_SESSION['user_name'];
   $db         = new Database();
   $sql        = "SELECT * FROM tb_place WHERE added_by = '$user_name' AND city_name = '$city_name'";
   $read_place = $db->select($sql);
  ?>













<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SMART CITY - Add Place</title>

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/city_img/c_1.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/city_img/c_1.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/city_img/c_1.png">
  <link rel="manifest" href="assets/images/icons/site.html">
  <link rel="mask-icon" href="assets/city_img/c_1.png" color="#666666">
  <link rel="shortcut icon" href="assets/city_img/c_1.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <!-- Fontawsome(v-4.7.0) -->
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <a href="index.php" class="brand-link">
      <img class="d-inline mb-2 mx-1" src="assets/city_img/c_1.png" width="25" height="25" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span style="color: #E96B56;" class="brand-text"><strong>SMART</strong></span> <span class="text-light">CITY</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <i class="fa fa-user-circle fa-2x text-light"></i>
        </div>
        <div class="info">
          <a href="" class="d-block">Admin</a>
          <small class="text-secondary">Administration</small>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                My Account
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="add_city.php" class="nav-link">
              <i class="nav-icon fas fa-plus"></i>
              <p>
                Add City
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="city_list_type.php" class="nav-link">
              <i class="nav-icon fas fa-align-left"></i>
              <p>
                Add Type
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="city_list_area.php" class="nav-link">
              <i class="nav-icon fa fa-map-marker"></i>
              <p>
                Add Area
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="city_list_place.php" class="nav-link active">
              <i class="nav-icon fas fa-street-view"></i>
              <p>
                Add Place
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="registered_user.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Registered User
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-info"></i>
              <p>
                About Us
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a onclick="return confirm('Sure to logout?')" href="logout_admin.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Sign-Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>Add Place</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
              <li class="breadcrumb-item active">Add Place</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Place Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">

                  <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                    
                    <div class="row">
                      <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="form-group">
                          <label for="city_name">City Name *</label>
                          <input type="text" class="form-control" id="city_name" name="city_name" value="<?php echo $city_name; ?>" readonly>
                        </div>
                      </div>
                      <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="form-group">
                          <label for="type_name">Select Place Type *</label>
                          <select class="form-control" id="type_name" name="type_name" required>
                            <option selected>Select Type...</option>
                            <?php if($read_type){ $i = 0; ?>
                            <?php while($result = $read_type->fetch_assoc()){ $i = $i + 1; ?>
                            <option><?php echo $result['type_name']; ?></option>
                            <?php } ?>
                            <?php }else{ ?>
                            <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                              echo $msg; ?>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="form-group">
                          <label for="area_name">Select Area *</label>
                          <select class="form-control" id="area_name" name="area_name" required>
                            <option selected>Select Area...</option>
                            <?php if($read_area){ $i = 0; ?>
                            <?php while($result = $read_area->fetch_assoc()){ $i = $i + 1; ?>
                            <option><?php echo $result['area_name']; ?></option>
                            <?php } ?>
                            <?php }else{ ?>
                            <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                              echo $msg; ?>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="form-group">
                          <label for="place_name">Place Name *</label>
                          <input type="text" class="form-control" id="place_name" name="place_name" placeholder="Enter Place Name" required>
                        </div>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="form-group">
                          <label for="place_img">Place Image *</label>
                          <input type="file" class="form-control" id="place_img" name="place_img" required>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="form-group">
                          <label for="place_description">Place Description *</label>
                          <textarea class="form-control" rows="3" id="place_description" name="place_description" placeholder="Enter Place Description" required></textarea>
                        </div>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="form-group">
                          <label for="place_loc_details">Place Location Details *</label>
                          <textarea class="form-control" rows="3" id="place_loc_details" name="place_loc_details" placeholder="Enter Place Location Details" required></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <label for="place_gmap_link">Google Map Link *</label>
                          <textarea class="form-control" rows="3" id="place_gmap_link" name="place_gmap_link" placeholder="Place Google Map Link Here.." required></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-12">
                        <div class="form-group">
                          <label for="place_added_on">Place Added On *</label>
                          <input type="date" class="form-control" id="place_added_on" name="place_added_on" required>
                        </div>
                      </div>
                    </div>                
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-sm waves-effect waves-light" name="submit" value="Add Place">
                    </div>
                  </form>

                </div>
                <!-- /.card-body -->
              
            </div>
            <!-- /.card -->



            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Place List</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">

                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Place Id</th>
                      <th>Place Image</th>
                      <th>Place Name</th>
                      <th>Place Type</th>
                      <th>Place Location</th>
                      <th>Place Location Details</th>
                      <th>View Google Map</th>
                      <th>Place Added On</th>
                      <th>City Name</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                      <?php if($read_place){ $i = 0; ?>
                      <?php while($result = $read_place->fetch_assoc()){ $i = $i + 1; ?>
                      <tr>
                        <td class="text-primary"><?php echo '[PI-0'.$result['place_id'].']'; ?></td>
                        <td><img src="<?php echo $result['place_img']; ?>" height="100" alt="place"></td>
                        <td><?php echo $result['place_name']; ?></td>
                        <td><?php echo $result['type_name']; ?></td>
                        <td><?php echo $result['area_name']; ?></td>
                        <td><?php echo $result['place_loc_details']; ?></td>
                        <td><a href="<?php echo $result['place_gmap_link']; ?>" target="_blank" class="btn btn-dark btn-sm waves-effect waves-light"><i class="fa fa-map-marker"></i> View Google Map</a></td>
                        <td><?php echo $result['place_added_on']; ?></td>
                        <td><?php echo $result['city_name']; ?></td>
                        <td><a href="update_place_details.php" title="update" class="btn btn-info btn-sm waves-effect waves-light"><i class="fa fa-pencil"></i></a> | <a href="#" title="delete" onclick="return confirm('Sure to delete?')" class="btn btn-danger btn-sm btn-round waves-effect waves-light"><i class="fa fa-trash"></i></a></td>
                      </tr>
                      <?php } ?>
                      <?php }else{ ?>
                      <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                        echo $msg; ?>
                      <?php } ?>

                    </tbody>
                  </table>

                </div>
                <!-- /.card-body -->
              
            </div>
            <!-- /.card -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <small>Copyright &copy; <?php echo date("Y"); ?> <a href="../index.php">SMART CITY</a>.</small>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <a href="../index.php"><i class="fas fa-home"></i> Home</a>
    </div>
  </footer>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>





<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
