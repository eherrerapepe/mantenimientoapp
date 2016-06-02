@extends('layout/master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('partials/redirectHomeUser')
            <div class="col-xs-12">
                @foreach($userProfile as $user)
                    <form method="post" action="{{ url('updateUserProfile') }}">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <input type="hidden" name="id_user_edit" value="{{ $user->id }}">
                            <div class="form-group">
                                <label for="nameUser">Nombre:</label>
                                <input type="text" class="form-control" id="nameUser" name="nameUser" value="{{ $user->nameUser }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection