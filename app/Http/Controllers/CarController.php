<?php

namespace App\Http\Controllers;

use App\Car;
use App\TimeLine;
use App\UserProfile;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CarController extends Controller
{
    //Pagina inical para visualizar los automoviles registrados
    public function index(Request $request)
    {
        //Obtenemos el id del usuario mediante la session iniciada
        $userId = UserProfile::select('id')->where('email','=',$request->session()->get('user'))->get();
        foreach ($userId as $id){
            $idUser = $id;
            break;
        }

        if (count($userId) > 0){
            $dataCar = Car::where('user_profile_id',$idUser->id)->get();

            return view('registerCar',['cars'=>$dataCar]);
        }else{
            return view('registerCar',['cars'=>1]);
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

        //Obtenemos el id del usuario mediante la session iniciada
        $countUser = UserProfile::select('id')->where('email','=',$request->session()->get('user'))->get();

        if(count($countUser)<=0){
            $email = date("YmdHis").'@mvalvoline.com';

            //Creamos un usuario y session generica
            $dataUser['nameUser']='Valvoline User Default';
            $dataUser['email'] = $email;
            $dataUser['photoUser'] = 'user.png';
            //Registramos al usuario
            UserProfile::create($dataUser);
            //Obtenemos el id del usuario que acabamos de registrar
            $userId = UserProfile::select('id')->where('email','=',$email)->get();
            //Creamos la session del nuevo usuario
            $request->session()->put('user', $email);
        }else{
            $userId = UserProfile::select('id')->where('email','=',$request->session()->get('user'))->get();
        }

        foreach ($userId as $id){
            $idUser = $id;
            break;
        }

        $dataCar['user_profile_id'] = $idUser->id;

        //Subimos la imagen del automovil si existe
        if(Input::hasFile('photo_car')){
            //Obtenemos el campo file_1 definido en el formulario
            $photoCar = $request->file('photo_car');
            //Obtenemos el nombre del archivo
            $namePhoto = $photoCar->getClientOriginalName();
            //Indicamos donde se guardara la foto
            $photoCar->move('storage',$namePhoto);
            $dataCar['photo_car'] = $namePhoto;
        }

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
                $dataTimeLine['description'] = 'El mantenimiento se realizo con exito en la fecha: ';
                $dataTimeLine['state'] = true;
            }else{
                $dataTimeLine['description'] = 'El mantenimiento se debe realizar aproximadamente en la fecha: ';
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

        return redirect()->route('homeUser');
    }
}
