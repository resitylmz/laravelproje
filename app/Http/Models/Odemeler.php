<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Odemeler extends Model
{

    protected $table="odeme";
    protected $fillable = [
       'userID',  'tutar','tarih'
    ];
}
