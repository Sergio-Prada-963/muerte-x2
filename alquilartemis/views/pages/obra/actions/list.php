<?php $url = "http://localhost/xampp/var/www/html/php/muerte-x2/apirest/controles/obra.php?op=GetAll"; 
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
    $ouput = json_decode(curl_exec($curl));
?>
<div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre Obra</th>
                    <th>Constructora</th>
                    <th>Tipo</th>
                    <th>Descripcion</th>
                    <th>Direccion</th>
                    <th>Terreno Metros</th>
                    <th>Id Cliente</th>
                    <th>Nombre Cliente</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($ouput as $out){ ?>
                  <tr>
                    <td><?= $out->obra; ?></td>
                    <td><?= $out->constructora; ?></td>
                    <td><?= $out->tipo; ?></td>
                    <td><?= $out->descripcion; ?></td>
                    <td><?= $out->direccion; ?></td>
                    <td><?= $out->terreno_metros; ?></td>
                    <td><?= $out->id_cliente; ?></td>
                    <td><?= $out->nombre; ?></td>
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