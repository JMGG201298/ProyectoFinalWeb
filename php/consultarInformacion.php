<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="../css/bootstrapValidator.min.css">
    <!-- Css estilos propios -->
    <link rel="stylesheet" href="../css/consultarInformacion.css">
    

    

    <title>Consultar Información</title>
</head>
<body>
    <?php
        include "header.html";
    ?>
    <section class="sectionform">
        <form action="" class="formulario" id="formulario">
            <!--Grupo Apellidos -->
            <div class="formulario__grupo" id="grupo_apellidos">
                <label for="apellidos" class="formulario__label">Apellido</label>
                <div class="formulario__grupo-input form-group">
                    <input type="text" name="apellidos" id="apellidos" class="formulario__input form-control" placeholder="Gutierrez Gomez">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">Debes ingresar al menos tres letras y solo puede contener letras y un espacio</p>
            </div>
            <!--Gruppo Fecha Inicial-->
            <div class="formulario__grupo" id="grupo_fechaInicial">
                <label for="fechaInicial" class="formulario__label">Fecha Inicio</label>
                <div class="formulario__grupo-input-correcto form-group">
                    <input required type="date" name="fechaInicial" id="fechaInicial" class="formulario__input form-control" >
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">Debes Seleccionar una fecha inicial de busqueda</p>
            </div>
            <!--Gruppo Fecha Final-->
            <div class="formulario__grupo" id="grupo__FechaFinal">
                <label for="fechaFinal" class="formulario__label">Fecha Final</label>
                <div class="formulario__grupo-input form-group">
                    <input required type="date" name="fechaFinal" id="fechaFinal" class="formulario__input form-control">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">Debes Seleccionar una fecha final de busqueda</p>
            </div>
            <!--Gruppo apoyos-->
            <div class="formulario__grupo" id="grupo__apoyos">
                <label for="apoyos" class="formulario__label">Apoyos*</label>
                <div class="formulario__grupo-input form-group">
                    <input required type="text" name="apoyos" id="apoyos" class="formulario__input form-control" placeholder="Becas">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">Debes ingresar un apoyo valido</p>
            </div>
            <!--Gruppo mensaje-->
            <div class="formulario__grupo-mensaje" id="grupo__mensaje">
               <label>*Para buscar mas de un apoyo, separa por una coma (,) Ejemplo: Becas, Casas, Calentadores, ...</label>
            </div>
            <div class="formulario__mensaje" id="formulario__mensaje">
                <p><i class="fas fa-exclamation-triangle"></i> Error: Rellena la busqueda correctamente</p>
             </div>
             <div class="formulario__grupo formulario__grupo-btn-enviar">
                 <button type="submit" class="formulario__btn">Buscar</button>
                 <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Se realizo la busqueda correctamente</p>
             </div>
        </form>
    </section>
    
    <section class="sectionTabla">
        <table id="tblDatos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Nombre</th>
                    <th>Curp</th>
                    <th>INE</th>
                    <th>Telefono</th>
                    <th>Celular</th>
                    <th>Dirección</th>
                    <th>Municipio</th>
                    <th>Apoyo</th>
                    <th>Estatus</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        <form action="">
            <button type="button" class="btn btn-warning" id="btnReporte" onclick="window.open('fpdfx.php','_blank')">Generar Reporte</button>
        </form>
    </section>
    <!-- Scripts de bootstrap v4.5-->
    <script src="../libreriasJuan/dataTables.buttons.min.js"></script>
    <script src="../libreriasJuan/jszip.min.js"></script>
    <script src="../libreriasJuan/pdfmake.min.js"></script>
    <script src="../libreriasJuan/vfs_fonts.js"></script>
    <script src="../libreriasJuan/buttons.html5.min.js"></script>
    <script src="../js/bootstrapValidator.js"></script>
    <script src="../js/consultarInformacion.js"></script>
 
</body>
</html>