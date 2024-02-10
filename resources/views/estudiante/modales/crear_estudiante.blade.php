<div class="modal fade" id="modal_crear_estudiante" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarEstudiante">{{ __('Agregar Nuevo Estudiante') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><hr>
            <div class="modal-body">
                <form class="pt-0 row g-2" id="formulario_crear_estudiante">
                    <div class="col-md-2 col-sm-12">
                        <label class="form-label mt-3" for="documento"><h6>{{ __('Documento: ') }}<span class="text-danger">*</span></h6></label>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <input type="text" id="documento" class="form-control documento" name="documento" oninput="this.value = this.value.toUpperCase()" autofocus autocomplete="no"/>
                    </div>
                    <div class="col-md-2 col-sm-12 text-md-end text-sm-start">
                        <label class="form-label mt-3" for="genero"><h6>{{ __('Genero: ') }}<span class="text-danger">*</span></h6></label>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <select id="genero" class="select2 form-select form-select-lg genero" id="genero" data-allow-clear="true">
                            <option value="">Seleccionar...</option>
                            <option value="MASCULINO">MASCULINO</option>
                            <option value="FEMENINO">FEMENINO</option>
                            <option value="OTRO">OTRO</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <label class="form-label mt-3" for="nombres"><h6>{{ __('Nombres: ') }}<span class="text-danger">*</span></h6></label>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <input type="text" id="nombres" class="form-control nombres" name="nombres" oninput="this.value = this.value.toUpperCase()" autofocus autocomplete="no"/>
                    </div>
                    <div class="col-md-2 col-sm-12 text-md-end text-sm-start">
                        <label class="form-label mt-3" for="apellidos"><h6>{{ __('Apellidos: ') }}<span class="text-danger">*</span></h6></label>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <input type="text" id="apellidos" class="form-control apellidos" name="apellidos" oninput="this.value = this.value.toUpperCase()" autofocus autocomplete="no"/>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <label class="form-label mt-3" for="fecNac"><h6>{{ __('Fecha Nac.: ') }}<span class="text-danger">*</span></h6></label>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <input type="date" id="fecNac" class="form-control fecNac" name="fecNac" oninput="this.value = this.value.toUpperCase()" autofocus autocomplete="no"/>
                    </div>
                    <div class="col-md-2 col-sm-12 text-md-end text-sm-start">
                        <label class="form-label mt-3" for="telefono"><h6>{{ __('Telefono: ') }}<span class="text-danger">*</span></h6></label>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <input type="number" id="telefono" class="form-control telefono" name="telefono" oninput="this.value = this.value.toUpperCase()" autofocus autocomplete="no"/>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <label class="form-label mt-3" for="direccion"><h6>{{ __('Direccion: ') }}<span class="text-danger">*</span></h6></label>
                    </div>
                    <div class="col-md-10 col-sm-12">
                        <input type="text" id="direccion" class="form-control direccion" name="direccion" oninput="this.value = this.value.toUpperCase()" autofocus autocomplete="no"/>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <label class="form-label mt-3" for="email"><h6>{{ __('Email: ') }}<span class="text-danger">*</span></h6></label>
                    </div>
                    <div class="col-md-10 col-sm-12">
                        <input type="email" id="email" class="form-control email" name="email" autofocus autocomplete="no"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-label-success me-sm-3 me-1 GuardarEstudiante" id="GuardarEstudiante">{{ __('Guardar') }}</button>
                <button type="reset" class="btn btn-label-secondary btnCancelarCrear" data-bs-dismiss="modal" id="btnCancelarCrear">{{ __('Cancelar') }}</button>
            </div>
        </div>
    </div>
</div>