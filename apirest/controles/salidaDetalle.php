<?php 

header('Content-Type: application/json');

require_once("../config/Conectar.php");
require_once("../models/SalidaDetalle.php");


$salidaD=new SalidaD();

$body = json_decode(file_get_contents("php://input"), true); 

switch($_GET["op"]){

    case "GetAll":
       $datos=$salidaD->get_salidaD();
       echo json_encode($datos);
    break;

    // case "GetId":

    //     $datos=$clientes->get_cliente_x_id($body["id_cliente"]);
    //     echo json_encode($datos);
  
    // break;


    case "insert":
        
        $datos=$salidaD->insert_salidaD($body["cantidad_salida"],$body["cantidad_propia"],$body["cantidad_subalquilada"],$body["valor_unidad"],$body["fecha_standBy"],$body["estado"],$body["valorTotal"],$body["id_salida"],$body["id_producto"],$body["id_obra"],$body["id_empleado"]);
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