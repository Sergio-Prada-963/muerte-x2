<div>
    <div class="card-header">
      <h3 class="card-title">Añadir Empleado</h3>
    </div>
    <form action="" method="post">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Nombre</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Nombre" name="nombre">
          </div>
          <div class="form-group">
            <label for="exampleInputEspecialidad">Documento</label>
            <input type="number" class="form-control" id="exampleInputEspecialidad" placeholder="Enter Documento" name="documento">
          </div>
          <div class="form-group">
            <label for="exampleInputEdad">Cargo</label>
            <input type="text" class="form-control" id="exampleInputEdad" placeholder="Enter Cargo" name="cargo">
          </div>
          <div class="form-group">
            <label for="edad">Edad</label>
            <input type="number" class="form-control" id="edad" placeholder="Enter Edad" name="edad">
          </div>
          <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" class="form-control" id="correo" placeholder="Enter Correo" name="correo">
          </div>
          <div class="form-group">
            <label for="direccion">Direccion</label>
            <input type="text" class="form-control" id="direccion" placeholder="Enter Direccion" name="direccion">
          </div>
          <div class="form-group">
            <label for="salario">Salario</label>
            <input type="text" class="form-control" id="salario" placeholder="Enter salario" name="salario">
          </div>
          <div class="form-check">
            <input type="submit" class="btn btn-primary" name="guardar" value="Guardar">
          </div>
        </div>
    </form>
</div>

<?php 
$url = "http://localhost/xampp/var/www/html/php/muerte-x2/apirest/controles/empleado.php?op=insert"; 
if(isset($_POST['guardar'])){

$datos = [
    'nombre' => $_POST['nombre'],
    'documento' => $_POST['documento'],
    'cargo' => $_POST['cargo'],
    'edad' => $_POST['edad'],
    'correo' => $_POST['correo'],
    'direccion' => $_POST['direccion'],
    'salario' => $_POST['edad']
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

