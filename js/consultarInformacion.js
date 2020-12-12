const formulario=document.getElementById("formulario");
const inputs=document.querySelectorAll("#formulario input");


$(document).ready( function () {
    $("#btnReporte").on(click,generarReporte());
    function generarReporte(){
        url = $(this).attr("href","../php/fpdfx.php");
        window.open(url, '_blank');
    }
    
    listar();
    //llenarTabla();
    $('#formulario').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            apellidos: {
                validators: {
                    notEmpty: {
                        message: 'Se requiere llenar este campo'
                    },
                }
            },
            fechaInicial: {
                validators: {
                    notEmpty: {
                        message: 'Se requiere llenar este campo'
                    },
                }
            },
            fechaFinal: {
                validators: {
                    notEmpty: {
                        message: 'Se requiere llenar este campo'
                    },
                }
            }
        }
    });
    
} );
//Funciona
formulario.addEventListener("submit", function(e){
    
});


function llenarTabla(){
    let lista=[];
    //lista=obtenerGrupos();

    let idTabla='#tblDatos';
    $('#tblDatos').DataTable({
        data: lista,
        columns:[
            {title:"Apellido Paterno", data:"grupo"},
            {title:"Apellido Materno", data:"materia"},
            {title:"Nombre", data:"creditos"},
            {title:"Apoyo", data:"lugares"},
            {title:"Fecha", data:"lugares"}
        ],
        "fnInitComplete": function (oSettings, json) {
            /*Configuración de los filtros individuales*/
            var fila = $(this).children("thead").children("tr").clone();
            var pie = $("<tfoot/>").append(fila).css("display", "table-header-group");
            $(this).children("thead").after(pie);
            $(fila).children().each(function () {
                $(this).prop("class", null);
            });

            $(fila).children("th").each(function () {
                var title = $(this).text().toLowerCase();
                $(this).html('<input type="text" class="filtro form-control input-sm" style="width:90%;" placeholder="Buscar ' + title + '" />');
            });
            
            let tabla = this;
            //Activa el filtrado
            tabla.api().columns().eq(0).each(function (colIdx) {
                $(idTabla + ' tfoot th:eq(' + colIdx + ') input').on('keyup change', function () {
                    tabla.api().column(colIdx).search(this.value).draw();
                });

                $('input', tabla.api().column(colIdx).footer()).on('click', function (e) {
                    e.stopPropagation();
                });
            });
        },
        'order': [[1, 'asc'],[0, 'asc']],
        'language': {'url':'http://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json'}
    });
}

var listar=function(){
    var table=$("#tblDatos").DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        "ajax":{
            "method": "POST",
            "url":"obtencionConsultas.php"
        },
        "columns":[
            {"data":"id_persona"},
            {"data":"apellido_paterno"},
            {"data":"apellido_materno"},
            {"data":"nombre"},
            {"data":"curp"},
            {"data":"ine"},
            {"data":"telefono_fijo"},
            {"data":"telefono_celular"},
            {"data":"direccion"},
            {"data":"municipio"},
            {"data":"apoyo"},
            {"data":"estatus"},
            {"data":"fecha"}
        ]
    });
}