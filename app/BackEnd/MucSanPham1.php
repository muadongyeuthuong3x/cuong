<?php

namespace App\BackEnd;

use Illuminate\Database\Eloquent\Model;

class MucSanPham1 extends Model
{
    protected $table="mucsanpham";
    protected $fillable=[
        'tenmucsp','id_hangsp'
    ];
    public function mucsplk(){
        return $this->belongsTo('App\BackEnd\HangSpModel','id_hangsp');
    }

}
