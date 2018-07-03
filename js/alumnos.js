$(function()
 {
    $.fn.modal.Constructor.prototype.enforceFocus = function () {};
    listaAlumnos()
    $("#materias").select2({'width':'100%'});
 });
function listaAlumnos()
{

    $.post('ajax.php?c=alumnos&f=listaAlumnos',
        {
            
        },
        function(data)
        {
            console.log(data)
           var datos = jQuery.parseJSON(data);
                $('#tabla-data').DataTable( {
                    dom: 'Bfrtip',
                    buttons: ['excel'],
                    language: {
                        search: "Buscar:",
                        lengthMenu:"Mostrar _MENU_ elementos",
                        zeroRecords: "No hay coincidencias.",
                        infoEmpty: "No hay coincidencias que mostrar.",
                        infoFiltered: "",
                        info:"Mostrando del _START_ al _END_ de _TOTAL_ cuentas",
                        paginate: {
                            first:      "Primero",
                            previous:   "Anterior",
                            next:       "Siguiente",
                            last:       "Último"
                        }
                     },
                     "order": [[ 0, "asc" ]],
                     data:datos,
                     columns: [
                        { data: 'codigo' },
                        { data: 'nombre' },
                        { data: 'apellidos' },
                        { data: 'fechanac' },
                        { data: 'materias' },
                        { data: 'inscribir' }
                    ]
                });                
        });
}

function verMaterias(id)
{
    $.post('ajax.php?c=alumnos&f=listaMateriasInscritos',
        {
            idalumno:id
        },   
        function(data)
        {
            $("#lista-materias").html(data);
        });
}

function relacionar(idalumno)
{
    $("#idalumno").val(idalumno);
}

function guardar_relacion()
{
    $.post('ajax.php?c=alumnos&f=guardar_relacion',
        {
            idalumno:$("#idalumno").val(),
            idmateria:$("#materias").val()
        },   
        function(data)
        {
            if(data)
                alert("Registro Guardado")
            else
                alert("Ocurrio un error")
        });
}