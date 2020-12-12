<?php
session_start();
if (!isset($_SESSION['session_username'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="js/funciones.js"></script>
    <script src="librerias/bootstrap/js/bootstrap.js"></script>
    <script src="librerias/alertifyjs/alertify.js"></script>
    <link rel="icon" type="image/png" href="images/moroleonLogo.png" />
    <title>Apoyos</title>
</head>

<body>

<?php 
        //include_once("php/header.html");
        include_once("php/navbar.html");
?>

    <div class="container">
        <div id="tablaApoyos"></div>
    </div>

    <!-- Modal para nuevo registro -->
    <div class="modal fade" id="modalRegistro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar nuevo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form accept-charset="utf-8" method="POST" enctype="multipart/form-data" id="registrarNuevo">
                        <div class="form-group">
                            <label for="nombreApoyo">Nombre del apoyo</label>
                            <input type="text" class="form-control" id="nombreApoyo">
                        </div>
                        <div class="form-group">
                            <label for="fondoInicial">Fondo inicial</label>
                            <input type="text" class="form-control" id="fondoInicial">
                        </div>
                        <div class="form-group">
                            <label for="costoIndividual">Costo individual</label>
                            <input type="text" class="form-control" id="costoIndividual">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" class="form-control" id="descripcion">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal" id="guardarnuevo">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para edicion de registro -->
    <div class="modal fade" id="modalEdicion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="actualizaRegistro" accept-charset="utf-8" method="POST" enctype="multipart/form-data">
                        <input type="text" hidden="" id="idApoyo">
                        <div class="form-group">
                            <label for="nombreau">Nombre del apoyo</label>
                            <input type="text" class="form-control" id="nombreau">
                        </div>
                        <div class="form-group">
                            <label for="fondoau">Fondo inicial</label>
                            <input type="text" class="form-control" id="fondoau">
                        </div>
                        <div class="form-group">
                            <label for="costoau">Costo indivisual</label>
                            <input type="text" class="form-control" id="costoau">
                        </div>
                        <div class="form-group">
                            <label for="descripcionau">Descripcion</label>
                            <input type="text" class="form-control" id="descripcionau">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal" id="actualizadatos">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tablaApoyos').load('php/tablaApoyos.php');
    })
</script>

<script type="text/javascript">
    $(document).ready(function() {

        $('#guardarnuevo').click(function() {
            nombre = $('#nombreApoyo').val();
            fondoInicial = $('#fondoInicial').val();
            costo = $('#costoIndividual').val();
            descripcion = $('#descripcion').val();
            agregarApoyo(nombre, fondoInicial, costo, descripcion);
        });

        $('#actualizadatos').click(function() {
            nombre = $('#nombreau').val();
            fondo = $('#fondoau').val();
            costo = $('#costoau').val();
            descripcionAu = $('#descripcionau').val();
            idApoyo =  $('#idApoyo').val();
            actualizarApoyo(idApoyo,nombre,fondo, costo, descripcionAu);
        });
    });
</script>
