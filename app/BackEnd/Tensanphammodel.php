<?php

namespace App\BackEnd;

use Illuminate\Database\Eloquent\Model;

class Tensanphammodel extends Model
{
    protected $table= "tensanpham";
    protected $fillable =[
        "tensp","slug","price_nhap","price_ban","description","image","status","id_mucsp"
    ];

    
}
