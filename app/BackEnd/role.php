<?php

namespace App\BackEnd;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $table='roles';
    protected $guarded=[];
    protected $fillable= [
        'name' , 'display_name'
    ];
    public function permissions(){
        return $this->belongsToMany(permission::class,'permission_role','role_id ','permission_id');
    }
}
