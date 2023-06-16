<?php 

header('Content-Type: application/json');

require_once("../config/Conectar.php");
require_once("../models/Proveedor.php");


$proveedor=new Proveedor();

$body = json_decode(file_get_contents("php://input"), true); 

switch($_GET["op"]){

    case "GetAll":
       $datos=$proveedor->get_proveedor();
       echo json_encode($datos);
    break;

    // case "GetId":

    //     $datos=$clientes->get_cliente_x_id($body["id_cliente"]);
    //     echo json_encode($datos);
  
    // break;


    case "insert":
        
        $datos=$proveedor->insert_proveedor($body["nombre"],$body["direccion"],$body["telefono"],$body["encargado"],$body["sector"]);
        echo json_encode("insertado correctamente");
  
      break;

    // case "update":

    //     $datos=$clientes->update_cliente($body["id_cliente"], $body["nombre"],$body["documento"],$body["edad"]);
    //     echo json_encode("cliente actualizado correctamente");
  
    // break;

    // case "delete":

    //     $datos=$clientes->delete_cliente($body["id_cliente"]);
    //     echo json_encode("cliente eliminada correctamente");
  
    //   break;

}

    

?>