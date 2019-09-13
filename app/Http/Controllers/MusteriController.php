<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;

use  App\Http\Models\User;
use Input;
class MusteriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          $this->middleware('auth');
          $musteri=User::all();
          return view('musteri.index',compact('musteri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('musteri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'role' => 'required|string|max:10',
      ]);

      $User= new User([
          'name' => $request->get('name'),
          'email'=> $request->get('email'),
          'password'=> bcrypt($request->get('password')),
          'role-id'=> $request->get('role'),
          'tc' => $request->get('tc'),
          'sc'=> $request->get('sc'),
          'telefon'=> $request->get('telefon'),
          'adres' => $request->get('adres'),

        ]);
        $User->save();

      return redirect(musteri)->with('success','Müşteri Başarılı Şekilde Kayıt edildi.');
    }
  
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $musteri = User::find($id);
        return view("musteri.show")->with('musteri',$musteri);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::where('id',$id)->get();

        return view('musteri.update',compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
              $User= User::find($id);
              $User->title = $request->get('title');
              $User->post = $request->get('post');
              $User->title = $request->get('title');
              $User->post = $request->get('post');
              $User->title = $request->get('title');
              $User->post = $request->get('post');
              $User->save();
              return back()->with('success','Member updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //  User::where('id',$id)->delete();
      //update post data
      $musteri = User::find($id)->delete();
      //store status message
        Session::flash('success_msg', 'Post deleted successfully!');

        return view('musteri');
    }
}
