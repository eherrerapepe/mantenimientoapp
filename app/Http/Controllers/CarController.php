<?php

namespace App\Http\Controllers;

use App\Car;
use App\TimeLine;
use App\UserProfile;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Input;

class CarController extends Controller
{
    //Pagina inical para visualizar los automoviles registrados
    public function index(Request $request)
    {
        /*///////////////////////////////////////////////////////////////////////////////////////////////////
        //Consultamos y lanzamos las alertas
        $dataTime = TimeLine::select('dateChange','state','car_id')->get();
        $dataAlerts = [];
        $now = Carbon::now();
        $i = 0;

        foreach ($dataTime as $time)
        {
            $dateChange = new Carbon($time->dateChange);
            if ($dateChange->subDay(7) <= $now && $time->state == 0)
            {
                $dataAlerts[$i] = [
                    'car_id' => $time->car_id,
                    'dateChange' => $time->dateChange
                ];
                $i++;
            }
        }
        ///////////////////////////////////////////////////////////////////////////////////////////////////*/

        //Verificamos la existencia del usuario mediante la cookie
        if (isset($_COOKIE['user']))
        {
            //Consultamos los datos del usuario en la base de datos
            $dataUser = UserProfile::where('email',$_COOKIE['user'])->get();
            //Consultamos los autos registrados por el usuario
            $dataCars = Car::where('user_profile_id',$dataUser[0]['id'])->get();
            //Indicamos que el usuario se encuentra registrado
            $flagModal = 1;
            //Enviamos  a la vista los datos de los automoviles registrados por el usuario
            return view('registerCar',['cars'=>$dataCars,'flagModal'=>$flagModal]);

        }else {
            //Creamos la variable de la bandera para lanzar la ventana modal
            $flagModal  = 0;
            $flagCars   = 0;
            return view('registerCar',['cars'=>$flagCars,'flagModal'=>$flagModal]);
        }

    }

    //Cargamos el formulario para el geristro de un nuevo automovil
    public function registerNewCar()
    {
        return view('registerNewCar');
    }

    //Guardamos el registro del automovil en la base de datos
    public function storeNewCar(Request $request){

        $dataCar = $request->all();
        $dataTimeLine['dateChange'] = $dataCar['dateChange'];
        //Eliminamos el valor del array
        unset($dataCar['dateChange']);

        //Obtenemos el id del usuario mediante la cookie
        $countUser = UserProfile::select('id')->where('email',$_COOKIE['user'])->get();

        if(count($countUser)<=0){
            $email = date("YmdHis").'@mvalvoline.com';

            //Creamos un usuario y session generica
            $dataUser['nameUser']='Valvoline User Default';
            $dataUser['email'] = $email;
            $dataUser['photoUser'] = 'user.png';
            //Registramos al usuario
            UserProfile::create($dataUser);
            //Creamos la cookie con el nuevo usuario
            setcookie('user',$email);
        }

        $dataCar['user_profile_id'] = $countUser[0]['id'];

        //Registramos el nuevo automovil
        $carRegister = Car::create($dataCar);

        //Obtenemos la fecha de hoy
        $now = Carbon::now();
        //Creamos el historial de cambios
        for ($i=0;$i<100;$i++){
            //Guardamos el id del automovil recien creado
            $dataTimeLine['car_id'] = $carRegister->id;
            //A la fecha del ultimo cambio le sumamos los dias y obtenemos la nueva fecha
            $dateAct = new Carbon($dataTimeLine['dateChange']);
            if($dateAct < $now){
                $dataTimeLine['description'] = 'El mantenimiento se realizo con exito a la fecha.';
                $dataTimeLine['state'] = true;
            }else{
                $dataTimeLine['description'] = 'El mantenimiento se debe realizar aproximadamente a la fecha. ';
                $dataTimeLine['state'] = false;
            }
            //Registramos el Time Line
            TimeLine::create($dataTimeLine);
            //Codigo para generar las futuras fechas para el mantenimiento
            $calcDay = intval(5000/$carRegister->approximate_travel_day);
            //Sumamos los dias calculados para el prosimo cambio de aceite
            $newDateChange = $dateAct->addDay($calcDay);
            //Asignamos la fecha recien calculada a la variable dateChange para guardar en la base de datos
            $dataTimeLine['dateChange'] = $newDateChange;
        }

        return redirect()->route('registerCarIndex');
    }
}
