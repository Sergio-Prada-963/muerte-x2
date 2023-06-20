<?php ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);?>

<?php $empleados = "http://localhost/muerte-x2/apirest/controles/empleado.php?op=GetAll"; 
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $empleados);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
    $idEmpleados = json_decode(curl_exec($curl));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="cajaLogin">
        <div class="welcome">
            <h2>Bienvenid@ al Login</h2>
        </div>
        <form action="" method="post">
            <div class="login">
                <label for="usuario">Nombre Usuario...</label>
                <input type="text" placeholder="Usuario" name="usuario">
                <label for="contraseña">Contraseña...</label>
                <input type="password" placeholder="Contraseña" name="contraseña">
            </div>
            <div class="botones">
                <button type="submit" class="btn btn-secondary" name="ingresar">Ingresa</button>
                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Registrate</button>
            </div>
        </form>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content" style="background-color: gray;">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Registro Nuevo Usuario</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="id_empleado" class="form-label">Selecciona quien eres</label>
                    <select name="id_empleado" id="id_empleado">
                        <option value="">Seleccionar empleado</option>
                        <?php foreach($idEmpleados as $id) { ?>
                            <option value="<?= $id->id_empleado; ?>"><?= $id->nombreEmpleado; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuario" placeholder=Digite su usuario" style="background-color: transparent;" name="usuario">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="contraseña" >Contraseña</label>
                    <input type="password" class="form-control" id="contraseña" placeholder="Ingrese la Nueva Contraseña" style="background-color: transparent;" name="contraseña">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tipo_user" >Tipo Usuario</label>
                    <select name="tipo_user" id="tipo_user">
                        <option value="">Seleccione el rango</option>
                        <option value="empleado">EMPLEADO</option>
                        <option value="administrador">ADMINISTRADOR</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
<?php 
    $url = "http://localhost/muerte-x2/apirest/controles/users.php?op=insert"; 
    if(isset($_POST['registrar'])){
    
    $datos = [
        'id_empleado' => $_POST['id_empleado'],
        'usuario' => $_POST['usuario'],
        'contraseña' => $_POST['contraseña'],
        'tipo_user' => $_POST['tipo_user']
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
<?php 
    $user = "http://localhost/muerte-x2/apirest/controles/users.php?op=GetAll"; 
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $user);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
    $idUser = json_decode(curl_exec($curl));
    if(isset($_POST['ingresar'])){
        foreach($idUser as $id){
            if($id->usuario == $_POST["usuario"] && $id->contraseña == $_POST["contraseña"]){
                echo "<script> alert('Bienvenido...'); document.location='../../alquilartemis'</script>";
            }
        }
    }
?>