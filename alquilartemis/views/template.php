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

<!-- DataTables  & Plugins -->
<script src="views/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="views/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="views/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="views/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="views/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="views/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="views/assets/plugins/jszip/jszip.min.js"></script>
<script src="views/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="views/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="views/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="views/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="views/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- SweetAlert2 -->
<script src="views/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- SweetAlert2 -->
<link rel="stylesheet" href="views/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

<!-- Bootstrap 4 -->
<script src="views/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="views/assets/plugins/adminlte/js/adminlte.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php include "modules/navbar.php"; ?>

  <!-- Main Sidebar Container -->
  <?php include "modules/sidebar.php"; ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <?php 
    if(!empty($urlArray[3])){
      if($urlArray[3] == "empleado" ||
      $urlArray[3] == "producto" ||
      $urlArray[3] == "proveedor" ||
      $urlArray[3] == "cliente" ||
      $urlArray[3] == "salida" ||
      $urlArray[3] == "salidaDetalle" ||
      $urlArray[3] == "entrada" ||
      $urlArray[3] == "entradaDetalle" ||
      $urlArray[3] == "obra" ||
      $urlArray[3] == "inventario" ||
      $urlArray[3] == "liquidacion" ){
        include "views/pages/".$urlArray[3]."/".$urlArray[3].".php";
      }
    }else {
      include "views/pages/home/home.php";
    }
    ?>
    
  </div>
  <!-- /.content-wrapper -->
  <?php require "modules/footer.php" ?>

</div>

<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 10000
    });
    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        icon: 'info',
        title: 'Puede que ocurra un error al eliminar debido a que el valor a elimiar puede tener llave foranea y ser utilizado en otro lugar al mimo tiempo.'
      })
    });
  });
</script>

</body>
</html>
