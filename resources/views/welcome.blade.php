@extends('layouts.app')

@section('contenido')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <span><h4>HOLA, BIENVENIDO</h4></span>
          </div>
          <div class="card-body">
            {{ Request::path() }}
          </div>
        </div>

      </div>
    </div>
</div>
@endsection
