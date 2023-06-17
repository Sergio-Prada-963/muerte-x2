<?php

//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
require_once ("../config/Conectar.php");
class Salida extends Conectar{

    public function get_salida(){
        try {
            $conectar=parent::Conexion();
            parent::set_name();
            $stm=$conectar->prepare("SELECT * FROM salida INNER JOIN cliente ON cliente.id_cliente = salida.id_cliente INNER JOIN empleado ON empleado.id_empleado = salida.id_empleado");
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

    public function insert_salida($fecha_salida, $hora_salida, $subtotal_peso, $placa_transporte, $observaciones, $id_cliente, $id_empleado){
        $conectar=parent::Conexion();
        parent::set_name();
        $stm="INSERT INTO salida(fecha_salida,hora_salida,subtotal_peso,placa_transporte,observaciones,id_cliente,id_empleado) VALUES(?,?,?,?,?,?,?)";
        $stm=$conectar->prepare($stm);
        $stm->bindValue(1,$fecha_salida);
        $stm->bindValue(2,$hora_salida);
        $stm->bindValue(3,$subtotal_peso);
        $stm->bindValue(4,$placa_transporte);
        $stm->bindValue(5,$observaciones);
        $stm->bindValue(6,$id_cliente);
        $stm->bindValue(7,$id_empleado);
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