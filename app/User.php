<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','tc','sc','adres'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //İlişkimizi oluşturuyoruz.
    public function role() {
        return $this->belongsTo('App\Role');
    }

    //Oluşturacağımız middlewarede kullanacağımız metodumuz.
    public function hasRole($role) {
        return true ? $this->role->name == $role : false;
    }
}
