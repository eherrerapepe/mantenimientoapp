@extends('layout/master')

@section('content')
    <div class="container-fluid" ng-controller="timeLineCtrl">
        <div class="row">
            @include('partials/redirectHomeUser')
            @include('partials/formSearchCar')
            <div class="col-xs-12">
                @if($flag != 0)
                    <div class="list-group">
                        <div class="list-group-item disabled text-center">
                            Historial de Mantenimiento
                        </div>

                        <div class="list-group-item" ng-class="{'list-group-item-success': car.state == 1}" ng-repeat="car in listCar">
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <i class="fa fa-car fa-2x" aria-hidden="true"></i><br><span class="date-text-history">@{{ car.dateChange }}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                @else
                    <h4 class="text-center white-color">Automovil no registrado</h4>
                @endif
            </div>
        </div>
    </div>
@endsection