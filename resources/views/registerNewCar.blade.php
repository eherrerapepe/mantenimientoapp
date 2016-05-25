@extends('layout/master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('partials/redirectHomeUser')
            <div class="col-xs-12 cnt-form-register-new-car">
                <form method="post" action="{{ route('storeNewCar') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="model"><span class="required">*</span> Modelo:</label>
                        <input type="text" class="form-control" id="model" name="model">
                    </div>
                    <div class="form-group">
                        <label for="km_actual"><span class="required">*</span> Km Recorridos:</label>
                        <input type="text" class="form-control" id="km_actual" name="km_actual">
                    </div>
                    <div class="form-group">
                        <label for="approximate_travel"><span class="required">*</span> Km Diario:</label>
                        <input type="text" class="form-control" id="approximate_travel" name="approximate_travel">
                        <small class="help-block">Km que recorre aproximadamente</small>
                    </div>
                    <div class="form-group">
                        <label for="dateChange"><span class="required">*</span> Fecha:</label>
                        <input type="text" class="form-control" id="dateChange" name="dateChange">
                        <small class="help-block">Fecha del ultimo cambio de aceite</small>
                    </div>
                    <div class="form-group">
                        <label for="photo_car">Foto:</label>
                        <div class="cnt-file">
                            <p id="texto-file">Seleccionar</p>
                            <input type="file" id="photo_car" name="photo_car">
                        </div>
                        <small class="help-block">Este campo no es obligatorio</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection