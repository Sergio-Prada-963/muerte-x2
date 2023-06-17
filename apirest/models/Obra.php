<?php

//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
require_once ("../config/Conectar.php");
class Obra extends Conectar{

    public function get_obra(){
        try {
            $conectar=parent::Conexion();
            parent::set_name();
            $stm=$conectar->prepare("SELECT * FROM obra INNER JOIN cliente ON cliente.id_cliente = obra.id_obra");
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

    public function insert_obra($obra,$constructora,$tipo,$descripcion,$direccion,$terreno_metros,$id_cliente){
        $conectar=parent::Conexion();
        parent::set_name();
        $stm="INSERT INTO obra(obra,constructora,tipo,descripcion,direccion,terreno_metros,id_cliente) VALUES(?,?,?,?,?,?,?)";
        $stm=$conectar->prepare($stm);
        //$stm->bindValue(1,$id_cliente);
        $stm->bindValue(1,$obra);
        $stm->bindValue(2,$constructora);
        $stm->bindValue(3,$tipo);
        $stm->bindValue(4,$descripcion);
        $stm->bindValue(5,$direccion);
        $stm->bindValue(6,$terreno_metros);
        $stm->bindValue(7,$id_cliente);
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