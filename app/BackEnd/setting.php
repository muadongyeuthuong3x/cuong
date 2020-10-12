<?php

namespace App\BackEnd;

use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    protected $table ="setting";
protected $fillable = [
    "email","sdt"
];
}
