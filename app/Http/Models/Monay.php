<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Monay extends Model
{

   protected $table = "monays";
    public $primaryKey = "id";


    protected $fillable = ["userID","tutar","tarih"];

}
