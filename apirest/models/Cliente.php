<?php

//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
require_once ("../config/Conectar.php");
class Cliente extends Conectar{

    public function get_cliente(){
        try {
            $conectar=parent::Conexion();
            parent::set_name();
            $stm=$conectar->prepare("SELECT * FROM cliente");
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

    public function insert_cliente($nombre,$documento,$edad, $correo, $direccion){
        $conectar=parent::Conexion();
        parent::set_name();
        $stm="INSERT INTO cliente(nombre,documento,edad,correo,direccion) VALUES(?,?,?,?,?)";
        $stm=$conectar->prepare($stm);
        //$stm->bindValue(1,$id_cliente);
        $stm->bindValue(1,$nombre);
        $stm->bindValue(2,$documento);
        $stm->bindValue(3,$edad);
        $stm->bindValue(4,$correo);
        $stm->bindValue(5,$direccion);
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