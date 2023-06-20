<?php 

header('Content-Type: application/json');

require_once("../config/Conectar.php");
require_once("../models/EntradaDetalle.php");


$entradaD=new EntradaD();

$body = json_decode(file_get_contents("php://input"), true); 

switch($_GET["op"]){

    case "GetAll":
       $datos=$entradaD->get_entradaD();
       echo json_encode($datos);
    break;

    case "GetAllDe":
      $datos=$entradaD->get_entradaDe();
      echo json_encode($datos);
   break;
    // case "GetId":

    //     $datos=$clientes->get_cliente_x_id($body["id_cliente"]);
    //     echo json_encode($datos);
  
    // break;


    case "insert":
        
        $datos=$entradaD->insert_entradaD($body["entrada_cantidad"],$body["entrada_cantidad_propia"],$body["entrada_cantidad_subalquilada"],$body["estado"],$body["id_entrada"],$body["id_producto"],$body["id_obra"]);
        echo json_encode("insertado correctamente");
  
      break;

    // case "update":

    //     $datos=$clientes->update_cliente($body["id_cliente"], $body["nombre"],$body["documento"],$body["edad"]);
    //     echo json_encode("cliente actualizado correctamente");
  
    // break;

    case "delete":
        $datos=$entradaD->delete_entradaD($body["id_entradaD"]);
        echo json_encode("Detalles de Entrada eliminados correctamente");
      break;

}

    

?>