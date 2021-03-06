<?php
require_once "conexionBD.php";
$conexion = conectar();
?>
<div class="row">
    <div class="col-sm-12">
        <h3>Apoyos</h3>
        <caption>
            <!-- Boton agregar-->
            <button id="addnew" class="btn btn-primary" data-toggle="modal" data-target="#modalRegistro">
                <span style="text-align: left;">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                    </svg>
                </span>
                Agregar nuevo
            </button>
        </caption>

        <table class="table table-hover table-condensed table-bordered">
            <tr>

                <td style="text-align: center; background: #8CBCF6; border-top-left-radius: 10px; border-right: 2px solid #DBDBDB;">Nombre del apoyo</td>
                <td style="text-align: center; background: #8CBCF6; border-right: 2px solid #DBDBDB;">Fondo inicial</td>
                <td style="text-align: center; background: #8CBCF6;;">Costo individual</td>
                <td></td>
                <td></td>
            </tr>

            <?php
            $sql = "SELECT * FROM apoyo"; 
            $result = mysqli_query($conexion, $sql);
            while ($ver = mysqli_fetch_row($result)) {
                $datos = $ver[0] . "||" . $ver[1] . "||" . $ver[2] . "||" . $ver[3] . "||" . $ver[4] . "||" . $ver[5];
            ?>
                <tr>
                    <td style="text-align: center; vertical-align: middle; border-right: 2px solid #DBDBDB; border-top: 2px solid #DBDBDB;"><?php echo $ver[1] ?></td>
                    <td style="text-align: center; vertical-align: middle; border-right: 2px solid #DBDBDB; border-top: 2px solid #DBDBDB;"><?php echo $ver[3] ?></td>
                    <td style="text-align: center; vertical-align: middle; border-right: 2px solid #DBDBDB; border-top: 2px solid #DBDBDB;"><?php echo $ver[4] ?></td>
                    <td style="text-align: center; border-top: 2px solid #DBDBDB; border-right: 2px solid #DBDBDB;">
                        <!-- Boton editar -->
                        <button class="btn btn-warning" data-toggle="modal" data-target="#modalEdicion" onclick="agregarFormApoyos('<?php echo $datos ?>')">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                            </svg>
                        </button>
                    </td>
                    <td style="text-align: center; border-top: 2px solid #DBDBDB;">
                        <!-- Boton eliminar -->
                        <button class="btn btn-danger" onclick="preguntarSiNoApoyo('<?php echo $ver[0] ?>')">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                            </svg>
                            
                        </button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>