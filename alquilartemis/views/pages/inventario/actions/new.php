<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
$producto = "http://localhost/muerte-x2/apirest/controles/producto.php?op=GetAll";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $producto);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
$idProducto = json_decode(curl_exec($curl));
?>

<div>
  <div class="card-header">
    <h3 class="card-title">Añadir Inventario</h3>
  </div>
  <form action="" method="post">
    <div class="card-body">
      <div class="form-group">
        <label for="cantidadInicial">Cantidad Inicial</label>
        <input type="text" class="form-control" id="cantidadInicial" placeholder="Ingrese cantidad inicial" name="cantidad_inicial">
      </div>
      <div class="form-group">
        <label for="exampleInputcantidad_ingresos">Cantidad Ingresos</label>
        <input type="number" class="form-control" id="exampleInputcantidad_ingresos" placeholder="Ingrese precio unitario" name="cantidad_ingresos">
      </div>
      <div class="form-group">
        <label for="exampleInputcantidad_salidas">Cantidad Salidas</label>
        <input type="number" class="form-control" id="exampleInputcantidad_salidas" placeholder="Ingrese cantidad salidas" name="cantidad_salidas">
      </div>
      <div class="form-group">
        <label for="exampleInputcantidad_final">Cantidad Final</label>
        <input type="number" class="form-control" id="exampleInputcantidad_final" placeholder="Ingrese cantidad final" name="cantidad_final">
      </div>
      <div class="form-group">
        <label for="exampleInputfecha_inventario">Fecha Inventario</label>
        <input type="date" class="form-control" id="exampleInputfecha_inventario" placeholder="Ingrese fecha inventario" name="fecha_inventario">
      </div>
      <div class="form-group">
        <label for="exampleInputtipo_operacion">Tipo Operacion</label>
        <input type="text" class="form-control" id="exampleInputtipo_operacion" placeholder="Ingrese tipo operacion" name="tipo_operacion">
      </div>
      <div class="form-group">
        <label for="id_producto">Producto</label>
        <select name="id_producto" id="producto">
          <option>Seleccione Producto</option>
        <?php foreach($idProducto as $id){ ?>
          <option value="<?= $id->id_producto ?>"><?= $id->nombre ?></option>
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
$url = "http://localhost/muerte-x2/apirest/controles/inventario.php?op=insert"; 
if(isset($_POST['guardar'])){
$datos = [
    'cantidad_inicial' => $_POST['cantidad_inicial'],
    'cantidad_ingresos' => $_POST['cantidad_ingresos'],
    'cantidad_salidas' => $_POST['cantidad_salidas'],
    'cantidad_final' => $_POST['cantidad_final'],
    'fecha_inventario' => $_POST['fecha_inventario'],
    'tipo_operacion' => $_POST['tipo_operacion'],
    'id_producto' => $_POST['id_producto']
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