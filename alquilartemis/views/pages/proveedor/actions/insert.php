<div>
    <div class="card-header">
      <h3 class="card-title">Añadir Empleado</h3>
    </div>
    <form action="proveedor.php" method="post">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Nombre</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Nombre" name="nombre">
          </div>
          <div class="form-group">
            <label for="direccion">Direccion</label>
            <input type="text" class="form-control" id="direccion" placeholder="Enter Direccion" name="direccion">
          </div>
          <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="number" class="form-control" id="telefono" placeholder="Enter Telefono" name="telefono">
          </div>
          <div class="form-group">
            <label for="encargado">Encargado</label>
            <input type="text" class="form-control" id="encargado" placeholder="Enter Encargado" name="encargado">
          </div>
          <div class="form-group">
            <label for="sector">Sector</label>
            <input type="text" class="form-control" id="sector" placeholder="Enter Sector" name="sector">
          </div>
          <div class="form-check">
            <input type="submit" class="btn btn-primary" name="guardar" value="Guardar">
          </div>
        </div>
    </form>
</div>

<?php 
$url = "http://localhost/xampp/var/www/html/php/muerte-x2/apirest/controles/proveedor.php?op=insert"; 
if(isset($_POST['guardar'])){

$datos = [
    'nombre' => $_POST['nombre'],
    'direccion' => $_POST['direccion'],
    'telefono' => $_POST['telefono'],
    'encargado' => $_POST['encargado'],
    'sector' => $_POST['sector']
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

