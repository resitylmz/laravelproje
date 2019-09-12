@extends('layouts.app')

@section('content')
<div class="container"  style="background:#fff;">
    <div class="row">
      <div class="col-md-3">
        <h3>Menü</h3>
            <ul class="nav nav-pills nav-stacked">
              <li ><a href="{{ route('Musteri.create') }}">Kayit</a></li>
              <li class="active"><a href="">Müşteriler</a></li>
              <li><a href="">Ödemeler</a></li>
              <li><a href="">Profil</a></li>
            </ul>

      </div>
      <div class="col-md-8">
      <table id="myTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Adi Soyadi</th>
                <th>E-Mail</th>
                <th>Yetki</th>
                <th>Düzenleme</th>
            </tr>
        </thead>
        <tbody>
          <br>
           @foreach ($musteri as $key => $vt):


                <tr>
                  <td>{{$vt->id}}</td>
                  <td>{{$vt->name}}</td>
                  <td>{{$vt->email}}</td>
                  <td>{{$vt->role_id}}</td>
                  <td>
                      <a href="{{ route('Musteri.show',$vt->id) }}"  class="btn btn-success">Detay </a>
                    
                      <a href="{{ route('Musteri.edit',$vt->id) }}"  class="btn  btn-info">Update</a>
                      <form action="{{ route('Musteri.destroy', $vt->id)}}" method="post">
                        <input type="hidden" name="_method" value="DELETE">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">

                          <button class="btn btn-danger" type="submit">Delete</button>
                    </form>

                  </td>
                </tr>
              @endforeach;
        </tbody>
      </table>
    </div>
    </div>
</div>

@endsection
