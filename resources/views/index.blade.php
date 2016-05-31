@extends('layout/master')
@section('content')
<div class="container-fluid">
    <div class="row cnt-nav">
        <div class="col-xs-4 col-sm-5 cnt-auto">
            <img src="{{ asset('assets/img/auto.png') }}" class="img-auto">
        </div>
        <div class="col-xs-8 col-sm-7">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-12 center-img">
                            <img src="{{ asset('assets/img/user.png') }}" class="img-responsive img-circle">
                        </div>
                        <div class="col-xs-12 text-center white-color cnt-name-welcome">
                            @foreach($userProfile as $user)
                                <p><strong>{{ $user->nameUser }}</strong></p>
                            @endforeach
                            <small>Bienvenido valvoline</small>
                        </div>
                    </div>
                </div>
            </div>
            @include('partials/navPageIndex')
            <input type="hidden" id="flagModal" value="{{ $flagModal }}">

            @include('partials/modal')

        </div>
    </div>
</div>
@endsection