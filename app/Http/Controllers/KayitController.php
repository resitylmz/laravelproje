<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Models\User;
class KayitController extends Controller
{
    public function __construct()
    {
          $this->middleware('auth');
    }
    public function ekle(){
          return view('kayit');
    }
    public   function save(Request $request){
          $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string|max:10',
         ]);

         User::create($request->all());
         return redirect()->route('kayit')
                         ->with('success','Product created successfully.');

    }
}
