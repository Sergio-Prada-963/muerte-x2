<?php

//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
require_once ("../config/Conectar.php");
class Usuario extends Conectar{

    public function get_usuario(){
        try {
            $conectar=parent::Conexion();
            parent::set_name();
            $stm=$conectar->prepare("SELECT * FROM users");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            return $e->getMessage();
        }
        
    }

    public function insert_usuario($id_empleado,$usuario,$contraseña,$tipo_user){
        $conectar=parent::Conexion();
        parent::set_name();
        $stm="INSERT INTO users(id_empleado,usuario,contraseña,tipo_user) VALUES(?,?,?,?)";
        $stm=$conectar->prepare($stm);
        //$stm->bindValue(1,$id_cliente);
        $stm->bindValue(1,$id_empleado);
        $stm->bindValue(2,$usuario);
        $stm->bindValue(3,$contraseña);
        $stm->bindValue(4,$tipo_user);
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
    
    public function delete_usuario($id_user){
        $conectar=parent::conexion();
        parent::set_name();
        $sql="DELETE FROM users WHERE id_user=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_user);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>