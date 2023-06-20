<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
$salida = "http://localhost/SkylAb-145/Proyects/muerte-x2/apirest/controles/salida.php?op=GetAll";
$producto = "http://localhost/SkylAb-145/Proyects/muerte-x2/apirest/controles/producto.php?op=GetAll";
$obra = "http://localhost/SkylAb-145/Proyects/muerte-x2/apirest/controles/obra.php?op=GetAll";
$empleado = "http://localhost/SkylAb-145/Proyects/muerte-x2/apirest/controles/empleado.php?op=GetAll";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $salida);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
$idSalida = json_decode(curl_exec($curl));

curl_setopt($curl, CURLOPT_URL, $producto);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
$idProducto = json_decode(curl_exec($curl));

curl_setopt($curl, CURLOPT_URL, $obra);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
$idObra = json_decode(curl_exec($curl));

curl_setopt($curl, CURLOPT_URL, $empleado);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
$idEmpleado = json_decode(curl_exec($curl));
?>

<div>
  <div class="card-header">
    <h3 class="card-title">Añadir Detalles de salida</h3>
  </div>
  <form action="" method="post">
    <div class="card-body">
      <div class="form-group">
        <label for="salida">Elija la salida a añadir detalles</label>
       <select name="id_salida" id="salida">
         <option>Seleccione # salida</option>
        <?php foreach($idSalida as $id) { ?>
        <option value="<?= $id->id_salida; ?>"><?= $id->id_salida; ?></option>
        <?php } ?>
       </select>
      </div>
      <div class="form-group">
        <label for="producto">Elija el Producto</label>
        <select name="id_producto" id="producto">
          <option>Seleccione Producto</option>
          <?php foreach($idProducto as $id) { ?>
            <option value="<?= $id->id_producto; ?>"><?= $id->nombre; ?></option>
          <?php } ?>
       </select>
      </div>
      <div class="form-group">
        <label for="obra">Elija la Obra</label>
        <select name="id_obra" id="obra">
          <option>Seleccione Obra</option>
          <?php foreach($idObra as $id) { ?>
            <option value="<?= $id->id_obra; ?>"><?= $id->obra; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="empleado">Empleado que realiza el servicio</label>
        <select name="id_empleado" id="empleado">
          <option>Seleccione Empleado</option>
          <?php foreach($idEmpleado as $id){ ?>
            <option value="<?= $id->id_empleado; ?>"><?= $id->nombreEmpleado; ?></option>
          <?php } ?>
        </select>
      </div>
      <label for="cantidadS">Cantidad Salida</label>
      <div class="form-group">
      </div>
        <input type="number" class="form-control" id="cantidadS" placeholder="Enter cantidad de Salida" name="cantidad_salida">
      <label for="cantidad_propia">Cantidad Propia de la Empresa</label>
      <div class="form-group">
      </div>
        <input type="number" class="form-control" id="cantidad_propia" placeholder="Enter Cantidad Propia" name="cantidad_propia">
      <label for="cantidad_subalquilada">Cantidad Subalquilada por otra Empresa</label>
      <div class="form-group">
      </div>
        <input type="number" class="form-control" id="cantidad_subalquilada" placeholder="Enter cantidad subalquilada" name="cantidad_subalquilada">
      <label for="valor_unidad">Valor Unitario del producto</label>
      <div class="form-group">
      </div>
        <input type="number" class="form-control" id="valor_unidad" placeholder="Enter valor Unitario" name="valor_unidad">
      <label for="fecha_standBy">Fecha StandBy de la Salida</label>
      <div class="form-group">
      </div>
        <input type="date" class="form-control" id="fecha_standBy" placeholder="Enter fecha standBy" name="fecha_standBy">
      <label for="estado">Estado del producto o salida</label>
      <div class="form-group">
      </div>
        <input type="text" class="form-control" id="estado" placeholder="Enter estado" name="estado">
      <input type="submit" class="btn btn-primary" name="guardar" value="Guardar">
      <div class="form-check">
      </div>
        </div>
  </form>
</div>

<?php 
$url = "http://localhost/SkylAb-145/Proyects/muerte-x2/apirest/controles/salidaDetalle.php?op=insert"; 
if(isset($_POST['guardar'])){
$total = ($_POST['cantidad_salida'] + $_POST['valor_unidad']);
$datos = [
    'id_salida' => $_POST['id_salida'],
    'id_producto' => $_POST['id_producto'],
    'id_obra' => $_POST['id_obra'],
    'id_empleado' => $_POST['id_empleado'],
    'cantidad_salida' => $_POST['cantidad_salida'],
    'cantidad_propia' => $_POST['cantidad_propia'],
    'cantidad_subalquilada' => $_POST['cantidad_subalquilada'],
    'valor_unidad' => $_POST['valor_unidad'],
    'fecha_standBy' => $_POST['fecha_standBy'],
    'estado' => $_POST['estado'],
    'valorTotal' => $total
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