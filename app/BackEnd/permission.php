<?php

namespace App\BackEnd;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    protected $table='permissions';
    protected $fillable= [
        'name'
    ];
    public function mqhquyen(){
        return $this->hasMany(permission::class ,'parent_id');
    }
}
