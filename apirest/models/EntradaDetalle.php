<?php

//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
require_once ("../config/Conectar.php");
class EntradaD extends Conectar{

    public function get_entradaD(){
        try {
            $conectar=parent::Conexion();
            parent::set_name();
            $stm=$conectar->prepare("SELECT * FROM entrada_detalle INNER JOIN obra ON obra.id_obra = entrada_detalle.id_obra INNER JOIN entrada ON entrada.id_entrada = entrada_detalle.id_entrada INNER JOIN producto ON producto.id_producto = entrada_detalle.id_producto");
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

   /*  public function insert_entradaD($entrada_cantidad,$entrada_cantidad_propia,$entrada_cantidad_subalquilada,$estado,$id_entrada,$id_producto,$id_obra){
        $conectar=parent::Conexion();
        parent::set_name();
        $stm="INSERT INTO entrada_detalle(entrada_cantidad,entrada_cantidad_propia,entrada_cantidad_subalquilada,estado,id_entrada,id_producto,id_obra) VALUES(?,?,?,?,?,?,?)";
        $stm=$conectar->prepare($stm);
        $stm->bindValue(1,$entrada_cantidad);
        $stm->bindValue(2,$entrada_cantidad_propia);
        $stm->bindValue(3,$entrada_cantidad_subalquilada);
        $stm->bindValue(4,$estado);
        $stm->bindValue(5,$id_entrada);
        $stm->bindValue(6,$id_producto);
        $stm->bindValue(7,$id_obra);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);

    } */

    public function insert_entradaD($entrada_cantidad,$entrada_cantidad_propia,$entrada_cantidad_subalquilada,$estado,$id_entrada,$id_producto,$id_obra){
        $conectar=parent::Conexion();
        parent::set_name();
        $stm="INSERT INTO entrada_detalle(entrada_cantidad,entrada_cantidad_propia,entrada_cantidad_subalquilada,estado,id_entrada,id_producto,id_obra) VALUES(?,?,?,?,?,?,?)";
        $stm=$conectar->prepare($stm);
        $stm->bindValue(1,$entrada_cantidad);
        $stm->bindValue(2,$entrada_cantidad_propia);
        $stm->bindValue(3,$entrada_cantidad_subalquilada);
        $stm->bindValue(4,$estado);
        $stm->bindValue(5,$id_entrada);
        $stm->bindValue(6,$id_producto);
        $stm->bindValue(7,$id_obra);
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
    
    public function delete_entradaD($id_entradaD){
        $conectar=parent::conexion();
        parent::set_name();
        $sql="DELETE FROM entrada_detalle WHERE id_entrada=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_entradaD);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>