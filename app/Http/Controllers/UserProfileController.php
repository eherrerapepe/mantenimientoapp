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
        $userRegister = UserProfile::where('email','=',$request->session()->get('user'))->get();

        return view('userProfile',['userProfile'=>$userRegister]);
    }

    //Guardamos y creamos la session para el nuevo usuario
    public function store(Request $request)
    {
        $dataUser = $request->all();
        //Registramos el usuario del nuevo usuario
        UserProfile::create($dataUser);
        //Creamos la session del nuevo usuario
        $request->session()->put('user', $dataUser['email']);

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
        $userRegister = UserProfile::where('email','=',$request->session()->get('user'))->get();
        return view('formUserEdit',['userProfile'=>$userRegister]);
    }

    public function updateUserProfile(Request $request)
    {
        $userProfile = UserProfile::find(Input::get('id_user_edit'));
        $dataUserUpdate = $request->all();
        $userProfile->fill($dataUserUpdate);
        $userProfile->save();

        //Actualizamos la session
        $request->session()->flush();
        $request->session()->put('user', $userProfile['email']);


        return redirect()->route('registerCarIndex');
    }
}
