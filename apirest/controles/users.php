<?php 

header('Content-Type: application/json');

require_once("../config/Conectar.php");
require_once("../models/Users.php");


$users=new Usuario();

$body = json_decode(file_get_contents("php://input"), true); 

switch($_GET["op"]){

    case "GetAll":
       $datos=$users->get_usuario();
       echo json_encode($datos);
    break;

    case "insert":
        
        $datos=$users->insert_usuario($body["id_empleado"],$body["usuario"],$body["contraseña"],$body["tipo_user"]);
  
      break;

    case "delete":

      $datos=$users->delete_usuario($body["id_usuario"]);
      echo json_encode("usuario eliminado correctamente");
    break;

}

    

?>