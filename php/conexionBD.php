<?php    
    
    function conectar()
    {
        $server = "localhost";
        $user = "root";
        $password = "";
        $database = "presidencia";
        $conexion = mysqli_connect($server, $user, $password, $database);
        if($conexion == false){
            echo "Falló la conexión al servidor de Base de Datos";
        }else{
            return $conexion;
        }   
    }
?>
