<?php 

header('Content-Type: application/json');

require_once("../config/Conectar.php");
require_once("../models/Producto.php");


$productos=new Producto();

$body = json_decode(file_get_contents("php://input"), true); 

switch($_GET["op"]){

    case "GetAll":
       $datos=$productos->get_producto();
       echo json_encode($datos);
    break;

    // case "GetId":

    //     $datos=$productos->get_producto_x_id($body["id_producto"]);
    //     echo json_encode($datos);
  
    // break;


    case "insert":
        
        $datos=$productos->insert_producto($body["nombre"],$body["precio_unitario"],$body["stock"],$body["id_proveedor"]);
        echo json_encode("insertado correctamente");
  
      break;

    // case "update":

    //     $datos=$productos->update_producto($body["id_producto"], $body["nombre"],$body["precio_unitario"],$body["stock"]);
    //     echo json_encode("producto actualizado correctamente");
  
    // break;

    // case "delete":

    //     $datos=$productos->delete_producto($body["id_producto"]);
    //     echo json_encode("producto eliminada correctamente");
  
    //   break;

}

    

?>