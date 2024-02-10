<script type="text/javascript">
    $(document).ready(function () {
        $('#modal_crear_profesor').on('shown.bs.modal', function () {
            $('#documento').trigger('focus');
        });
        function getProfesores() {
            var tabla_profesores = $('#tabla-profesores'), dt_profesores;
            if (tabla_profesores.length) {
                dt_profesores = tabla_profesores.DataTable({
                    ajax: {
                        url: '{{ route("profesores.show") }}',
                        type: 'GET',
                        dataType: 'json',
                        dataSrc: function (data) {
                            return data;
                        }
                    },
                    columns: [
                        { data: '' }, //0
                        { data: 'id' }, //2
                        { data: 'ci' },
                        { data: 'nombres' },
                        { data: 'apellidos' },
                        { data: 'telefono' },
                        { data: 'direccion' },
                        {
                            data: 'estado',
                            className: 'text-center'
                        },
                        {
                            data: '',
                            className: 'text-center'
                        }
                    ],

                    columnDefs: [
                        {
                            // For Responsive
                            className: 'control',
                            orderable: false,
                            searchable: false,
                            responsivePriority: 2,
                            targets: 0,
                            render: function (data, type, full, meta) {
                                return '';
                            }
                        },
                        {
                            targets: 1,
                            searchable: false,
                            responsivePriority: 1,
                        },
                        {
                            targets: 2,
                            responsivePriority: 1,
                        },
                        {
                            targets: 3,
                            responsivePriority: 2,
                        },
                        {
                            targets: 4,
                            responsivePriority: 2,
                        },
                        {
                            targets: 5,
                            responsivePriority: 3,
                        },
                        {
                            targets: 6,
                            responsivePriority: 3,
                        },
                        {
                            targets: 7,
                            render: function (data, type, full, meta) {
                                var $status_number = full['estado'];
                                var $status = {
                                    0: { title: 'INHABILITADO', class: ' bg-label-danger' },
                                    1: { title: 'HABILITADO', class: 'bg-label-success' }
                                };
                                if (typeof $status[$status_number] === 'undefined') {
                                    return data;
                                }
                                var actionClass = $status[$status_number].title === 'HABILITADO' ? 'desactivar' : 'activar';
                                return (
                                    '<a href="javascript:;" class="' + actionClass + '"><span class="badge ' + $status[$status_number].class + '">' + $status[$status_number].title + '</span></a>'
                                );
                            }
                        },
                        {
                            targets: 8,
                            title: 'Accion',
                            orderable: false,
                            searchable: false,
                            render: function (data, type, full, meta) {
                                var estado = full['estado'];
                                var botones =   `<div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-sm btn-label-warning ProfesorEditar" id="ProfesorEditar" title="Editar Profesor" data-bs-toggle="modal" data-bs-target="#modal_editar_profesor">
                                                        <i class="bx bxs-edit bx-sm"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-label-danger ProfesorEliminar" id="ProfesorEliminar" title="Eliminar Profesor">
                                                        <i class="bx bxs-trash bx-sm"></i>
                                                    </button>
                                                </div>`;
                                return botones;
                            }
                        }
                    ],
                    order: [[1, 'desc']],
                    dom: '<"card-header flex-column flex-md-row"<"dt-action-buttons text-start me-auto pt-3 pt-md-0"B><"head-label text-center">><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    displayLength: 10,
                    lengthMenu: [10, 25, 50, 75, 100],
                    language: {
                        sProcessing: 'Procesando...',
                        sLengthMenu: 'Mostrar _MENU_ registros',
                        sZeroRecords: 'No se encontraron resultados',
                        sEmptyTable: 'Ningún dato disponible en esta tabla',
                        sInfo: 'Registros del _START_ al _END_ de un total de _TOTAL_ ' ,
                        sInfoEmpty: 'Registros del 0 al 0 de un total de 0 ' ,
                        sInfoFiltered: '(filtrado de un total de _MAX_ registros)',
                        sInfoPostFix: '',
                        sSearch: 'Buscar:',
                        sUrl: '',
                        sInfoThousands: ',',
                        sLoadingRecords: 'Cargando datos...',
                        oPaginate: {
                            sFirst: 'Primero',
                            sLast: 'Último',
                            sNext: 'Siguiente',
                            sPrevious: 'Anterior'
                        },
                        oAria: {
                            sSortAscending: ': Activar para ordenar la columna de manera ascendente',
                            sSortDescending: ': Activar para ordenar la columna de manera descendente'
                        }
                    },
                    buttons: [
                        {
                            text: '<i class="bx bx-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Nuevo Profesor</span>',
                            className: 'btn btn-primary',
                            action: function () {
                                $('#modal_crear_profesor').modal('show');
                            }
                        },
                        {
                            extend: 'collection',
                            className: 'btn btn-label-primary dropdown-toggle me-2',
                            text: '<i class="bx bx-export me-sm-1"></i> <span class="d-none d-sm-inline-block">Exportar</span>',
                            buttons: [
                                {
                                    extend: 'print',
                                    text: '<i class="bx bx-printer me-1" ></i>Imprimir',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        columns: [1, 2, 3, 4, 5, 6, 7],
                                        // prevent avatar to be display
                                        format: {
                                            body: function (data, row, column, node) {
                                                return node.textContent || node.innerText;
                                            }
                                        }
                                    },
                                    customize: function (win) {
                                        //customize print view for dark
                                        $(win.document.body).prepend('<div class="table-title"><h2 style="text-align: center;" hidden></h2><h3 style="text-align: center;">TABLA PROFESORES</h3></div><br>');
                                        $(win.document.body)
                                        .css('color', config.colors.headingColor)
                                        .css('border-color', config.colors.borderColor)
                                        .css('background-color', config.colors.bodyBg);
                                        $(win.document.body)
                                        .find('table')
                                        .addClass('compact')
                                        .css('color', 'inherit')
                                        .css('border-color', 'inherit')
                                        .css('background-color', 'inherit');
                                    }
                                },
                                {
                                    extend: 'csv',
                                    text: '<i class="bx bx-file me-1" ></i>Csv',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        columns: [1, 2, 3, 4, 5, 6, 7],
                                        // prevent avatar to be display
                                        format: {
                                            body: function (data, row, column, node) {
                                                return node.textContent || node.innerText;
                                            }
                                        }
                                    }
                                },
                                {
                                    extend: 'excel',
                                    text: '<i class="bx bxs-file-export me-1"></i>Excel',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        columns: [1, 2, 3, 4, 5, 6, 7],
                                        // prevent avatar to be display
                                        format: {
                                            body: function (data, row, column, node) {
                                                return node.textContent || node.innerText;
                                            }
                                        }
                                    }
                                },
                                {
                                    extend: 'pdf',
                                    text: '<i class="bx bxs-file-pdf me-1"></i>Pdf',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        columns: [1, 2, 3, 4, 5, 6, 7],
                                        // prevent avatar to be display
                                        format: {
                                            body: function (data, row, column, node) {
                                                return node.textContent || node.innerText;
                                            }
                                        }
                                    }
                                },
                                {
                                    extend: 'copy',
                                    text: '<i class="bx bx-copy me-1" ></i>Copiar',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        columns: [1, 2, 3, 4, 5, 6, 7],
                                        // prevent avatar to be display
                                        format: {
                                            body: function (data, row, column, node) {
                                                return node.textContent || node.innerText;
                                            }
                                        }
                                    }
                                }
                            ]
                        },
                    ],
                    responsive: {
                        details: {
                            display: $.fn.dataTable.Responsive.display.modal({
                                header: function (row) {
                                    var data = row.data();
                                    return data['nombres'] + ' ' + data['apellidos'];
                                }
                            }),
                            type: 'column',
                            renderer: function (api, rowIdx, columns) {
                                var data = $.map(columns, function (col, i) {
                                return col.title !== ''
                                    ? '<tr data-dt-row="' +
                                        col.rowIndex +
                                        '" data-dt-column="' +
                                        col.columnIndex +
                                        '">' +
                                        '<td>' +
                                        col.title +
                                        ':' +
                                        '</td> ' +
                                        '<td>' +
                                        col.data +
                                        '</td>' +
                                        '</tr>'
                                    : '';
                                }).join('');

                                return data ? $('<table class="table"/><tbody />').append(data) : false;
                            }
                        }
                    }
                });
            }
        }

        getProfesores();
 
        $(document).on('click', '#GuardarProfesor', function () {
            let ci = $('#documento').val();
            let especialidad = $('#especialidad').val();
            let nombres = $('#nombres').val();
            let apellidos = $('#apellidos').val();
            let fecnac = $('#fecNac').val();
            let telefono = $('#telefono').val();
            let direccion = $('#direccion').val();
            let email = $('#email').val();
            let estado = '1';

            let datos = new FormData();
            datos.append('ci', ci);
            datos.append('especialidad', especialidad);
            datos.append('nombres', nombres);
            datos.append('apellidos', apellidos);
            datos.append('fec_nac', fecnac);
            datos.append('telefono', telefono);
            datos.append('direccion', direccion);
            datos.append('email', email);
            datos.append('estado', estado);

            let vacio = "";

            if (ci == "") {
                vacio = "DOCUMENTO";
                $('#documento').trigger('focus');
            }else if (especialidad == "") {
                vacio = "ESPECIALIDAD";
                $('#especialidad').trigger('focus');
            }else if (nombres == "") {
                vacio = "NOMBRES";
                $('#nombres').trigger('focus');
            }else if (apellidos == "") {
                vacio = "APELLIDOS";
                $('#apellidos').trigger('focus');
            }else if (fecnac == "" || fecnac == null) {
                vacio = "FECHA NACIMIENTO";
                $('#fecNac').trigger('focus');
            }else if (telefono == "") {
                vacio = "TELEFONO";
                $('#telefono').trigger('focus');
            }else if (direccion == "") {
                vacio = "DIRECCION";
                $('#direccion').trigger('focus');
            }else if (email == "") {
                vacio = "EMAIL";
                $('#email').trigger('focus');
            }else if (estado == "" || estado == null) 
                vacio = "ESTADO";

            if (vacio != "") {
                Swal.fire({
                    title: 'Error!',
                    text: 'Falta el campo ' + vacio,
                    icon: 'error',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    timer: 2000
                });
            }else{
                $.ajax({
                    url: '{{ route("profesor.store") }}',
                    type: 'POST',
                    data: datos,
                    processData: false,
                    contentType: false,
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        if (data.resultado === 'si') {
                            Swal.fire({
                                title: 'Advertencia!',
                                text: 'El profesor ' + nombres + ' ' + apellidos + 'con ' + ci + ' ya se encuentra registrado.',
                                icon: 'warning',
                                showConfirmButton: false,
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                timer: 2000
                            });
                            $("#documento").trigger("focus");
                        }else{
                            Swal.fire({
                                title: '¡Exito!',
                                text: 'Profesor registrado exitosamente.',
                                icon: 'success',
                                showConfirmButton: false,
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                timer: 2000
                            });
                            let tabla = $('.tabla-profesores').DataTable();
                            tabla.destroy();
                            $('#modal_crear_profesor .btn-close').trigger('click');
                            $("#formulario_crear_profesor").trigger('reset');
                            getProfesores();
                        }
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        console.error('Error en la solicitud: ', textStatus, ', detalles: ', errorThrown);
                        Swal.fire({
                            title: 'Oops...',
                            text: 'Se ha producido un error. Intente nuevamente, si el probleme persiste comuniquese con Administracion del Colegio.',
                            icon: 'error',
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEscapeKey: false,
                            timer: 2000
                        });
                    }
                });
            }
        });

        $(document).on('click', '#btnCancelarCrear', function () {
            $('#formulario_crear_profesor').trigger('reset');
        });

        $(document).on('click', '.btnCancelarEdit', function () {
            $('#formulario_editar_profesor').trigger('reset');
        });

        function getProfesor(id) {
            mostrarCargando();
            $.ajax({
                url: '{{ route("profesor.edit", ":id") }}'.replace(":id", id),
                type: 'GET',
                dataType: 'json',
                success: (data) => {
                    $('.idUpdate').val(data.id);
                    $('.especialidadUpdate').val(data.especialidad);
                    $('.documentoUpdate').val(data.ci);
                    $('.nombresUpdate').val(data.nombres);
                    $('.apellidosUpdate').val(data.apellidos);
                    $('.fecNacUpdate').val(data.fec_nac);
                    $('.telefonoUpdate').val(data.telefono);
                    $('.direccionUpdate').val(data.direccion);
                    $('.emailUpdate').val(data.email);
                    cerrarCargando();
                },
                error: function (xhr, textStatus, errorThrown) {
                    cerrarCargando();
                    console.error('Error en la solicitud: ', textStatus, ', detalles: ', errorThrown);
                    Swal.fire({
                        title: 'Oops...',
                        text: 'Se ha producido un error. Intente nuevamente, si el probleme persiste comuniquese con Administracion del Colegio.',
                        icon: 'error',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEscapeKey: false,
                        timer: 2000
                    });
                }
            });
        }

        $(document).on('click', '.ProfesorEditar', function () {
            let id;
            if ($(this).closest('.modal').length > 0) {
                id = $('.modal-body table tbody tr:nth-child(1) td:nth-child(2)').text().trim();
                $('.modal .btn-close').trigger('click');
            } else {
                id = $(this).closest('tr').find('td:eq(1)').text().trim();
            }

            getProfesor(id);
        });

        $(document).on('click', '.ActualizarProfesor', function () {
            let id = $('.idUpdate').val();
            let ci = $('.documentoUpdate').val();
            let especialidad = $('.especialidadUpdate').val();
            let nombres = $('.nombresUpdate').val();
            let apellidos = $('.apellidosUpdate').val();
            let fecnac = $('.fecNacUpdate').val();
            let telefono = $('.telefonoUpdate').val();
            let direccion = $('.direccionUpdate').val();
            let email = $('.emailUpdate').val();
            let estado = '1';

            let datos = new FormData();
            datos.append('ci', ci);
            datos.append('especialidad', especialidad);
            datos.append('nombres', nombres);
            datos.append('apellidos', apellidos);
            datos.append('fec_nac', fecnac);
            datos.append('telefono', telefono);
            datos.append('direccion', direccion);
            datos.append('email', email);
            datos.append('estado', estado);

            let vacio = "";

            if (ci == "") {
                vacio = "DOCUMENTO";
                $('.documentoUpdate').trigger('focus');
            }else if (especialidad == "") {
                vacio = "ESPECIALIDAD";
                $('.especialidadUpdate').trigger('focus');
            }else if (nombres == "") {
                vacio = "NOMBRES";
                $('.nombresUpdate').trigger('focus');
            }else if (apellidos == "") {
                vacio = "APELLIDOS";
                $('.apellidosUpdate').trigger('focus');
            }else if (fecnac == "" || fecnac == null) {
                vacio = "FECHA NACIMIENTO";
                $('.fecNacUpdate').trigger('focus');
            }else if (telefono == "") {
                vacio = "TELEFONO";
                $('.telefonoUpdate').trigger('focus');
            }else if (direccion == "") {
                vacio = "DIRECCION";
                $('.direccionUpdate').trigger('focus');
            }else if (email == "") {
                vacio = "EMAIL";
                $('.emailUpdate').trigger('focus');
            }else if (estado == "" || estado == null) 
                vacio = "ESTADO";

            if (vacio != "") {
                Swal.fire({
                    title: 'Error!',
                    text: 'Falta el campo ' + vacio,
                    icon: 'error',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    timer: 2000
                });
            }else{
                $.ajax({
                    url: '{{ route("profesor.update", ":id") }}'.replace(":id", id),
                    type: 'POST',
                    data: datos,
                    processData: false,
                    contentType: false,
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        Swal.fire({
                            title: '¡Exito!',
                            text: 'Profesor actualizado exitosamente.',
                            icon: 'success',
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            timer: 2000
                        });
                        let tabla = $('.tabla-profesores').DataTable();
                        tabla.destroy();
                        $('#modal_editar_profesor .btn-close').trigger('click');
                        $("#formulario_editar_profesor").trigger('reset');
                        getProfesores();
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        console.error('Error en la solicitud: ', textStatus, ', detalles: ', errorThrown);
                        Swal.fire({
                            title: 'Oops...',
                            text: 'Se ha producido un error. Intente nuevamente, si el probleme persiste comuniquese con Administracion del Colegio.',
                            icon: 'error',
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEscapeKey: false,
                            timer: 2000
                        });
                    }
                });
            }
        });

        function cambiarEstado(id) {
            $.ajax({
                url: '{{ route("profesor.estado", ":id") }}'.replace(":id", id),
                type: "GET",
                dataType: 'json',
                success: (data) => {
                    if (data.resultado == 'ok') {
                        Swal.fire({
                            title: '¡Exito!',
                            text: 'Operacion procesada correctamente.',
                            icon: 'success',
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            timer: 2000
                        });
                        let tabla = $('.tabla-profesores').DataTable();
                        tabla.destroy();
                        getProfesores();
                    }else{
                        Swal.fire({
                            title: 'Oops...',
                            text: 'No se pudo realizar la operacion.',
                            icon: 'error',
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            timer: 2000
                        });
                        let tabla = $('.tabla-profesores').DataTable();
                        tabla.destroy();
                        getProfesores();
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.error('Error en la solicitud: ', textStatus, ', detalles: ', errorThrown);
                    Swal.fire({
                        title: 'Oops...',
                        text: 'Se ha producido un error. Intente nuevamente, si el probleme persiste comuniquese con Administracion del Colegio.',
                        icon: 'error',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEscapeKey: false,
                        timer: 2000
                    });
                }
            });
        }

        $(document).on('click', '.desactivar', function () {
            let id, documento;
            if ($(this).closest('.modal').length > 0) {
                id = $('.modal-body table tbody tr:nth-child(1) td:nth-child(2)').text().trim();
                documento = $('.modal-body table tbody tr:nth-child(2) td:nth-child(2)').text().trim();
            } else {
                id = $(this).closest('tr').find('td:eq(1)').text().trim();
                documento = $(this).closest('tr').find('td:eq(2)').text().trim();
            }

            Swal.fire({
                title: 'DESHABILITAR PROFESOR',
                text: '¿Esta seguro de deshabilitar al profesor NRO: ' + documento + '?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Si, deshabilitar!',
                cancelButtonText: 'Cancelar',
                allowOutsideClick: false,
                allowEscapeKey: false,
                customClass: {
                    confirmButton: 'btn btn-warning me-3',
                    cancelButton: 'btn btn-label-secondary'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.value) {
                    if ($(this).closest('.modal').length > 0) {
                        $('.modal .btn-close').trigger('click');
                    }
                    cambiarEstado(id);
                }else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: 'Cancelado',
                        text: 'El proceso fue cancelado.',
                        icon: 'error',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        timer: 2000
                    });
                }
            });
        });

        $(document).on('click', '.activar', function () {
            let id, nombres, apellidos, documento;
            if ($(this).closest('.modal').length > 0) {
                id = $('.modal-body table tbody tr:nth-child(1) td:nth-child(2)').text().trim();
                documento = $('.modal-body table tbody tr:nth-child(2) td:nth-child(2)').text().trim();
            } else {
                id = $(this).closest('tr').find('td:eq(1)').text().trim();
                documento = $(this).closest('tr').find('td:eq(2)').text().trim();
            }

            Swal.fire({
                title: 'HABILITAR PROFESOR',
                text: '¿Esta seguro de habilitar al profesor NRO: ' + documento + '?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Si, habilitar!',
                cancelButtonText: 'Cancelar',
                allowOutsideClick: false,
                allowEscapeKey: false,
                customClass: {
                    confirmButton: 'btn btn-success me-3',
                    cancelButton: 'btn btn-label-secondary'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.value) {
                    if ($(this).closest('.modal').length > 0) {
                        $('.modal .btn-close').trigger('click');
                    }
                    cambiarEstado(id);
                }else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: 'Cancelado',
                        text: 'El proceso fue cancelado.',
                        icon: 'error',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        timer: 2000
                    });
                }
            });
        });

        function eliminarProfesor(id) {
            $.ajax({
                url: '{{ route("profesor.destroy", ":id") }}'.replace(":id", id),
                type: "GET",
                dataType: 'json',
                success: (data) => {
                    if (data.resultado == 'ok') {
                        Swal.fire({
                            title: '¡Exito!',
                            text: 'Operacion procesada correctamente.',
                            icon: 'success',
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            timer: 2000
                        });
                        let tabla = $('.tabla-profesores').DataTable();
                        tabla.destroy();
                        getProfesores();
                    }else{
                        Swal.fire({
                            title: 'Oops...',
                            text: 'No se pudo realizar la operacion.',
                            icon: 'error',
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            timer: 2000
                        });
                        let tabla = $('.tabla-profesores').DataTable();
                        tabla.destroy();
                        getProfesores();
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.error('Error en la solicitud: ', textStatus, ', detalles: ', errorThrown);
                    Swal.fire({
                        title: 'Oops...',
                        text: 'Se ha producido un error. Intente nuevamente, si el probleme persiste comuniquese con Administracion del Colegio.',
                        icon: 'error',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEscapeKey: false,
                        timer: 2000
                    });
                }
            });
        }

        $(document).on('click', '.ProfesorEliminar', function () {
            let id;
            if ($(this).closest('.modal').length > 0) {
                id = $('.modal-body table tbody tr:nth-child(1) td:nth-child(2)').text().trim();
                documento = $('.modal-body table tbody tr:nth-child(2) td:nth-child(2)').text().trim();
            } else {
                id = $(this).closest('tr').find('td:eq(1)').text().trim();
                documento = $(this).closest('tr').find('td:eq(2)').text().trim();
            }

            Swal.fire({
                title: 'ELIMINAR PROFESOR',
                text: '¿Esta seguro de borrar los datos del profesor NRO: ' + documento + '?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, elimninar!',
                cancelButtonText: 'Cancelar',
                allowOutsideClick: false,
                allowEscapeKey: false,
                customClass: {
                    confirmButton: 'btn btn-danger me-3',
                    cancelButton: 'btn btn-label-secondary'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.value) {
                    if ($(this).closest('.modal').length > 0) {
                        $('.modal .btn-close').trigger('click');
                    }
                    eliminarProfesor(id);
                }else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: 'Cancelado',
                        text: 'El proceso fue cancelado.',
                        icon: 'error',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        timer: 2000
                    });
                }
            });
        })
    });
</script>