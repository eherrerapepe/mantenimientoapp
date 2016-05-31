@extends('layout/master')

@section('content')
    <div class="container-fluid" ng-controller="timeLineCtrl">
        <div class="row">
            @include('partials/redirectHomeUser')
            @include('partials/formSearchCar')
            <div class="col-xs-12">
                @if($flag != 0)
                    <section id="cd-timeline" class="cd-container">

                        <div class="cd-timeline-block" ng-repeat="car in listCar">
                            <div class="cd-timeline-img cd-picture" ng-class="{'box-green': car.state == 1,'box-white': car.state == 0}">
                                <i class="fa fa-car fa-2x" aria-hidden="true"></i>
                            </div> <!-- cd-timeline-img -->

                            <div class="cd-timeline-content">
                                <h4 class="text-primary">@{{ car.dateChange }}</h4>
                                <p>@{{ car.description }}</p>
                                <a href="#" class="btn btn-primary">Modificar</a>
                            </div> <!-- cd-timeline-content -->
                        </div> <!-- cd-timeline-block -->

                    </section>
                @else
                    <h4 class="text-center white-color">Automovil no registrado</h4>
                @endif
            </div>
        </div>
    </div>
@endsection