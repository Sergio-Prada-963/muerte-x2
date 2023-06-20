<?php

//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
require_once ("../config/Conectar.php");
class Liquidacion extends Conectar{

    public function get_liquidacion(){
        try {
            $conectar=parent::Conexion();
            parent::set_name();
            $stm=$conectar->prepare("SELECT * FROM liquidacion INNER JOIN empleado ON empleado.id_empleado = liquidacion.id_empleado");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            return $e->getMessage();
        }   
    }

    // public function get_liquidacion_id($id_liquidacion){
    //     try {
    //         $conectar=parent::Conexion();
    //         parent::set_name();
    //         $stm=$conectar->prepare("SELECT * FROM liquidacion WHERE id_liquidacion=? INNER JOIN producto ON producto.id_producto = liquidacion.id_liquidacion");
    //         $stm->bindValue(1,$id_liquidacion);
    //         $stm->execute();
    //         return $stm->fetchAll(PDO::FETCH_ASSOC);
    //     } catch (Exception $e) {
    //         return $e->getMessage();
    //     }
    // }

    public function insert_liquidacion($tipo,$motivo,$indemnizacion, $seguridad_social, $id_empleado){
        $conectar=parent::Conexion();
        parent::set_name();
        $stm="INSERT INTO liquidacion(tipo,motivo,indemnizacion,seguridad_social,id_empleado) VALUES(?,?,?,?,?)";
        $stm=$conectar->prepare($stm);
        $stm->bindValue(1,$tipo);
        $stm->bindValue(2,$motivo);
        $stm->bindValue(3,$indemnizacion);
        $stm->bindValue(4,$seguridad_social);
        $stm->bindValue(5,$id_empleado);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);

    }

    /* public function update_liquidacion($tipo,$motivo,$indemnizacion, $id_producto, $correo, $direccion, $salario){
        $conectar=parent::conexion();
        parent::set_name();
        $sql="UPDATE liquidacion set imagen=? , tipo=? ,id_producto=?, promedio=?, nivelCAmpus=?, nivelIngles=?, especialidad=? ,direccion=? , celular=?, ingles=?, Ser=?,  Review=?, Skills=?,  Asitencia=?  WHERE id=?";
        $sql=$conectar->prepare($sql);
        
        $sql->bindValue(1,$imagen);
        $sql->bindValue(2,$tipo);
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
    
    public function delete_liquidacion($id_liquidacion){
        $conectar=parent::conexion();
        parent::set_name();
        $sql="DELETE FROM liquidacion WHERE id_liquidacion=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_liquidacion);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>