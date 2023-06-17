<?php

//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
require_once ("../config/Conectar.php");
class Producto extends Conectar{

    public function get_producto(){
        try {
            $conectar=parent::Conexion();
            parent::set_name();
            $stm=$conectar->prepare("SELECT * FROM producto INNER JOIN proveedor ON proveedor.id_proveedor = producto.id_proveedor");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            return $e->getMessage();
        }   
    }

    // public function get_producto_id($id_producto){
    //     try {
    //         $conectar=parent::Conexion();
    //         parent::set_name();
    //         $stm=$conectar->prepare("SELECT * FROM producto WHERE id_producto=? INNER JOIN proveedor ON proveedor.id_proveedor = producto.id_producto");
    //         $stm->bindValue(1,$id_producto);
    //         $stm->execute();
    //         return $stm->fetchAll(PDO::FETCH_ASSOC);
    //     } catch (Exception $e) {
    //         return $e->getMessage();
    //     }
    // }

    public function insert_producto($nombre,$precio_unitario,$stock, $id_proveedor){
        $conectar=parent::Conexion();
        parent::set_name();
        $stm="INSERT INTO producto(nombre, precio_unitario, stock, id_proveedor) VALUES(?,?,?,?)";
        $stm=$conectar->prepare($stm);
        $stm->bindValue(1,$nombre);
        $stm->bindValue(2,$precio_unitario);
        $stm->bindValue(3,$stock);
        $stm->bindValue(4,$id_proveedor);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);

    }

    /* public function update_producto($nombre,$precio_unitario,$stock, $id_proveedor, $correo, $direccion, $salario){
        $conectar=parent::conexion();
        parent::set_name();
        $sql="UPDATE producto set imagen=? , nombre=? ,id_proveedor=?, promedio=?, nivelCAmpus=?, nivelIngles=?, especialidad=? ,direccion=? , celular=?, ingles=?, Ser=?,  Review=?, Skills=?,  Asitencia=?  WHERE id=?";
        $sql=$conectar->prepare($sql);
        
        $sql->bindValue(1,$imagen);
        $sql->bindValue(2,$nombre);
        $sql->bindValue(3,$id_proveedor);
        $sql->bindValue(4,$promedio);
        $sql->bindValue(5,$nivelCAmpus);
        $sql->bindValue(6,$nivelIngles);
        $sql->bindValue(7,$especialidad);
        $sql->bindValue(8,$direccion);
        $sql->bindValue(9,$celular);
        $sql->bindValue(10,$ingles);
        $sql->bindValue(11,$Ser);
        $sql->bindValue(12,$Review);
        $sql->bindValue(13,$Skills);
        $sql->bindValue(14,$Asitencia);
        $sql->bindValue(15,$id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);


    } */
    
    /* public function delete_camper($id){
        $conectar=parent::conexion();
        parent::set_name();
        $sql="DELETE FROM pacientes WHERE id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    } */

}

?>