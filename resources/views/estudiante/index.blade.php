@extends('layouts.app')

@section('contenido')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-sm-6 mb-3">
        <h4 class=" mb-0">Estudiantes</h4>
    </div>
    <div class="col-lg-12 mt-2">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-datatable table-responsive">
                                <table class="tabla-estudiantes table border-top" id="tabla-estudiantes">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>#</th>
                                            <th>{{ __('CI') }}</th>
                                            <th>{{ __('Nombres') }}</th>
                                            <th>{{ __('Apellidos') }}</th>
                                            <th>{{ __('Telefono') }}</th>
                                            <th>{{ __('Direccion') }}</th>
                                            <th class="text-center">{{ __('Estado') }}</th>
                                            <th class="text-center">{{ __('Accion') }}</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('estudiante.modales.crear_estudiante')
@include('estudiante.modales.editar_estudiante')
@endsection

@section('funciones')
    @include('estudiante.funciones.script')
@endsection

