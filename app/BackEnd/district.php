<?php

namespace App\BackEnd;

use Illuminate\Database\Eloquent\Model;

class district extends Model
{
    protected $table="district";
    protected $fillable=[
        'districtid' , 'name' , 'provinceid '
    ];
}
