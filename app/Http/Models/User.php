<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  protected $table="users";
  protected $fillable = [
      'name', 'email', 'password','role_id'
  ];


  protected $hidden = [
      'password', 'remember_token','tc','sc','adres'
  ];
}
