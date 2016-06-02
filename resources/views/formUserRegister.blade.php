@extends('layout/master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('partials/redirectHomeUser')
            <div class="col-xs-12">
                <form method="post" action="{{ route('saveUserProfile') }}">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nameUser">Nombre:</label>
                            <input type="text" class="form-control" id="nameUser" name="nameUser">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection