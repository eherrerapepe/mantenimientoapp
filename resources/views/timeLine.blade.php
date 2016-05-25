@extends('layout/master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('partials/redirectHomeUser')
            @include('partials/formSearchCar')
            <div class="col-xs-12">
                <section id="cd-timeline" class="cd-container">

                    <div class="cd-timeline-block">
                        <div class="cd-timeline-img cd-picture">
                            <i class="fa fa-car fa-2x" aria-hidden="true"></i>
                        </div> <!-- cd-timeline-img -->

                        <div class="cd-timeline-content">
                            <h2>Chevrolet</h2>
                            <p>Cambio de aceite realizado</p>
                            <span class="cd-date">27 Junio 2016</span>
                            <a href="#0" class="btn btn-primary">Modificar</a>
                        </div> <!-- cd-timeline-content -->
                    </div> <!-- cd-timeline-block -->

                </section>
            </div>
        </div>
    </div>
@endsection