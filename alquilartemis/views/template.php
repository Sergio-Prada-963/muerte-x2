<?php 
/* Capturan Rutas de la URL */
$urlArray = explode("/", $_SERVER['REQUEST_URI']);
$urlArray = array_filter($urlArray);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Projects</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/assets/plugins/adminlte/css/adminlte.min.css">

  <!-- jQuery -->
<script src="views/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="views/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="views/assets/plugins/adminlte/js/adminlte.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php include"views/modules/navbar.php"; ?>

  <!-- Main Sidebar Container -->
  <?php include"views/modules/sidebar.php"; ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php 
    if(!empty($urlArray[5])){
      if($urlArray[5] == "empleado" ||
      $urlArray[5] == "producto" ||
      $urlArray[5] == "proveedor" ||
      $urlArray[5] == "cliente" ||
      $urlArray[5] == "salida" ||
      $urlArray[5] == "salidaDetalle" ||
      $urlArray[5] == "obras"){
        include "views/pages/".$urlArray[5]."/".$urlArray[5].".php";
      }
    }else {
      include "views/pages/home/home.php";
    }
    ?>
    
  </div>
  <!-- /.content-wrapper -->
  <?php require"modules/footer.php" ?>

</div>



</body>
</html>
