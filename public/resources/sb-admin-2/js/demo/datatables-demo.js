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
        }, // Target escoge la fila (es un arrya desde 0), visible, controla si aparece o no en el dom, y searchable, permite o no su busqueda por esa fila
        // orderable permite hablitar o desaviliar el ordenamiento
        "columnDefs": [{
                // Habilitar que se muestre
                // "targets": [0],
                // "visible": false,
            },
            {
                // Ser un parámetro de búsqueda
                // "targets": [0],
                // "searchable": false
                "targets": [0],
                "searchable": true,

            },
            {
                // Habilitar el orden
                "targets": [6],
                "orderable": false
            }
        ],
        // Ordenamiento inicial por columna
        "order": [
            [0, "desc"]
        ]
    });
});
// Tabla Negociantes
$(document).ready(function() {
    $('#tablaNegociantes').DataTable({
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
        }, // Target escoge la fila (es un arrya desde 0), visible, controla si aparece o no en el dom, y searchable, permite o no su busqueda por esa fila
        // orderable permite hablitar o desaviliar el ordenamiento
        "columnDefs": [{
                // Habilitar que se muestre
                "targets": [],
                "visible": false,
            },
            {
                // Ser un parámetro de búsqueda
                "targets": [],
                "searchable": false
            },
            {
                // Habilitar el orden
                "targets": [3],
                "orderable": false
            }
        ],
        // Ordenamiento inicial por columna
        "order": [
            [1, "desc"]
        ]
    });
});
// Tabla Producción
$(document).ready(function() {
    $('#tablaProduccion').DataTable({
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
        }, // Target escoge la fila (es un arrya desde 0), visible, controla si aparece o no en el dom, y searchable, permite o no su busqueda por esa fila
        // orderable permite hablitar o desaviliar el ordenamiento
        "columnDefs": [{
                // Habilitar que se muestre
                "targets": [1, 3],
                "visible": false,
            },
            {
                // Ser un parámetro de búsqueda
                "targets": [5],
                "searchable": false
            },
            {
                // Habilitar el orden
                "targets": [0, 5],
                "orderable": false
            }
        ],
        // Ordenamiento inicial por columna
        "order": [
            [1, "desc"]
        ]
    });
});
$(document).ready(function() {
    $('#tablaHistorial').DataTable({
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
        }, // Target escoge la fila (es un arrya desde 0), visible, controla si aparece o no en el dom, y searchable, permite o no su busqueda por esa fila
        // orderable permite hablitar o desaviliar el ordenamiento
        "columnDefs": [{
                // Habilitar que se muestre
                "targets": [1],
                "visible": false,
            },
            {
                // Ser un parámetro de búsqueda
                // "targets": [],
                // "searchable": false
            },
            {
                // Habilitar el orden
                "targets": [0, 1, 3],
                "orderable": false
            }
        ],
        // Ordenamiento inicial por columna
        "order": [
            [1, "desc"]
        ]
    });
});
$(document).ready(function() {
    $('#tablaUsuarios').DataTable({
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
        }, // Target escoge la fila (es un arrya desde 0), visible, controla si aparece o no en el dom, y searchable, permite o no su busqueda por esa fila
        // orderable permite hablitar o desaviliar el ordenamiento
        "columnDefs": [{
                // Habilitar que se muestre
                // "targets": [],
                // "visible": false,
            },
            {
                // Ser un parámetro de búsqueda
                // "targets": [],
                // "searchable": false
            },
            {
                // Habilitar el orden
                "targets": [0, 3],
                "orderable": false
            }
        ],
        // Ordenamiento inicial por columna
        "order": [
            [1, "asc"]
        ]
    });
});
// Tabla compras
$(document).ready(function() {
    $('#tablaCompras').DataTable({
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
        }, // Target escoge la fila (es un arrya desde 0), visible, controla si aparece o no en el dom, y searchable, permite o no su busqueda por esa fila
        // orderable permite hablitar o desaviliar el ordenamiento
        "columnDefs": [{
                // Habilitar que se muestre
                "targets": [1, 3],
                "visible": false,
            },
            {
                // Ser un parámetro de búsqueda
                "targets": [0],
                "searchable": false
            },
            {
                // Habilitar el orden
                "targets": [0, 6],
                "orderable": false
            }
        ],
        // Ordenamiento inicial por columna
        "order": [
            [1, "desc"]
        ]
    });
});
// Tabla reportes
$(document).ready(function() {
    $('#tablaReporte').DataTable({
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
        }, // Target escoge la fila (es un arrya desde 0), visible, controla si aparece o no en el dom, y searchable, permite o no su busqueda por esa fila
        // orderable permite hablitar o desaviliar el ordenamiento
        "columnDefs": [{
                // Habilitar que se muestre
                "targets": [0],
                "visible": false,
            },
            {
                // Ser un parámetro de búsqueda
                // "targets": [],
                // "searchable": false
            },
            {
                // Habilitar el orden
                // "targets": [0, 1, 3],
                // "orderable": false
            }
        ],
        // Ordenamiento inicial por columna
        "order": [
            [0, "desc"]
        ]
    });
});