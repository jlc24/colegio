<div class="modal fade" id="modal_editar_estudiante" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarEstudiante">{{ __('Modificar datos de Estudiante') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><hr>
            <div class="modal-body">
                <form class="pt-0 row g-2" id="formulario_editar_estudiante">
                    <div class="col-md-2 col-sm-12">
                        <input type="hidden" name="idUpdate" id="idUpdate" class="idUpdate">
                        <label class="form-label mt-3" for="documentoUpdate"><h6>{{ __('Documento: ') }}<span class="text-danger">*</span></h6></label>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <input type="text" id="documentoUpdate" class="form-control documentoUpdate" name="documentoUpdate" oninput="this.value = this.value.toUpperCase()" autofocus autocomplete="no"/>
                    </div>
                    <div class="col-md-2 col-sm-12 text-md-end text-sm-start">
                        <label class="form-label mt-3" for="generoUpdate"><h6>{{ __('Genero: ') }}<span class="text-danger">*</span></h6></label>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <select id="generoUpdate" class="form-select form-select-lg generoUpdate" id="generoUpdate" data-allow-clear="true">
                            <option value="">Seleccionar...</option>
                            <option value="MASCULINO">MASCULINO</option>
                            <option value="FEMENINO">FEMENINO</option>
                            <option value="OTRO">OTRO</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <label class="form-label mt-3" for="nombresUpdate"><h6>{{ __('Nombres: ') }}<span class="text-danger">*</span></h6></label>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <input type="text" id="nombresUpdate" class="form-control nombresUpdate" name="nombresUpdate" oninput="this.value = this.value.toUpperCase()" autofocus autocomplete="no"/>
                    </div>
                    <div class="col-md-2 col-sm-12 text-md-end text-sm-start">
                        <label class="form-label mt-3" for="apellidosUpdate"><h6>{{ __('Apellidos: ') }}<span class="text-danger">*</span></h6></label>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <input type="text" id="apellidosUpdate" class="form-control apellidosUpdate" name="apellidosUpdate" oninput="this.value = this.value.toUpperCase()" autofocus autocomplete="no"/>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <label class="form-label mt-3" for="fecNacpdate"><h6>{{ __('Fecha Nac.: ') }}<span class="text-danger">*</span></h6></label>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <input type="date" id="fecNacUpdate" class="form-control fecNacUpdate" name="fecNacUpdate" oninput="this.value = this.value.toUpperCase()" autofocus autocomplete="no"/>
                    </div>
                    <div class="col-md-2 col-sm-12 text-md-end text-sm-start">
                        <label class="form-label mt-3" for="telefonoUpdate"><h6>{{ __('Telefono: ') }}<span class="text-danger">*</span></h6></label>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <input type="number" id="telefonoUpdate" class="form-control telefonoUpdate" name="telefonoUpdate" oninput="this.value = this.value.toUpperCase()" autofocus autocomplete="no"/>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <label class="form-label mt-3" for="direccionUpdate"><h6>{{ __('Direccion: ') }}<span class="text-danger">*</span></h6></label>
                    </div>
                    <div class="col-md-10 col-sm-12">
                        <input type="text" id="direccionUpdate" class="form-control direccionUpdate" name="direccionUpdate" oninput="this.value = this.value.toUpperCase()" autofocus autocomplete="no"/>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <label class="form-label mt-3" for="emailUpdate"><h6>{{ __('Email: ') }}<span class="text-danger">*</span></h6></label>
                    </div>
                    <div class="col-md-10 col-sm-12">
                        <input type="email" id="emailUpdate" class="form-control emailUpdate" name="emailUpdate" autofocus autocomplete="no"/>
                    </div>
                </form><br>
            </div>
            <div class="modal-footer">
                <button class="btn btn-label-success me-sm-3 me-1 ActualizarEstudiante" id="ActualizarEstudiante">{{ __('Actualizar') }}</button>
                <button type="reset" class="btn btn-label-secondary btnCancelarEdit" data-bs-dismiss="modal" id="btnCancelarEdit">{{ __('Cancelar') }}</button>
            </div>
        </div>
    </div>
</div>