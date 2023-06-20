<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
$entrada = "http://localhost/muerte-x2/apirest/controles/entrada.php?op=GetAll";
$producto = "http://localhost/muerte-x2/apirest/controles/producto.php?op=GetAll";
$obra = "http://localhost/muerte-x2/apirest/controles/obra.php?op=GetAll";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $entrada);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
$idEntrada = json_decode(curl_exec($curl));

curl_setopt($curl, CURLOPT_URL, $producto);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
$idProducto = json_decode(curl_exec($curl));

curl_setopt($curl, CURLOPT_URL, $obra);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
$idObra = json_decode(curl_exec($curl));

?>

<div>
  <div class="card-header">
    <h3 class="card-title">Añadir Detalles de Entrada</h3>
  </div>
  <form action="" method="post">
    <div class="form-group">
      <label for="entrada">Elija la entrada a añadir detalles</label>
      <select name="id_entrada" id="entrada">
        <option>Seleccione entrada</option>
        <?php foreach($idEntrada as $id) { ?>
          <option value="<?= $id->id_entrada; ?>"><?= $id->fecha_entrada; ?></option>
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
      <label for="cantidadS">Cantidad Entrada</label>
      <input type="number" class="form-control" id="cantidadS" placeholder="Enter cantidad de Entrada" name="entrada_cantidad">
    </div>
    <div class="form-group">
      <label for="entrada_cantidad_propia">Cantidad Propia de la Empresa</label>
      <input type="number" class="form-control" id="entrada_cantidad_propia" placeholder="Enter Cantidad Propia" name="entrada_cantidad_propia">
    </div>
    <div class="form-group">
      <label for="entrada_cantidad_subalquilada">Cantidad Subalquilada por otra Empresa</label>
      <input type="number" class="form-control" id="entrada_cantidad_subalquilada" placeholder="Enter cantidad subalquilada" name="entrada_cantidad_subalquilada">
    </div>
    <div class="form-group">
      <label for="estado">Estado del producto o Entrada</label>
      <input type="text" class="form-control" id="estado" placeholder="Enter estado" name="estado">
    </div>
    <div class="form-check">
      <input type="submit" class="btn btn-primary" name="guardar" value="Guardar">
    </div>
  </form>
</div>

<?php 
$url = "http://localhost/muerte-x2/apirest/controles/entradaDetalle.php?op=insert"; 
if(isset($_POST['guardar'])){
$datos = [
  'entrada_cantidad' => $_POST['entrada_cantidad'],
  'entrada_cantidad_propia' => $_POST['entrada_cantidad_propia'],
  'entrada_cantidad_subalquilada' => $_POST['entrada_cantidad_subalquilada'],
  'estado' => $_POST['estado'],
  'id_entrada' => $_POST['id_entrada'],
  'id_producto' => $_POST['id_producto'],
  'id_obra' => $_POST['id_obra']
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