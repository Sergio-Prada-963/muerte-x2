<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
$cliente = "http://localhost/xampp/var/www/html/php/muerte-x2/apirest/controles/cliente.php?op=GetAll";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $cliente);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
$idCliente = json_decode(curl_exec($curl));

$empleado = "http://localhost/xampp/var/www/html/php/muerte-x2/apirest/controles/empleado.php?op=GetAll";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $empleado);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
$idEmpleado = json_decode(curl_exec($curl));
?>
<div>
    <div class="card-header">
      <h3 class="card-title">Añadir Salida</h3>
    </div>
    <form action="" method="post">
        <div class="card-body">
          <div class="form-group">
            <label for="fachaSalida">Fecha Salida</label>
            <input type="date" class="form-control" id="fachaSalida" name="fecha_salida">
          </div>
          <div class="form-group">
            <label for="honraSalida">Hora Salida</label>
            <input type="time" class="form-control" id="honraSalida" name="hora_salida">
          </div>
          <div class="form-group">
            <label for="subtotal_peso">Subtotal de Peso</label>
            <input type="number" class="form-control" id="subtotal_peso" placeholder="subtotal en kilos" name="subtotal_peso">
          </div>
          <div class="form-group">
            <label for="placaTransporte">Plata del transporte</label>
            <input type="text" class="form-control" id="placaTransporte" placeholder="Enter Descripcion" name="placa_transporte">
          </div>
          <div class="form-group">
            <label for="observaciones">Observaciones de la Salida</label>
            <input type="text" class="form-control" id="observaciones" placeholder="Enter Observacion" name="observaciones">
          </div>
          <div class="form-group">
            <label for="idEmpleado">Seleccione Empleado</label>
            <select name="id_empleado" id="idEmpleado">
                <?php foreach($idEmpleado as $id) { ?>
                    <option value="<?= $id->id_empleado?>"><?= $id->nombreEmpleado?></option>
                <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="idCliente">Cliente</label>
            <select name="id_cliente" id="idCliente">
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
$url = "http://localhost/xampp/var/www/html/php/muerte-x2/apirest/controles/salida.php?op=insert"; 
if(isset($_POST['guardar'])){

$datos = [
    'fecha_salida' => $_POST['fecha_salida'],
    'hora_salida' => $_POST['hora_salida'],
    'subtotal_peso' => $_POST['subtotal_peso'],
    'placa_transporte' => $_POST['placa_transporte'],
    'observaciones' => $_POST['observaciones'],
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

