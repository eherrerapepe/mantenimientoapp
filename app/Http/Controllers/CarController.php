<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    //Pagina inical para visualizar los automoviles registrados
    public function index()
    {
        return view('registerCar');

    }

    //Cargamos el formulario para el geristro de un nuevo automovil
    public function registerNewCar()
    {
        return view('registerNewCar');
    }

    //Guardamos el registro del automovil en la base de datos
    public function storeNewCar(Request $request){
        
    }
}
