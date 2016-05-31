@extends('layout/master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('partials/redirectHomeUser')

            <div class="col-xs-12 text-center">
                <ul class="list-group">
                    @if($cars !== 1)
                        @foreach($cars as $car)
                            <li class="list-group-item"><i class="fa fa-car fa-3x" aria-hidden="true"></i> <strong class="text-primary text-list-car">{{ $car->model }}</strong></li>
                        @endforeach
                    @endif
                </ul>
            </div>

            <div class="col-xs-12 text-center">
                <hr>
                <a href="{{ route('registerNewCar') }}" class="btn btn-plus"><i class="fa fa-plus fa-2x"></i></a>
            </div>
        </div>
    </div>
@endsection