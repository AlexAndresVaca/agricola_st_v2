// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#tablaProductos').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se han encontrado registros",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Sin resultados",
            "infoFiltered": "(Filtrado de _MAX_ registros existentes)",
            "search": "Buscar",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior",
            }
        }
    });
});