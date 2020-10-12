<?php

namespace App\BackEnd;

use Illuminate\Database\Eloquent\Model;

class HangSpModel extends Model
{
    protected $table="hangsanpham";
    protected $fillable=[
        'tenhang'
    ];

    public function mucspchinhlk(){
        return $this->belongsTo('App\BackEnd\MucSanPham1','id','id_hangsp',);
    }


}
