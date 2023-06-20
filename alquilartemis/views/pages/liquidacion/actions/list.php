<?php $url = "http://localhost/muerte-x2/apirest/controles/liquidacion.php?op=GetAll"; 
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
    $ouput = json_decode(curl_exec($curl));
?>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Datos De Nuestras Liquidaciones</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th># Liquidacion</th>
          <th>Tipo</th>
          <th>Motivo</th>
          <th>Indemnizacion</th>
          <th>Seguridad Social</th>
          <th>Id Empleado</th>
          <th>Empleado</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($ouput as $out){ ?>
        <tr>
          <td><?= $out->id_liquidacion; ?></td>
          <td><?= $out->tipo; ?></td>
          <td><?= $out->motivo; ?></td>
          <td><?= $out->indemnizacion; ?></td>
          <td><?= $out->seguridad_social; ?></td>
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