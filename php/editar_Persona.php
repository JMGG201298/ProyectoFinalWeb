<?php
    include_once("conexionBD.php");
    $conexion = conectar();

    if(isset($_POST['id_persona'])){
        $id_persona=$_POST['id_persona'];
        $consulta="SELECT * FROM beneficiario WHERE id_persona=$id_persona";
        $resultado=mysqli_query($conexion,$consulta);
        if(mysqli_num_rows($resultado)==1){
            $row=mysqli_fetch_array($resultado);
            $nombre=$row['nombre'];
            $apellido_paterno=$row['apellido_paterno'];
            $apellido_materno=$row['apellido_materno'];
            $curp=$row['curp'];
            $ine=$row['ine'];
            $telefono_fijo=$row['telefono_fijo'];
            $telefono_celular=$row['telefono_celular'];
            $direccion=$row['direccion'];
            $municipio=$row['municipio'];
            $id_apoyo=$row['id_apoyo'];
            $estatus=$row['estatus'];
        }
    }
?>
