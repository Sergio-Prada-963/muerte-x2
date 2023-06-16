<?php 

header('Content-Type: application/json');

require_once("../config/Conectar.php");
require_once("../models/Empleado.php");



$empleado =new Empleado();

$body = json_decode(file_get_contents("php://input"), true); 

switch($_GET["op"]){

    case "GetAll":
       $datos=$empleado->get_empleado();
       echo json_encode($datos);
    break;

    /* case "GetId":

        $datos=$empleado->get_empleado_x_id($body["id"]);
        echo json_encode($datos);
  
    break; */


    case "insert":

        $datos=$empleado->insert_empleado($body["nombre"],$body["documento"],$body["cargo"] ,$body["edad"] ,$body["correo"], $body["direccion"] , $body["salario"]);
        echo json_encode("insertado correctamente");
  
      break;

    /* case "update":

        $datos=$empleado->update_empleado($body["id_empleado"], $body["nombre"],$body["documento"],$body["cargo"] ,$body["edad"] ,$body["correo"], $body["direccion"] , $body["salario"]);
        echo json_encode("empleado actualizado correctamente");
  
    break; */

    /* case "delete":

        $datos=$empleado->delete_empleado($body["id_empleado"]);
        echo json_encode("empleado eliminado correctamente");
  
      break; */

}

    

?>