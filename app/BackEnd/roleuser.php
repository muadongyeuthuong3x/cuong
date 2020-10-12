<?php

namespace App\BackEnd;

use Illuminate\Database\Eloquent\Model;

class roleuser extends Model
{
    protected $table='users_roles';
    public $timestamps = false;
    protected $fillable= [
        'role_id' , 'user_id'
    ];
}
