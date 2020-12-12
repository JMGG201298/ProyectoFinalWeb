<?php

    require_once "conexionBD.php";
    $conexion = conectar();

    $id = $_POST['idApoyo'];
    $nombre = $_POST['nombreau'];
    $fondo = $_POST['fondoau'];
    $costo = $_POST['costoau'];
    $descripcion = $_POST['descripcionau'];

    
    $sql = " UPDATE apoyo SET nombre='$nombre', presupuesto='$fondo', cantidad='$costo', descripcion='$descripcion' WHERE id_apoyo='$id'";

    if(!$result = mysqli_query($conexion, $sql)){
        echo 0;
    }else{
        echo 1;
    }
?>