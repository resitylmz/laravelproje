@extends('layouts.app')

@section('content')
    <div class="container"  style="background:#fff;">
        <div class="row">
          <div class="col-md-3">
               {{$deger}}
               <form action="" method="post">
                   <div class="form-group">
                       <label for="exampleInputEmail1">Total Monay</label>
                       <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                   </div>
                   <div class="form-group">
                       <label for="exampleInputPassword1">Tarih</label>
                       <input class="datepicker form-control" type="text">
                   </div>
                   <button type="submit" class="btn btn-primary">Kaydet</button>
               </form>
             </div>
             <div class="col-md-9">

            </div>
        </div>
    </div>
@endsection
