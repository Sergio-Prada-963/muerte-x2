<?php 

header('Content-Type: application/json');

require_once("../config/Conectar.php");
require_once("../models/Inventario.php");


$inventario=new Inventario();

$body = json_decode(file_get_contents("php://input"), true); 

switch($_GET["op"]){

    case "GetAll":
       $datos=$inventario->get_inventario();
       echo json_encode($datos);
    break;

    // case "GetId":

    //     $datos=$inventario->get_inventario_x_id($body["id_inventario"]);
    //     echo json_encode($datos);
  
    // break;


    case "insert":
        
        $datos=$inventario->insert_inventario($body["cantidad_inicial"],$body["cantidad_ingresos"],$body["cantidad_salidas"],$body["cantidad_final"],$body["fecha_inventario"],$body["tipo_operacion"],$body["id_producto"]);
        echo json_encode("insertado correctamente");
  
      break;

    // case "update":

    //     $datos=$inventario->update_inventario($body["id_inventario"], $body["nombre"],$body["precio_unitario"],$body["stock"]);
    //     echo json_encode("inventario actualizado correctamente");
  
    // break;

    case "delete":
        $datos=$inventario->delete_inventario($body["id_inventario"]);
        echo json_encode("inventario eliminada correctamente");
      break;

}

    

?>