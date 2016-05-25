@extends('layout/master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('partials/redirectHomeUser')
            <div class="col xs 12 text-center">
                <hr>
                <a href="{{ route('registerNewCar') }}" class="btn btn-plus"><i class="fa fa-plus fa-2x"></i></a>
            </div>
        </div>
    </div>
@endsection