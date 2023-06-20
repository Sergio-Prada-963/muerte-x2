<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
$cliente = "http://localhost/SkylAb-145/Proyects/muerte-x2/apirest/controles/cliente.php?op=GetAll";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $cliente);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
$idCliente = json_decode(curl_exec($curl));

$empleado = "http://localhost/SkylAb-145/Proyects/muerte-x2/apirest/controles/empleado.php?op=GetAll";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $empleado);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
$idEmpleado = json_decode(curl_exec($curl));

$salida = "http://localhost/SkylAb-145/Proyects/muerte-x2/apirest/controles/salida.php?op=GetAll";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $salida);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
$idSalida = json_decode(curl_exec($curl));

?>
<div>
  <div class="card-header">
    <h3 class="card-title">Añadir Entrada</h3>
  </div>
  <form action="" method="post">
  <div class="form-group">
    <div class="card-body">
        <input type="date" class="form-control" id="fachaEntrada" name="fecha_entrada">
          <label for="fachaEntrada">Fecha Entrada</label>
      </div>
      <div class="form-group">
        <label for="horaEntrada">Hora Entrada</label>
        <input type="time" class="form-control" id="horaEntrada" name="hora_entrada">
      </div>
      <div class="form-group">
        <label for="observaciones">Observaciones de la Entrada</label>
        <input type="text" class="form-control" id="observaciones" placeholder="Enter Observacion" name="observaciones">
      </div>
      <div class="form-group">
        <label for="idSalida">Seleccione # Salida</label>
        <select name="id_salida" id="idSalida">
          <option>Seleccione # salida</option>
            <?php foreach($idSalida as $id) { ?>
                <option value="<?= $id->id_salida?>"><?= $id->id_salida?></option>
            <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="idEmpleado">Seleccione Empleado</label>
        <select name="id_empleado" id="idEmpleado">
          <option>Seleccione Empleado</option>
            <?php foreach($idEmpleado as $id) { ?>
                <option value="<?= $id->id_empleado?>"><?= $id->nombreEmpleado?></option>
            <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="idCliente">Cliente</label>
        <select name="id_cliente" id="idCliente">
          <option>Seleccione Cliente</option>
          <?php foreach($idCliente as $id) { ?>
            <option value="<?= $id->id_cliente ?>"><?= $id->nombre ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-check">
        <input type="submit" class="btn btn-primary" name="guardar" value="Guardar">
      </div>
    </div>
  </form>
</div>

<?php 
$url = "http://localhost/SkylAb-145/Proyects/muerte-x2/apirest/controles/entrada.php?op=insert"; 
if(isset($_POST['guardar'])){

$datos = [
    'fecha_entrada' => $_POST['fecha_entrada'],
    'hora_entrada' => $_POST['hora_entrada'],
    'observaciones' => $_POST['observaciones'],
    'id_salida' => $_POST['id_salida'],
    'id_empleado' => $_POST['id_empleado'],
    'id_cliente' => $_POST['id_cliente']
];

$curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($datos));
    $response = curl_exec($curl);
    curl_close($curl);
    var_dump($response);
}
?>