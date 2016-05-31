@extends('layout/master')

@section('content')
    <div class="container-fluid cnt-user-profile">
        <div class="row">
            @include('partials/redirectHomeUser')

            @if(count($userProfile)>0)
                @foreach($userProfile as $user)
                    <div class="col-xs-12 center-img img-user-profile">
                        <img src="storage/{{ $user->photoUser }}" class="img-responsive img-circle">
                    </div>
                    <div class="cnt-dates-user">
                        <div class="col xs 12 text-center">
                            <strong>Nombre:</strong>
                            <p>{{ $user->nameUser }}</p>
                        </div>
                        <div class="col xs 12 text-center">
                            <strong>e-mail:</strong>
                            <p>{{ $user->email }}</p>
                        </div>
                        <div class="col-xs-10 col-xs-offset-1">
                            <hr>
                        </div>
                        <div class="col xs 12 text-center">
                            <a href="{{ url('edit_user') }}" class="btn btn-primary">Editar</a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-xs-12 center-img img-user-profile">
                    <img src="storage/user.png" class="img-responsive img-circle">
                </div>
                <div class="cnt-dates-user">
                    <div class="col xs 12 text-center">
                        <strong>Nombre:</strong>
                        <p>Valvoline User</p>
                    </div>
                    <div class="col xs 12 text-center">
                        <strong>e-mail:</strong>
                        <p>valvoline_email@default.com</p>
                    </div>
                    <div class="col-xs-10 col-xs-offset-1">
                        <hr>
                    </div>
                    <div class="col xs 12 text-center">
                        <a href="{{ route('forUserProfile') }}" class="btn btn-primary">Registrar</a>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection