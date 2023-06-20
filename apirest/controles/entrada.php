<?php 

header('Content-Type: application/json');

require_once("../config/Conectar.php");
require_once("../models/Entrada.php");


$entrada=new Entrada();

$body = json_decode(file_get_contents("php://input"), true); 

switch($_GET["op"]){

    case "GetAll":
       $datos=$entrada->get_entrada();
       echo json_encode($datos);
    break;

    // case "GetId":

    //     $datos=$clientes->get_cliente_x_id($body["id_cliente"]);
    //     echo json_encode($datos);
  
    // break;


    case "insert":
        
        $datos=$entrada->insert_entrada($body["fecha_entrada"],$body["hora_entrada"],$body["observaciones"],$body["id_salida"],$body["id_empleado"],$body["id_cliente"]);
        echo json_encode("insertado correctamente");
  
      break;

    // case "update":

    //     $datos=$clientes->update_cliente($body["id_cliente"], $body["nombre"],$body["documento"],$body["edad"]);
    //     echo json_encode("cliente actualizado correctamente");
  
    // break;

    case "delete":
        $datos=$entrada->delete_entrada($body["id_entrada"]);
        echo json_encode("entrada eliminada correctamente");
      break;

}

    

?>