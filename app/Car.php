<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';
    protected $fillable = ['user_profile_id','model','km_actual','approximate_travel_day','photo_car'];
}
