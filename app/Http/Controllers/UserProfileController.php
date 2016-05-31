<?php

namespace App\Http\Controllers;

use App\TimeLine;
use App\UserProfile;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class UserProfileController extends Controller
{
    //Pantalla de inicio de la aplicacion
    public function index(Request $request)
    {
        if($request->session()->has('user')){
            //Consulto la base de datos para verificar si el usuario
            //Se encuentra registrado en la base de datos
            $userRegister = UserProfile::where('email','=',$request->session()->get('user'))->get();
            if (count($userRegister) > 0){
                $flagModal = 1;
            }else{
                $request->session()->flush();
                $flagModal = 0;
            }
        }else{
            $flagModal = 0;
        }

        $userRegister = UserProfile::where('email','=',$request->session()->get('user'))->get();

        if(count($userRegister)<0){
            $userRegister['nameUser'] = 'User Valvoline';
        }

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

        //dd($dataAlerts,$i);

        return view('index',['flagModal'=>$flagModal,'userProfile'=>$userRegister]);
    }
    //Pantalla para el index de profile
    public function profile(Request $request)
    {
        //Consultamos los datos del usuario
        $userRegister = UserProfile::where('email','=',$request->session()->get('user'))->get();

        return view('userProfile',['userProfile'=>$userRegister]);
    }

    //Guardamos y creamos la session para el nuevo usuario
    public function store(Request $request)
    {
        $dataUser = $request->all();
        //Subimos la imagen del automovil si existe
        if(Input::hasFile('photoUser')){
            //Obtenemos el campo file_1 definido en el formulario
            $photoUser = $request->file('photoUser');
            //Obtenemos el nombre del archivo
            $namePhoto = $photoUser->getClientOriginalName();
            //Indicamos donde se guardara la foto
            $photoUser->move('storage',$namePhoto);
            $dataUser['photoUser'] = $namePhoto;
        }else{
            $dataUser['photoUser'] = 'user.png';
        }

        //Registramos el usuario del nuevo usuario
        UserProfile::create($dataUser);
        //Creamos la session del nuevo usuario
        $request->session()->put('user', $dataUser['email']);

        //Retornamos la vista al index
        return redirect()->route('homeUser');
    }

    //User Register Form
    public function forUserProfile()
    {
        return view('formUserRegister');
    }

    //User Edit Form
    public function forUserEdit(Request $request)
    {
        //Consultamos los datos del usuario
        $userRegister = UserProfile::where('email','=',$request->session()->get('user'))->get();
        return view('formUserEdit',['userProfile'=>$userRegister]);
    }

    public function updateUserProfile(Request $request)
    {
        $userProfile = UserProfile::find(Input::get('id_user_edit'));
        $dataUserUpdate = $request->all();
        if(empty($request->photoUser)){
            $photoUserAnt = $userProfile->photoUser;
            $dataUserUpdate['photoUser'] = $photoUserAnt;
        }else{
            //Obtenemos el campo file_1 definido en el formulario
            $photoUser = $request->file('photoUser');
            //Obtenemos el nombre del archivo
            $namePhoto = $request->file('photoUser')->getClientOriginalExtension();
            //Indicamos donde se guardara la foto
            $photoUser->move(base_path().'storage',$namePhoto);
            $dataUserUpdate['photoUser'] = $namePhoto;
        }
        $userProfile->fill($dataUserUpdate);
        $userProfile->save();

        //Actualizamos la session
        $request->session()->flush();
        $request->session()->put('user', $userProfile['email']);


        return redirect()->route('homeUser');
    }
}
