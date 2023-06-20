<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
$empleado = "http://localhost/muerte-x2/apirest/controles/empleado.php?op=GetAll";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $empleado);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
$idEmpleado = json_decode(curl_exec($curl));
?>

<div>
  <div class="card-header">
    <h3 class="card-title">Añadir Inventario</h3>
  </div>
  <form action="" method="post">
    <div class="card-body">
      <div class="form-group">
        <label for="tipo">Tipo</label>
        <input type="text" class="form-control" id="tipo" placeholder="Ingrese tipo" name="tipo">
      </div>
      <div class="form-group">
        <label for="motivo">Motivo</label>
        <input type="text" class="form-control" id="motivo" placeholder="Ingrese Motivo" name="motivo">
      </div>
      <div class="form-group">
        <label for="indemnizacion">Indemnizacion</label>
        <input type="number" class="form-control" id="indemnizacion" placeholder="Ingrese Indemnizacion" name="indemnizacion">
      </div>
      <div class="form-group">
        <label for="seguridad_social">Seguridad Social</label>
        <input type="text" class="form-control" id="seguridad_social" placeholder="Ingrese Seguridad Social" name="seguridad_social">
      </div>
      <div class="form-group">
        <label for="id_empleado">Empleado</label>
        <select name="id_empleado" id="empleado">
          <option>Seleccione Empleado</option>
        <?php foreach($idEmpleado as $id){ ?>
          <option value="<?= $id->id_empleado ?>"><?= $id->nombreEmpleado ?></option>
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
$url = "http://localhost/muerte-x2/apirest/controles/liquidacion.php?op=insert"; 
if(isset($_POST['guardar'])){

$datos = [
    'tipo' => $_POST['tipo'],
    'motivo' => $_POST['motivo'],
    'indemnizacion' => $_POST['indemnizacion'],
    'seguridad_social' => $_POST['seguridad_social'],
    'id_empleado' => $_POST['id_empleado']
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