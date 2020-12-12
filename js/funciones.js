

//Agregar apoyo
function agregarApoyo(nombre, fondo, costo, descripcion){
    cadena = "nombreApoyo=" + nombre +
    "&fondoInicial=" + fondo +
    "&costoIndividual=" + costo +
    "&descripcion= " + descripcion;
    $.ajax({
        type: "POST",
        url: "php/agregarApoyo.php",
        data: cadena,
        success: function(r){
            if(r == 1){
                $('#tablaApoyos').load('php/tablaApoyos.php');
                alertify.success("Agregado con exito");
                $('#nombreApoyo').val("");
                $('#status').val("");
                $('#fondoInicial').val("");
                $('#costoIndividual').val("");
                $('#descripcion').val("");
            }else{
                alertify.error("Verifique sus datos");
            }
        }
    })
}




function agregarDatos(nombre, apellido1, apellido2, curp, telefono, direccion, apoyo) {

    cadena = "nombre=" + nombre +
        "&apellido1=" + apellido1 +
        "&apellido2=" + apellido2 +
        "&curp=" + curp +
        "&telefono=" + telefono +
        "&direccion=" + direccion +
        "&idapoyo=" + apoyo;

    $.ajax({
        type: "POST",
        url: "php/agregarDatos.php",
        data: cadena,
        success: function (r) {
            if (r == 1) {
                $('#tabla').load('php/tabla.php');
                alertify.success("Agregado con exito");
                $('#nombre').val("");
                $('#apellido1').val("");
                $('#apellido2').val("");
                $('#curp').val("");
                $('#telefono').val("");
                $('#direccion').val("");
                $('#idapoyo').val("");
            } else {
                alertify.error("CURP ya registrada");
            }
        }
    });
}

function agregaForm(datos) {

    d = datos.split("||");

    $('#idPersona').val(d[0]);
    $('#nombreu').val(d[1]);
    $('#apellido1u').val(d[2]);
    $('#apellido2u').val(d[3]);
    $('#curpu').val(d[4]);
    $('#telefonou').val(d[5]);
    $('#direccionu').val(d[6]);
}

function agregarFormApoyos(datos){
    d = datos.split("||");

    $('#idApoyo').val(d[0]);
    $('#nombreau').val(d[1]);
    $('#fondoau').val(d[3]);
    $('#costoau').val(d[4]);
    $('#descripcionau').val(d[5]);
}

function actualizarApoyo(idApoyo, nombre, fondo, costo, descripcion){
    cadena = "idApoyo=" + idApoyo+
    "&nombreau=" + nombre +
    "&fondoau="+ fondo +
    "&costoau="+costo +
    "&descripcionau=" + descripcion;

    $.ajax({ 
        type: "POST",
        url:"php/actualizarApoyos.php",
        data: cadena,
        success: function(r){
            if (r == 1) {
                $('#tablaApoyos').load('php/tablaApoyos.php');
                alertify.success("Datos actualizados");
            } else {
                alertify.error("Error al actualizar");
            }
        }
    });
}

function actualizaDatos(nombre, apellido1, apellido2, curp, telefono, direccion, apoyo, idPersona) {

    cadena = "idPersona=" + idPersona +
    "&nombre=" + nombre +
    "&apellido1=" + apellido1 +
    "&apellido2=" + apellido2 +
    "&curp=" + curp +
    "&telefono=" + telefono +
    "&direccion=" + direccion +
    "&idapoyo=" + apoyo;

    $.ajax({
        type: "POST",
        url: "php/actualizarDatos.php",
        data: cadena,
        success: function (r) {
            if (r == 1) {
                $('#tabla').load('php/tabla.php');
                alertify.success("Datos actualizados");
            } else {
                alertify.error("Error al actualizar");
            }
        }
    });

}

function preguntarSiNo(idPersona) {
    alertify.confirm('Eliminar registro', '¿Seguro que deseas eliminar?',
        function () { eliminarDatos(idPersona) }
        , function () { alertify.error('Operacion cancelada') });
}

function preguntarSiNoApoyo(idApoyo) {
    alertify.confirm('Eliminar registro', '¿Seguro que deseas eliminar?',
        function () { eliminarApoyo(idApoyo) }
        , function () { alertify.error('Operacion cancelada') });
}

function eliminarDatos(idPersona) {

    cadena = "idPersona=" + idPersona;

    $.ajax({
        type: "POST",
        url: "php/eliminarDatos.php",
        data: cadena,
        success: function (r) {
            if (r == 1) {
                $('#tabla').load('php/tabla.php');
                alertify.success("Registro eliminado");
            } else {
                alertify.error("Error al eliminar");
            }
        }
    });
}

function eliminarApoyo(idApoyo){
    cadena = "idApoyo="+idApoyo;

    $.ajax({
        type: "POST",
        url: "php/eliminarApoyo.php",
        data: cadena,
        success: function (r){
            if(r == 1){
                $('#tablaApoyos').load('php/tablaApoyos.php');
                alertify.success("Eliminado correctamente");
            }else{
                alertify.error("Error al eliminar");
            }
        }
    });

    
}
function enviarDatosAcuse(nombre,apellidoPaterno,apellidoMaterno,curp,telefonoFijo,telefonoCelular,direccion,
    municipio){
        cadena = "nombre=" + nombre +
        "&apellidoPaterno=" + apellidoPaterno +
        "&apellidoMaterno=" + apellidoMaterno +
        "&curp=" + curp +
        "&telefonoFijo= " + telefonoFijo +
        "&telefonoCelular= " + telefonoCelular +
        "&direccion= " + direccion +
        "&municipio= " + municipio ;
    $.ajax({
        type: "POST",
        url: "php/generarAcuse.php",
        data: cadena,
        success: function (r){
           if(r==1){
            window.open("php/generarAcuse.php", '_blank');
            win.focus();
           }
        }
    });
}