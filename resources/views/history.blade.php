@extends('layout/master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('partials/redirectHomeUser')
            @include('partials/formSearchCar')
            <div class="col-xs-12">
                <div class="list-group">
                    <div class="list-group-item disabled text-center">
                        Cambios de Aceite
                    </div>

                    <div class="list-group-item">
                        <div class="row">
                            <div class="col-xs-2">
                                <i class="fa fa-car fa-2x" aria-hidden="true"></i>
                            </div>
                            <div class="col-xs-10">
                                <p class="date-text-history">20 de junio del 2019</p>
                            </div>
                        </div>
                    </div>

                    <div class="list-group-item">
                        <div class="row">
                            <div class="col-xs-2">
                                <i class="fa fa-car fa-2x" aria-hidden="true"></i>
                            </div>
                            <div class="col-xs-10">
                                <p class="date-text-history">20 de junio del 2019</p>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row">
                            <div class="col-xs-2">
                                <i class="fa fa-car fa-2x" aria-hidden="true"></i>
                            </div>
                            <div class="col-xs-10">
                                <p class="date-text-history">20 de junio del 2019</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection