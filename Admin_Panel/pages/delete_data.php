<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../../login.php');
  }
 ?>


  <!-- Delete City -->
  <?php
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

    if(isset($_GET['city_id']))
    {
      $city_id = $_GET['city_id'];

      $sql = "DELETE FROM tb_city WHERE city_id = $city_id";
      $delete_row = $db->delete($sql);
      if($delete_row)
      {
        ?>
        <script type="text/javascript">
          window.alert("City details deleted successfully.");
          window.location='add_city.php';
        </script>
        <?php
      }
      else
      {
        $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
        echo $msg;
        return false;
      }
    }
    ?>



    <!-- Delete Type -->
  <?php
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

    if(isset($_GET['type_id']))
    {
      $type_id        = $_GET['type_id'];
      $city_id_type   = $_GET['city_id_type'];
      $city_name_type = $_GET['city_name_type'];

      $sql = "DELETE FROM tb_type WHERE type_id = $type_id";
      $delete_row = $db->delete($sql);
      if($delete_row)
      {
        ?>
        <script type="text/javascript">
          window.alert("Type deleted successfully.");
          window.location='add_type.php?city_id=<?php echo $city_id_type; ?>&city_name=<?php echo $city_name_type; ?>';
        </script>
        <?php
      }
      else
      {
        $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
        echo $msg;
        return false;
      }
    }
    ?>



    <!-- Delete Area -->
  <?php
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

    if(isset($_GET['area_id']))
    {
      $area_id       = $_GET['area_id'];
      $city_id_area  = $_GET['city_id_area'];
      $city_name_area = $_GET['city_name_area'];

      $sql = "DELETE FROM tb_area WHERE area_id = $area_id";
      $delete_row = $db->delete($sql);
      if($delete_row)
      {
        ?>
        <script type="text/javascript">
          window.alert("Area details deleted successfully.");
          window.location='add_area.php?city_id=<?php echo $city_id_area; ?>&city_name=<?php echo $city_name_area; ?>';
        </script>
        <?php
      }
      else
      {
        $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
        echo $msg;
        return false;
      }
    }
    ?>



