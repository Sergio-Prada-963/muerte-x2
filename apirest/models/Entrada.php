<?php

//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
require_once ("../config/Conectar.php");
class Entrada extends Conectar{

    public function get_entrada(){
        try {
            $conectar=parent::Conexion();
            parent::set_name();
            $stm=$conectar->prepare("SELECT * FROM entrada INNER JOIN salida ON salida.id_salida = entrada.id_salida INNER JOIN cliente ON cliente.id_cliente = entrada.id_cliente INNER JOIN empleado ON empleado.id_empleado = entrada.id_empleado");
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

    public function insert_entrada($fecha_entrada, $hora_entrada, $observaciones, $id_salida, $id_cliente, $id_empleado){
        $conectar=parent::Conexion();
        parent::set_name();
        $stm="INSERT INTO entrada(fecha_entrada,hora_entrada,observaciones,id_salida,id_cliente,id_empleado) VALUES(?,?,?,?,?,?)";
        $stm=$conectar->prepare($stm);  
        $stm->bindValue(1,$fecha_entrada);
        $stm->bindValue(2,$hora_entrada);
        $stm->bindValue(3,$observaciones);
        $stm->bindValue(4,$id_salida);
        $stm->bindValue(5,$id_empleado);
        $stm->bindValue(6,$id_cliente);
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
    
    public function delete_entrada($id_entrada){
        $conectar=parent::conexion();
        parent::set_name();
        $sql="DELETE FROM entrada WHERE id_entrada=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_entrada);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>