<?php

namespace App\BackEnd;

use Illuminate\Database\Eloquent\Model;

class spkhachangmodel extends Model
{
    protected $table ="spmua";
    protected $fillable = [
        "card_user","price","quanty","card_tensp" ,"idspanhttlh"
    ];

    public function lkspss(){
        return $this->belongsTo('App\BackEnd\Tensanphammodel','card_tensp');
    }
}
