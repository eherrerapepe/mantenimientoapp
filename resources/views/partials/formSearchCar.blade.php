<div class="col-xs-12 cnt-search">
    <form action="">
        <div class="form-group">
            <label for="car_model" class="white-color">Seleccione el Vehículo</label>
            <select id="car_model" class="form-control" ng-model="itemSelect">
                <option value="">Seleccione uno de sus automóviles</option>
                @if($flag != 0)
                    @foreach($cars as $car)
                        <option value="{{ $car->id }}" selected="selected">{{ $car->model }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </form>
</div>