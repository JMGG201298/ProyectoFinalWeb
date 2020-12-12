<?php 
    include("conexionBD.php");
    $conexion = conectar();

    if(isset($_GET['id_persona'])){
        $id_persona=$_GET['id_persona'];
        $consulta="DELETE FROM beneficiario WHERE id_persona=$id_persona";
        $resultado=mysqli_query($conexion,$consulta);
        if(!$resultado){
            die("Query Failed");
        }
    }
    $_SESSION['message']="Eliminado correctamente";
    $_SESSION['message_type']="danger";
    header("Location: ../personasIndex.php")
?>