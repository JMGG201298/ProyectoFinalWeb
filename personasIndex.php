
<?php
    include_once("php/conexionBD.php");
    $conexion = conectar();
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/consultarInfromacion.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <!--<script src="scripts/inscripcion.js"></script>-->
    <script src="librerias/alertifyjs/alertify.js"></script>
    <title>CRUD Personas</title>
<body>

    <?php 
        //include_once("php/header.html");
        include_once("php/navbar.html");
    ?>
    <!-- Button trigger modal -->

    <div class="container-fluid">
        <h3>Benificiarios</h3>
        <button type="button" class="btn btn-primary ml-auto d-block my-2" data-toggle="modal" data-target="#exampleModal">
            <span style="text-align: left;">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                </svg>
            </span>
            Agregar
        </button>
        <!--Tabla de parsonas -->    
        <div class="table-responsive">
            <table class="table table-hover table-condensed table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th style="text-align: center; background: #8CBCF6; border-top-left-radius: 10px; border-right: 2px solid #DBDBDB;" scope="col">Nombre</th>
                        <th scope="col" style="text-align: center; background: #8CBCF6; border-right: 2px solid #DBDBDB;">A_paterno</th>
                        <th scope="col" style="text-align: center; background: #8CBCF6; border-right: 2px solid #DBDBDB;">A_materno</th>
                        <th scope="col" style="text-align: center; background: #8CBCF6; border-right: 2px solid #DBDBDB;">Curp</th>
                        <th scope="col" style="text-align: center; background: #8CBCF6; border-right: 2px solid #DBDBDB;">Telefono</th>
                        <th scope="col" style="text-align: center; background: #8CBCF6; border-right: 2px solid #DBDBDB;">Celular</th>
                        <th scope="col" style="text-align: center; background: #8CBCF6; border-right: 2px solid #DBDBDB;">Dirección</th>
                        <th scope="col" style="text-align: center; background: #8CBCF6; border-right: 2px solid #DBDBDB;">Municipio</th>
                        <th scope="col" style="text-align: center; background: #8CBCF6; border-right: 2px solid #DBDBDB;">Estatus</th>
                        <th scope="col" style="text-align: center; background: #8CBCF6; border-right: 2px solid #DBDBDB;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $consulta="SELECT * FROM beneficiario";
                        $resultado=mysqli_query($conexion,$consulta);
                        while($fila=mysqli_fetch_array($resultado)){ ?>
                            <tr>
                                <td style="text-align: center; vertical-align: middle; border-right: 2px solid #DBDBDB; border-top: 2px solid #DBDBDB;"><?php echo $fila['nombre'] ?></td>
                                <td style="text-align: center; vertical-align: middle; border-right: 2px solid #DBDBDB; border-top: 2px solid #DBDBDB;"><?php echo $fila['apellido_paterno'] ?></td>
                                <td style="text-align: center; vertical-align: middle; border-right: 2px solid #DBDBDB; border-top: 2px solid #DBDBDB;"><?php echo $fila['apellido_materno'] ?></td>
                                <td style="text-align: center; vertical-align: middle; border-right: 2px solid #DBDBDB; border-top: 2px solid #DBDBDB;"><?php echo $fila['curp'] ?></td>
                                <td style="text-align: center; vertical-align: middle; border-right: 2px solid #DBDBDB; border-top: 2px solid #DBDBDB;"><?php echo $fila['telefono_fijo'] ?></td>
                                <td style="text-align: center; vertical-align: middle; border-right: 2px solid #DBDBDB; border-top: 2px solid #DBDBDB;"><?php echo $fila['telefono_celular'] ?></td>
                                <td style="text-align: center; vertical-align: middle; border-right: 2px solid #DBDBDB; border-top: 2px solid #DBDBDB;"><?php echo $fila['direccion'] ?></td>
                                <td style="text-align: center; vertical-align: middle; border-right: 2px solid #DBDBDB; border-top: 2px solid #DBDBDB;"><?php echo $fila['municipio'] ?></td>
                                <td style="text-align: center; vertical-align: middle; border-right: 2px solid #DBDBDB; border-top: 2px solid #DBDBDB;"><?php echo $fila['estatus'] ?></td>
                                <td style="text-align: center; border-top: 2px solid #DBDBDB;">
                                    <div style="display:flex">
                                        <form method="POST">
                                            <button class="btn btn-primary" style="
                                            padding-left: 5px;   padding-right: 5px;    padding-bottom: 0px;    padding-top: 0px;" name="id_persona"
                                            value="<?php echo $fila['id_persona']?>">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                </svg>
                                            </button>
                                        </form>
                                        
                                        <a href="#" data-href="php/eliminar_Persona.php?id_persona=<?php echo $fila['id_persona']?>" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger" style="
                                            padding-left: 5px;   padding-right: 5px;    padding-bottom: 0px;    padding-top: 0px;">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                                                </svg>
                                        </a>
                                    </div>
                                    
                                </td>
                            </tr>
                    <?php } ?>
                    
                </tbody>
            </table>
        </div>
        
        
        <!--Alerta de registro exitoso -->    
        <?php if(isset($_SESSION['message'])) {?>
            <div class="alert alert-<?= $_SESSION['message_type'];?>
                alert-dismissible fade show" style="width:300px" role="alert">
                <?= $_SESSION['message']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php session_unset(); }?>
        
        <!--Modales -->


        <!-- Modal -->
		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
					</div>
					<div class="modal-body">
                    
                        
						¿Desea eliminar este registro?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<a class="btn btn-danger btn-ok">Delete</a>
					</div>
				</div>
			</div>
		</div>
        
        <!-- Modal Agregar Persona-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> AGREGAR BENFICIARIO</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="php/guardar_Persona.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="nombre">Nombre</label>
                                    <input name="nombre" type="text" class="form-control" required>
                                    <span class="invalid-tooltip my-1">
                                       ¡Campo requerido!
                                    </span>
                                </div>
                                <div class="form-group col-6">
                                    <label for="apellido_paterno">Apellido paterno</label>
                                    <input name="apellido_paterno" type="text" class="form-control"required>
                                    <span class="invalid-tooltip my-1">
                                       ¡Campo requerido!
                                    </span>
                                </div>                    
                                <div class="form-group col-6">
                                    <label for="apellido_materno">Apellido materno</label>
                                    <input name="apellido_materno" type="text" class="form-control"required>
                                    <span class="invalid-tooltip my-1">
                                       ¡Campo requerido!
                                    </span>
                                </div>            
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="curp">Curp</label>
                                    <input type="text" class="form-control" name="curp" required>
                                    <span class="invalid-tooltip my-1">
                                       ¡Campo requerido!
                                    </span>
                                </div>            
                                <div class="form-group col-4">
                                    <label for="ine">INE</label>
                                    <input type="file" id="ine" name="ine" accept="image/*" multiple>
                                </div>                       
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="telefono_fijo">Telefono fijo</label>
                                    <input type="number" class="form-control" name="telefono_fijo">
                                </div>
                                <div class="form-group col-4">
                                    <label for="telefono_celular">Telefono celular</label>
                                    <input type="number" class="form-control" name="telefono_celular">
                                </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-4">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" class="form-control" name="direccion">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="municipio">Municipio</label>
                                    <input type="text" class="form-control" name="municipio">  
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="id_apoyo">id apoyo</label>
                                    <input type="number" class="form-control" name="id_apoyo" required>
                                    <span class="invalid-tooltip my-1">
                                       ¡Campo requerido!
                                    </span> 
                                </div>
                                <div>
                                    <label>Estado</label>
                                    <select name="estatus">
                                        <option value="A">ACTIVO</option>
                                        <option value="NA">NO ACTIVO</option>
                                    </select>
                                </div>
                            </div>
                        </div>    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" name="guardar_Persona" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php if($_POST!=NULL){
                    include_once("php/editar_Persona.php");
                }
            ?>
            <!-- Modal Modificar Persona-->
            <div class="modal fade show" id="ModalModificar" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">MODIFICAR BENFICIARIO</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="php/guardar_Persona.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id_persona" value="<?php echo isset($id_persona)?$id_persona:"" ?>">
                            <div class="modal-body">
                                        <input style="display:none" name="nombre" type="hidden" class="form-control" value="<?php echo isset($nombre)?$nombre:"" ?>">
                                        <input style="display:none" name="apellido_paterno" type="hidden" class="form-control" value="<?php echo isset($apellido_paterno)?$apellido_paterno:"" ?>">
                                        <input style="display:none" name="apellido_materno" type="hidden" class="form-control" value="<?php echo isset($apellido_materno)?$apellido_materno:"" ?>">
                                        <input style="display:none" type="hidden" class="form-control" name="curp" value="<?php echo isset($curp)?$curp:"" ?>">
                                
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label for="telefono_fijo">Telefono fijo</label>
                                        <input type="number" class="form-control" name="telefono_fijo" value="<?php echo isset($telefono_fijo)?$telefono_fijo:"" ?>" >
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="telefono_celular">Telefono celular</label>
                                        <input type="number" class="form-control" name="telefono_celular" value="<?php echo isset($telefono_celular)?$telefono_celular:"" ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="direccion">Dirección</label>
                                        <input type="text" class="form-control" name="direccion" value="<?php echo isset($direccion)?$direccion:"" ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="municipio">Municipio</label>
                                        <input type="text" class="form-control" name="municipio" value="<?php echo isset($municipio)?$municipio:"" ?>">  
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="id_apoyo">id apoyo</label>
                                        <input type="number" class="form-control" name="id_apoyo" value="<?php echo isset($id_apoyo)?$id_apoyo:"" ?>">
                                        
                                        </div>
                                    <div class="form-group col-md-6">
                                        <label>Estado</label>
                                        <br>
                                        <select name="estatus" >
                                            <option <?php echo isset($estatus) && $estatus=="A"? "SELECTED":"" ?> value="A">ACTIVO</option>
                                            <option <?php echo isset($estatus) && $estatus=="NA"? "SELECTED":"" ?> value="NA">NO ACTIVO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>    
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" id="btnAgregar" name="guardar_Persona" class="btn btn-primary">Modificar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
<script src="../SistemaRegistroPresidencia/js/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://kit.fontawesome.com/f11940c493.js" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('table').DataTable();
    });
</script>
<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
</script>	
<?php
    if($_POST!=null){?>
        <script>
            $(document).ready(function(){
                $('#ModalModificar').modal('show');
            });
        </script>
<?php } ?>    
</body>
</html>