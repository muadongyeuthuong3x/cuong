<?php

namespace App\BackEnd;

use Illuminate\Database\Eloquent\Model;

class CartListthongtin extends Model
{
    protected $table="diachilh";
    protected $fillable=[
        'name' , 'sdt' ,'tinh' ,'quan' ,'xa' , 'nhannhu'
    ];

     public function tinhlk(){
        return $this->belongsTo('App\BackEnd\province','tinh','provinceid');
    }
    public function huyenlk(){
        return $this->belongsTo('App\BackEnd\district','quan','districtid');
    }

    public function xalk(){
        return $this->belongsTo('App\BackEnd\ward','xa','wardid');
    }
}
