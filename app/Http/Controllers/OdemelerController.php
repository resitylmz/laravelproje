<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Models\Odemeler;
class OdemelerController extends Controller
{
      public function getUser(Request $request)
      {


          $Odemeler= new Odemeler([
            'userID'=> $request->get('user'),
            'tutar' => $request->get('tutar'),
            'tarih'=> $request->get('tarih'),

          ]);
          $odemeler->save();
           return 'Hello World';


      }
}
