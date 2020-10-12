<?php

namespace App\BackEnd;

use Illuminate\Database\Eloquent\Model;

class province extends Model
{
    protected $table="province";
    protected $fillable=[
        'provinceid' , 'name'
    ];
}
