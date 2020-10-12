<?php

namespace App\BackEnd;

use Illuminate\Database\Eloquent\Model;

class permissionrole extends Model
{
    protected $table='permission_role';
    protected $fillable= [
        'role_id','permission_id'
    ];
    public $timestamps = false;
}
