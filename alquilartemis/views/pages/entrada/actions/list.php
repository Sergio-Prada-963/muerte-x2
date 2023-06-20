<?php $url = "http://localhost/muerte-x2/apirest/controles/entrada.php?op=GetAll"; 
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
    $ouput = json_decode(curl_exec($curl));
?>

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Datos de nuestras Entradas</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Fecha Salida</th>
          <th>Hora Salida</th>
          <th>Observaciones</th>
          <th>Id Salida</th>
          <th>Fecha Salida</th>
          <th>Id Cliente</th>
          <th>Nomrbe Cliente</th>
          <th>Id Empleado</th>
          <th>Nombre Empleado</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($ouput as $out){ ?>
        <tr>
          <td><?= $out->fecha_entrada; ?></td>
          <td><?= $out->hora_entrada; ?></td>
          <td><?= $out->observaciones; ?></td>
          <td><?= $out->id_salida; ?></td>
          <td><?= $out->fecha_salida; ?></td>
          <td><?= $out->id_cliente; ?></td>
          <td><?= $out->nombre; ?></td>
          <td><?= $out->id_empleado; ?></td>
          <td><?= $out->nombreEmpleado; ?></td>
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