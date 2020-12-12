<?php

    require_once "conexionBD.php";
    $conexion = conectar();

    $nombre = $_POST['nombreApoyo'];
    $fondo = $_POST['fondoInicial'];
    $costo = $_POST['costoIndividual'];
    $descripcion = $_POST['descripcion'];
	$sql = "INSERT INTO apoyo (nombre,presupuesto,cantidad, descripcion) VALUES ('$nombre','$fondo','$costo','$descripcion')";
    if(!$result = mysqli_query($conexion, $sql)){
        echo 0;
    }else{
        echo 1;
    }
?>