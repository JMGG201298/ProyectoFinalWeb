<?php
    class conexionBD2{
        protected $conexion_bd;
        public function conexionBD2(){
            $this->conexion_bd=new mysqli("localhost","root","","presidencia");
            if($this->conexion_bd->connect_errno){
                echo "Fallo al conectar: ".$this->conexion_bd->connect_error;
                return;
            }
        }
    }
?>