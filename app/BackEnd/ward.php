<?php

namespace App\BackEnd;

use Illuminate\Database\Eloquent\Model;

class ward extends Model
{
    protected $table="ward";
    protected $fillable=[
        'districtid' , 'name' ,'wardid'
    ];
}
