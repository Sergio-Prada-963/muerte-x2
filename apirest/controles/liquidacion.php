<?php 

header('Content-Type: application/json');

require_once("../config/Conectar.php");
require_once("../models/Liquidacion.php");


$liquidacion=new Liquidacion();

$body = json_decode(file_get_contents("php://input"), true); 

switch($_GET["op"]){

    case "GetAll":
       $datos=$liquidacion->get_liquidacion();
       echo json_encode($datos);
    break;

    // case "GetId":

    //     $datos=$liquidacion->get_liquidacion_x_id($body["id_liquidacion"]);
    //     echo json_encode($datos);
  
    // break;


    case "insert":
        
        $datos=$liquidacion->insert_liquidacion($body["tipo"],$body["motivo"],$body["indemnizacion"],$body["seguridad_social"],$body["id_empleado"]);
        echo json_encode("insertado correctamente");
  
      break;

    // case "update":

    //     $datos=$liquidacion->update_liquidacion($body["id_liquidacion"], $body["nombre"],$body["precio_unitario"],$body["stock"]);
    //     echo json_encode("liquidacion actualizado correctamente");
  
    // break;

    case "delete":
        $datos=$liquidacion->delete_liquidacion($body["id_liquidacion"]);
        echo json_encode("liquidacion eliminada correctamente");
      break;

}

    

?>