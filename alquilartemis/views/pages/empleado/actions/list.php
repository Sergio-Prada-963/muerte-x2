<?php ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);?>

<?php $url = "http://localhost/SkylAb-145/Proyects/muerte-x2/apirest/controles/empleado.php?op=GetAll"; 
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
    $ouput = json_decode(curl_exec($curl));
?>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Datos de nuestros Empleado</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Nombre</th>
        <th>Documento</th>
        <th>Cargo</th>
        <th>Edad</th>
        <th>Correo</th>
        <th>Direccion</th>
        <th>Salario</th>
      </tr>
      </thead>
      <tbody>
        <?php foreach($ouput as $out){ ?>
      <tr>
        <td><?= $out->nombreEmpleado; ?></td>
        <td><?= $out->documento; ?></td>
        <td><?= $out->cargo; ?></td>
        <td><?= $out->edad; ?></td>
        <td><?= $out->correo; ?></td>
        <td><?= $out->direccion; ?></td>
        <td><?= $out->salario; ?></td>
      </tr>
      <?php } ?>
      </tbody>
      <tfoot>
     
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>