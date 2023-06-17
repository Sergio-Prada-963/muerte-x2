<?php

//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
require_once ("../config/Conectar.php");
class Empleado extends Conectar{

    public function get_empleado(){
        try {
            $conectar=parent::Conexion();
            parent::set_name();
            $stm=$conectar->prepare("SELECT * FROM empleado");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            return $e->getMessage();
        }
        
    }
    // public function get_empleado_id($id){
    //     try {
    //         $conectar=parent::Conexion();
    //         parent::set_name();
    //         $stm=$conectar->prepare("SELECT * FROM empleado WHERE id=?");
    //         $stm->bindValue(1,$id);
    //         $stm->execute();
    //         return $stm->fetchAll(PDO::FETCH_ASSOC);
    //     } catch (Exception $e) {
    //         return $e->getMessage();
    //     }
    // }

    public function insert_empleado($nombre,$documento,$cargo, $edad, $correo, $direccion, $salario){
        $conectar=parent::Conexion();
        parent::set_name();
        $stm="INSERT INTO empleado(nombreEmpleado, documento, cargo, edad, correo, direccion, salario) VALUES(?,?,?,?,?,?,?)";
        $stm=$conectar->prepare($stm);
        $stm->bindValue(1,$nombre);
        $stm->bindValue(2,$documento);
        $stm->bindValue(3,$cargo);
        $stm->bindValue(4,$edad);
        $stm->bindValue(5,$correo);
        $stm->bindValue(6,$direccion);
        $stm->bindValue(7,$salario);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);

    }

    /* public function update_empleado($nombre,$documento,$cargo, $edad, $correo, $direccion, $salario){
        $conectar=parent::conexion();
        parent::set_name();
        $sql="UPDATE empleado set imagen=? , nombre=? ,edad=?, promedio=?, nivelCAmpus=?, nivelIngles=?, especialidad=? ,direccion=? , celular=?, ingles=?, Ser=?,  Review=?, Skills=?,  Asitencia=?  WHERE id=?";
        $sql=$conectar->prepare($sql);
        
        $sql->bindValue(1,$imagen);
        $sql->bindValue(2,$nombre);
        $sql->bindValue(3,$edad);
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