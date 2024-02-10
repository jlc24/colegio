<div class="modal fade" id="modal_editar_profesor" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarProfesor">{{ __('Modificar datos de Profesor') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><hr>
            <div class="modal-body">
                <form id="formulario_editar_profesor">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label mt-3" for="documentoUpdate"><h6>{{ __('Documento: ') }}<span class="text-danger">*</span></h6></label>
                            <input type="hidden" name="idUpdate" id="idUpdate" class="idUpdate">
                            <input type="text" id="documentoUpdate" class="form-control documentoUpdate" name="documentoUpdate" oninput="this.value = this.value.toUpperCase()" autofocus autocomplete="no"/>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label mt-3" for="fecNacUpdate"><h6>{{ __('Fecha Nac.: ') }}<span class="text-danger">*</span></h6></label>
                            <input type="date" id="fecNacUpdate" class="form-control fecNacUpdate" name="fecNacUpdate" oninput="this.value = this.value.toUpperCase()" autofocus autocomplete="no"/>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label mt-3" for="telefonoUpdate"><h6>{{ __('Telefono: ') }}<span class="text-danger">*</span></h6></label>
                            <input type="number" id="telefonoUpdate" class="form-control telefonoUpdate" name="telefonoUpdate" oninput="this.value = this.value.toUpperCase()" autofocus autocomplete="no"/>
                        </div>
                    </div><br>
                    <div class="row">
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
                        <div class="col-md-3 col-sm-12">
                            <label class="form-label mt-3" for="especialidadUpdate"><h6>{{ __('Especialidad: ') }}<span class="text-danger">*</span></h6></label>
                        </div>
                        <div class="col-md-9 col-sm-12">
                            <input type="text" id="especialidadUpdate" class="form-control especialidadUpdate" name="especialidadUpdate" oninput="this.value = this.value.toUpperCase()" autofocus autocomplete="no"/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-label-success me-sm-3 me-1 ActualizarProfesor" id="ActualizarProfesor">{{ __('Actualizar') }}</button>
                <button type="reset" class="btn btn-label-secondary btnCancelarEdit" data-bs-dismiss="modal" id="btnCancelarEdit">{{ __('Cancelar') }}</button>
            </div>
        </div>
    </div>
</div>