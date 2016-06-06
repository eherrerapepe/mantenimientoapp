<?php

namespace App\Http\Controllers;

use App\Car;
use App\TimeLine;
use App\UserProfile;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TimeLineController extends Controller
{
    public function index(Request $request)
    {
        //Obtenemos el id del usuario mediante la session iniciada
        $userId = UserProfile::select('id')->where('email','=',$_COOKIE['user'])->get();

        if (count($userId) > 0)
        {
            $dataCar = Car::where('user_profile_id',$userId[0]['id'])->get();

            return view('timeLine',['cars'=>$dataCar,'flag'=>1]);
        }else{
            return view('timeLine',['flag'=>0]);
        }
    }
    
    //Apartado para generar el history
    public function history(Request $request)
    {
        //Obtenemos el id del usuario mediante la session iniciada
        $userId = UserProfile::select('id')->where('email',$_COOKIE['user'])->get();
        if (count($userId) > 0)
        {

            $dataCar = Car::where('user_profile_id',$userId[0]['id'])->get();
            return view('history',['cars'=>$dataCar,'flag'=>1]);
        }else{
            return view('history',['flag'=>0]);
        }
    }

    //Consultamos el historial del automivil pasado como parametro
    public function showDates($id){
        $dataCar = TimeLine::where('car_id',$id)->get();
        
        return json_encode($dataCar);

    }
}
