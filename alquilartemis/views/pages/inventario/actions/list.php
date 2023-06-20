<?php $url = "http://localhost/SkylAb-145/Proyects/muerte-x2/apirest/controles/inventario.php?op=GetAll"; 
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
    $ouput = json_decode(curl_exec($curl));
?>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Datos de Nuestro Inventario</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Cantidad Inicial</th>
          <th>Cantidad Ingresos</th>
          <th>Cantidad Salidas</th>
          <th>Cantidad Final</th>
          <th>Fecha Inventario</th>
          <th>Tipo Operacion</th>
          <th>Id Producto</th>
          <th>Producto</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($ouput as $out){ ?>
        <tr>
          <td><?= $out->cantidad_inicial; ?></td>
          <td><?= $out->cantidad_ingresos; ?></td>
          <td><?= $out->cantidad_salidas; ?></td>
          <td><?= $out->cantidad_final; ?></td>
          <td><?= $out->fecha_inventario; ?></td>
          <td><?= $out->tipo_operacion; ?></td>
          <td><?= $out->id_producto; ?></td>
          <td><?= $out->nombre ?></td>
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