<?php

//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
require_once ("../config/Conectar.php");
class SalidaD extends Conectar{

    public function get_salidaD(){
        try {
            $conectar=parent::Conexion();
            parent::set_name();
            $stm=$conectar->prepare("SELECT * FROM salida_detalle INNER JOIN salida ON salida.id_salida = salida_detalle.id_salida INNER JOIN producto ON producto.id_producto = salida_detalle.id_producto INNER JOIN obra ON obra.id_obra = salida_detalle.id_obra INNER JOIN empleado ON empleado.id_empleado = salida_detalle.id_empleado");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            return $e->getMessage();
        }
        
    }
    // public function get_cliente_id($id_cliente){
    //     try {
    //         $conectar=parent::Conexion();
    //         parent::set_name();
    //         $stm=$conectar->prepare("SELECT * FROM pacientes WHERE id_cliente=?");
    //         $stm->bindValue(1,$id_cliente);
    //         $stm->execute();
    //         return $stm->fetchAll(PDO::FETCH_ASSOC);
    //     } catch (Exception $e) {
    //         return $e->getMessage();
    //     }
    // }

    public function insert_salidaD($cantidad_salida,$cantidad_propia,$cantidad_subalquilada,$valor_unidad,$fecha_standBy,$estado,$valorTotal,$id_salida,$id_producto,$id_obra,$id_empleado){
        $conectar=parent::Conexion();
        parent::set_name();
        $stm="INSERT INTO salida_detalle(cantidad_salida,cantidad_propia,cantidad_subalquilada,valor_unidad,fecha_standBy,estado,valorTotal,id_salida,id_producto,id_obra,id_empleado) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        $stm=$conectar->prepare($stm);
        $stm->bindValue(1,$cantidad_salida);
        $stm->bindValue(2,$cantidad_propia);
        $stm->bindValue(3,$cantidad_subalquilada);
        $stm->bindValue(4,$valor_unidad);
        $stm->bindValue(5,$fecha_standBy);
        $stm->bindValue(6,$estado);
        $stm->bindValue(7,$valorTotal);
        $stm->bindValue(8,$id_salida);
        $stm->bindValue(9,$id_producto);
        $stm->bindValue(10,$id_obra);
        $stm->bindValue(11,$id_empleado);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);

    }

    // public function update_cliente($id_cliente,$nombre,$documento,$edad){
    //     $conectar=parent::conexion();
    //     parent::set_name();
    //     $sql="UPDATE clientes set  nombre, documento, edad  WHERE id_cliente=?";
    //     $sql=$conectar->prepare($sql);
        
    //     $sql->bindValue(1,$nombre);
    //     $sql->bindValue(2,$documento);
    //     $sql->bindValue(3,$edad);
    //     $sql->bindValue(4,$id_cliente);
    //     $sql->execute();
    //     return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);


    // }
    
    // public function delete_pasicologa($id_cliente){
    //     $conectar=parent::conexion();
    //     parent::set_name();
    //     $sql="DELETE FROM pacientes WHERE id_cliente=?";
    //     $sql=$conectar->prepare($sql);
    //     $sql->bindValue(1,$id_cliente);
    //     $sql->execute();
    //     return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    // }

}

?>