<?php

//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
require_once ("../config/Conectar.php");
class Inventario extends Conectar{

    public function get_inventario(){
        try {
            $conectar=parent::Conexion();
            parent::set_name();
            $stm=$conectar->prepare("SELECT * FROM inventario INNER JOIN producto ON producto.id_producto = inventario.id_producto");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            return $e->getMessage();
        }   
    }

    // public function get_inventario_id($id_inventario){
    //     try {
    //         $conectar=parent::Conexion();
    //         parent::set_name();
    //         $stm=$conectar->prepare("SELECT * FROM inventario WHERE id_inventario=? INNER JOIN producto ON producto.id_producto = inventario.id_inventario");
    //         $stm->bindValue(1,$id_inventario);
    //         $stm->execute();
    //         return $stm->fetchAll(PDO::FETCH_ASSOC);
    //     } catch (Exception $e) {
    //         return $e->getMessage();
    //     }
    // }

    public function insert_inventario($cantidad_inicial,$cantidad_ingresos,$cantidad_salidas, $cantidad_final, $fecha_inventario, $tipo_operacion, $id_producto){
        $conectar=parent::Conexion();
        parent::set_name();
        $stm="INSERT INTO inventario(cantidad_inicial,cantidad_ingresos,cantidad_salidas,cantidad_final,fecha_inventario,tipo_operacion, id_producto) VALUES(?,?,?,?,?,?,?)";
        $stm=$conectar->prepare($stm);
        $stm->bindValue(1,$cantidad_inicial);
        $stm->bindValue(2,$cantidad_ingresos);
        $stm->bindValue(3,$cantidad_salidas);
        $stm->bindValue(4,$cantidad_final);
        $stm->bindValue(5,$fecha_inventario);
        $stm->bindValue(6,$tipo_operacion);
        $stm->bindValue(7,$id_producto);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);

    }

    /* public function update_inventario($cantidad_inicial,$cantidad_ingresos,$cantidad_salidas, $id_producto, $correo, $direccion, $salario){
        $conectar=parent::conexion();
        parent::set_name();
        $sql="UPDATE inventario set imagen=? , cantidad_inicial=? ,id_producto=?, promedio=?, nivelCAmpus=?, nivelIngles=?, especialidad=? ,direccion=? , celular=?, ingles=?, Ser=?,  Review=?, Skills=?,  Asitencia=?  WHERE id=?";
        $sql=$conectar->prepare($sql);
        
        $sql->bindValue(1,$imagen);
        $sql->bindValue(2,$cantidad_inicial);
        $sql->bindValue(3,$id_producto);
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
    
    public function delete_inventario($id_inventario){
        $conectar=parent::conexion();
        parent::set_name();
        $sql="DELETE FROM inventario WHERE id_inventario=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_inventario);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>