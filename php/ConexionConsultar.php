<?php
    require "conexionBD2.php";
    class ConexionConsultar extends conexionBD2{
        public function ConexionConsultar(){
            parent::__construct();
        }
        public function obtenerBeneficiarios(){
            $queryes="SELECT b.id_persona, b.nombre, b.apellido_paterno, b.apellido_materno, b.curp, b.ine, b.telefono_fijo, b.telefono_celular, b.direccion, b.municipio, u.nombre as apoyo, b.estatus, b.fecha from beneficiario b, apoyo u where b.id_apoyo=u.id_apoyo;";
            $resultado=$this->conexion_bd->query($queryes);
            //$beneficarios=$resultado->fetch_all(MYSQLI_ASSOC);
            $beneficarios=mysqli_query($this->conexion_bd, $queryes);
            //return $beneficarios;
            while($data=mysqli_fetch_assoc($beneficarios)){
                $arreglo["data"][]=array_map("utf8_encode",$data);
            }
            
            echo json_encode($arreglo);
            return $resultado;
        }
        public function obtenerBeneficiarios2(){
            $queryes="SELECT b.id_persona, b.nombre, b.apellido_paterno, b.apellido_materno, b.curp, b.ine, b.telefono_fijo, b.telefono_celular, b.direccion, b.municipio, u.nombre as apoyo, b.estatus, b.fecha from beneficiario b, apoyo u where b.id_apoyo=u.id_apoyo;";
            $resultado=$this->conexion_bd->query($queryes);
            //$beneficarios=$resultado->fetch_all(MYSQLI_ASSOC);
            $beneficarios=mysqli_query($this->conexion_bd, $queryes);
            //return $beneficarios;
            while($data=mysqli_fetch_assoc($beneficarios)){
                $arreglo["data"][]=array_map("utf8_encode",$data);
            }
            
            return $resultado;
        }
        /*public function obtenerBeneficiario($nombre, $fechaIni, $fechaFin, $apoyo){
            $resultado=$this->$conexion_db->query("select * from beneficiario where nombre=".$nombre." and ")
        }*/
    }
?>