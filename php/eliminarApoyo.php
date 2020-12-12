<?php

    require_once "conexionBD.php";
    $conexion = conectar();

    $id = $_POST['idApoyo'];

    $sql = "DELETE FROM apoyo WHERE id_apoyo = $id";
    echo $result = mysqli_query($conexion,$sql);
?>