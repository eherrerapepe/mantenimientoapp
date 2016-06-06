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
    //Pantalla para el index de profile
    public function profile(Request $request)
    {
        //Consultamos los datos del usuario
        $userRegister = UserProfile::where('email',$_COOKIE['user'])->get();

        return view('userProfile',['userProfile'=>$userRegister]);
    }

    //Guardamos y creamos la session para el nuevo usuario
    public function store(Request $request)
    {
        //Verificamos que no haya la cookie con el user
        if (!isset($_COOKIE['user']))
        {
            //Obtenemos los datos que el usuario envio por el formulario
            $dataUser = $request->all();

            //Verificamos que el usuario no exista en la base de datos
            $userRegister = UserProfile::where('email',$dataUser['email'])->get();

            if (count($userRegister)<=0)
            {
                //Registramos el usuario del nuevo usuario
                $userNewRegister = UserProfile::create($dataUser);
                //Creamos la cookie quien mantendra los datos del usuario
                setcookie('user',$userNewRegister->email);
            }else
            {
                //Creamos la cookie si el usuario ya esta registrado en la base de datos
                setcookie('user',$dataUser['email']);
            }
        }

        //Retornamos la vista al index
        return redirect()->route('registerCarIndex');
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
        $userRegister = UserProfile::where('email','=',$_COOKIE['user'])->get();
        return view('formUserEdit',['userProfile'=>$userRegister]);
    }

    public function updateUserProfile(Request $request)
    {
        $userProfile = UserProfile::find(Input::get('id_user_edit'));
        $dataUserUpdate = $request->all();
        $userProfile->fill($dataUserUpdate);
        $userProfile->save();

        //Actualizamos la cookie
        setcookie('user',$userProfile['email']);


        return redirect()->route('registerCarIndex');
    }
}
