<?php $url = "http://localhost/muerte-x2/apirest/controles/entradaDetalle.php?op=GetAll";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
    $ouput = json_decode(curl_exec($curl));
?>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Detalles de las entradas registradas</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Cantidad entrada</th>
          <th>Cantidad entrada Propia</th>
          <th>Cantidad entrada Subalquilada</th>
          <th>Estado</th>
          <th>Id Entrada</th>
          <th>Producto</th>
          <th>Obra</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($ouput as $out){ ?>
        <tr>
          <td><?= $out->entrada_cantidad; ?></td>
          <td><?= $out->entrada_cantidad_propia; ?></td>
          <td><?= $out->entrada_cantidad_subalquilada; ?></td>
          <td><?= $out->estado; ?></td>
          <td><?= $out->id_entrada; ?></td>
          <td><?= $out->nombre; ?></td>
          <td><?= $out->obra; ?></td>
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