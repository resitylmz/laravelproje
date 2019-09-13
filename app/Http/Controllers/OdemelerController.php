<?php

namespace App\Http\Controllers;
use Session;

use Illuminate\Http\Request;
use  App\Http\Models\Monay;
class OdemelerController extends Controller
{
      public function postUser(Request $request)
      {
               try {

                  $data=$this->validate($request, [
                        'userID' => 'required',
                        'tutar' => 'required',
                        'tarih' => 'required',
                      ]);
                  Monay::create($request->all());
                     return response()->json([
                         'success' => 'true',
                         'message' => 'Ödeme eklendi'
                     ]);

                } catch (Exception $e) {

                    return response()->json([
                         'success' => 'false',
                         'message' => 'Ödeme eklenemedi: '. $e->getMessage()
                      ]);
                }
      }
      public function  odemeListe($id){
        $odeme = Monay::find($id);
         return view("musteri.show")->with('odeme',$odeme);
      }

}
