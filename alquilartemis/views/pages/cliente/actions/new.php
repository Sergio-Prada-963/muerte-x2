<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
?>

<div>
    <div class="card-header">
      <h3 class="card-title">Añadir Cliente</h3>
    </div>
    <form action="" method="post">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Nombre</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Nombre" name="nombre">
          </div>
          <div class="form-group">
            <label for="exampleInputDocumento">documento</label>
            <input type="number" class="form-control" id="exampleInputDocumento" placeholder="Ingrese Documento" name="documento">
          </div>
          <div class="form-group">
            <label for="exampleInputEdad">Edad</label>
            <input type="number" class="form-control" id="exampleInputEdad" placeholder="Ingrese Edad" name="edad">
          </div>
          <div class="form-group">
            <label for="exampleInputcorreo">Correo</label>
            <input type="text" class="form-control" id="exampleInputcorreo" placeholder="Ingrese Correo" name="correo">
          </div>
          <div class="form-group">
            <label for="exampleInputDireccion">Direccion</label>
            <input type="text" class="form-control" id="exampleInputDireccion" placeholder="Ingrese Direccion" name="direccion">
          </div>
          <div class="form-check">
            <input type="submit" class="btn btn-primary" name="guardar" value="Guardar">
          </div>
        </div>
    </form>
</div>

<?php 
$url = "http://localhost/xampp/var/www/html/php/muerte-x2/apirest/controles/cliente.php?op=insert"; 
if(isset($_POST['guardar'])){

$datos = [
    'nombre' => $_POST['nombre'],
    'documento' => $_POST['documento'],
    'edad' => $_POST['edad'],
    'correo' => $_POST['correo'],
    'direccion' => $_POST['direccion']

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