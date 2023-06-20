<?php

//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
require_once ("../config/Conectar.php");
class Proveedor extends Conectar{

    public function get_proveedor(){
        try {
            $conectar=parent::Conexion();
            parent::set_name();
            $stm=$conectar->prepare("SELECT * FROM proveedor");
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

    public function insert_proveedor($nombre,$direccion,$telefono, $encargado, $sector){
        $conectar=parent::Conexion();
        parent::set_name();
        $stm="INSERT INTO proveedor(nombreProveedor,direccion,telefono,encargado,sector) VALUES(?,?,?,?,?)";
        $stm=$conectar->prepare($stm);
        $stm->bindValue(1,$nombre);
        $stm->bindValue(2,$direccion);
        $stm->bindValue(3,$telefono);
        $stm->bindValue(4,$encargado);
        $stm->bindValue(5,$sector);
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
    
    public function delete_proveedor($id_proveedor){
        $conectar=parent::conexion();
        parent::set_name();
        $sql="DELETE FROM proveedor WHERE id_proveedor=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_proveedor);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>