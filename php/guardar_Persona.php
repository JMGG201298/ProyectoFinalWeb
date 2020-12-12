<?php
    include_once("conexionBD.php");
    

    $conexion = conectar();
    //print_r($_FILES);
    if(isset($_POST['guardar_Persona'])){
        //var_dump($_POST);
        
        $nombre=$_POST['nombre'];
        $apellido_paterno=$_POST['apellido_paterno'];
        $apellido_materno=$_POST['apellido_materno'];
        $curp=$_POST['curp'];
        $ine=addslashes(file_get_contents($_FILES['ine']['tmp_name']));
        $telefono_fijo=$_POST['telefono_fijo'];
        $telefono_celular=$_POST['telefono_celular'];
        $direccion=$_POST['direccion'];
        $municipio=$_POST['municipio'];
        $id_apoyo=$_POST['id_apoyo'];
        $estatus=$_POST['estatus'];
        
        
        

        if(!isset($_POST['id_persona'])){
        $consulta="INSERT INTO beneficiario (nombre, apellido_paterno,apellido_materno,curp,ine,
                                            telefono_fijo,telefono_celular,direccion,municipio,id_apoyo,estatus) 
                        VALUES ('$nombre','$apellido_paterno','$apellido_materno','$curp','$ine',
                                '$telefono_fijo','$telefono_celular','$direccion','$municipio','$id_apoyo','$estatus')";                     

        }else{
            $id_persona=$_POST['id_persona'];
            $telefono_celular=!empty($telefono_celular) ? "'$telefono_celular'" : "NULL";
            $telefono_fijo=!empty($telefono_fijo) ? "'$telefono_fijo'" : "NULL";
            $consulta="UPDATE beneficiario SET nombre='$nombre',apellido_paterno='$apellido_paterno',
            apellido_materno='$apellido_materno',curp='$curp',ine='$ine',telefono_fijo=$telefono_fijo,
            telefono_celular=$telefono_celular,direccion='$direccion', municipio='$municipio',
            id_apoyo=$id_apoyo,estatus='$estatus' WHERE id_persona=$id_persona";

              
        }
        //Enviar datos para el acuse
        //enviarDatosAcuse($nombre,$apellido_paterno,$apellido_materno,$curp,$telefono_fijo,
        //$telefono_celular,$direccion,$municipio); 

        //var_dump($consulta);
        $resultado=mysqli_query($conexion,$consulta);
        //var_dump($consulta);
        //var_dump($resultado);
        if(!$resultado){
            die("Query Failed");
        }
        $_SESSION['message']='Guardado correctamente';
        $_SESSION['message_type']='success';
        header("Location: ../personasIndex.php");

    }
?>