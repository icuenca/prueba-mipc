$(function()
 {
    listaMaterias()
 });
function listaMaterias()
{
    $('#tabla-data').DataTable().clear().draw();
    $('#tabla-data').DataTable().destroy();
    $.post('ajax.php?c=materias&f=listaMaterias',
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
                        { data: 'inscritos' },
                        { data: 'borrar' }
                    ]
                });                
        });
}

function verAlumnos(id)
{
    $.post('ajax.php?c=materias&f=listaAlumnosInscritos',
        {
            idmateria:id
        },   
        function(data)
        {
            $("#lista-alumnos").html(data);
        });
}

function calificar(idmateria,idalumno)
{
    $("#btn-cal").after("<input id='textcal' type='text' onfocusout=\"guardarcal('"+idmateria+"',"+idalumno+")\">").hide();

}

function guardarcal(idmateria,idalumno)
{
    $.post('ajax.php?c=materias&f=guardarcal',
        {
            idmateria:idmateria,
            idalumno:idalumno,
            val: $("#textcal").val()
        },   
        function(data)
        {
            if(data)
                $("#textcal").after("<span>"+$("#textcal").val()+"</span>").hide();
            else
                alert("Hubo un problema")

        });
}

function eliminar_materia(idmateria)
{
    if(confirm("Desea eliminar la materia?"))
    {
         $.post('ajax.php?c=materias&f=eliminar_materia',
        {
            idmateria:idmateria
        },   
        function(data)
        {
            if(data)
            {
                alert("La materia se eliminó satisfactoriamente");
                listaMaterias()
            }
            else
                alert("Hubo un problema")

        });
    }
}