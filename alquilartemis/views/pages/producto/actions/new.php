<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
$proveedor = "http://localhost/SkylAb-145/Proyects/muerte-x2/apirest/controles/proveedor.php?op=GetAll";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $proveedor);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
$idProveedor = json_decode(curl_exec($curl));
?>

<div>
    <div class="card-header">
      <h3 class="card-title">Añadir producto</h3>
    </div>
    <form action="" method="post">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Nombre</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Nombre" name="nombre">
          </div>
          <div class="form-group">
            <label for="exampleInputPrecio_unitario">Precio unitario</label>
            <input type="number" class="form-control" id="exampleInputPrecio_unitario" placeholder="Ingrese precio unitario" name="precio_unitario">
          </div>
          <div class="form-group">
            <label for="exampleInputStock">stock</label>
            <input type="number" class="form-control" id="exampleInputStock" placeholder="Ingrese Stock" name="stock">
          </div>
          <div class="form-group">
            <label for="id_proveedor">Proveedor</label>
            <select name="id_proveedor" id="proveedor">
              <option>Seleccione un proveedor</option>
            <?php foreach($idProveedor as $id){ ?>
              <option value="<?= $id->id_proveedor ?>"><?= $id->nombreProveedor ?></option>
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
$url = "http://localhost/SkylAb-145/Proyects/muerte-x2/apirest/controles/producto.php?op=insert"; 
if(isset($_POST['guardar'])){

$datos = [
    'nombre' => $_POST['nombre'],
    'precio_unitario' => $_POST['precio_unitario'],
    'stock' => $_POST['stock'],
    'id_proveedor' => $_POST['id_proveedor']

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