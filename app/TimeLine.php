<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeLine extends Model
{
    protected $table = 'time_lines';
    protected $fillable = ['car_id','dateChange','state','description'];
}
