<?php

include_once('conexionBD.php');
$conexion = conectar();
session_start();

$user_check = $_SESSION['session_username'];
$sql = mysqli_query($conexion, "SELECT nombre FROM usuario WHERE nombre = '$user_check'");
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
$login_session = $row['usuario'];

if(!isset($_SESSION['session_username'])){
    header('location: ../login.php');
    die();
}