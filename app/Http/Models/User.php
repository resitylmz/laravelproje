<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  protected $table="users";
  protected $fillable = [
      'name', 'email', 'password','role_id','tc','sc','adres'
  ];


  protected $hidden = [
      'password', 'remember_token',
  ];
}
