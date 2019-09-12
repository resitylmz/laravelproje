<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Models\Odemeler;
class OdemelerController extends Controller
{
      public function getUser(Request $request)
      {
                try {

                   $data = $request->validate([
                       'userID' => 'required',
                       'tutar' => 'required',
                       'tarih' => 'required',
                   ]);

                  Odemeler::create($request->all());
                   return response()->json([
                       'success' => true
                       'message' => 'Ödeme eklendi'
                   ]);

                } catch (Exception $e) {

                   return response()->json([
                       'success' => false
                       'message' => 'Ödeme eklenemedi: '. $e->getMessage()
                    ]);
                }


      }
}
