<?php $url = "http://localhost/xampp/var/www/html/php/muerte-x2/apirest/controles/salidaDetalle.php?op=GetAll"; 
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
    $ouput = json_decode(curl_exec($curl));
?>
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Detalles de las salidas registradas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th># salida</th>
                    <th>Nombre Obra</th>
                    <th>Nombre Producto</th>
                    <th>Cantidad Salida</th>
                    <th>Cantidad Propia</th>
                    <th>Cantidad Subalquilada</th>
                    <th>Valor Unitario</th>
                    <th>Fecha StandBy</th>
                    <th>Estado</th>
                    <th>Valor Total</th>
                    <th>Nombre Empleado</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($ouput as $out){ ?>
                  <tr>
                    <td><?= $out->id_salida; ?></td>
                    <td><?= $out->obra; ?></td>
                    <td><?= $out->nombre; ?></td>
                    <td><?= $out->cantidad_salida; ?></td>
                    <td><?= $out->cantidad_propia; ?></td>
                    <td><?= $out->cantidad_subalquilada; ?></td>
                    <td><?= $out->valor_unidad; ?></td>
                    <td><?= $out->fecha_standBy; ?></td>
                    <td><?= $out->estado; ?></td>
                    <td><?= $out->valorTotal; ?></td>
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