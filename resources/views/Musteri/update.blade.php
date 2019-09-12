@extends('layouts.app')

@section('content')
<div class="container"  style="background:#fff;">
    <div class="row">
      <div class="col-md-2 ">

            <h3>Menü</h3>
            <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="">Kayit</a></li>
              <li><a href="">Müşteriler</a></li>
              <li><a href="">Ödemeler</a></li>
              <li><a href="">Profil</a></li>
            </ul>

      </div>
      <div class="col-md-10">
        <br>
        <div class="panel panel-default">
            <div class="panel-heading">Edit</div>

            <div class="panel-body">
              @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
              </div><br />
            @endif
             @foreach($data as $datas)
          <form method="POST"    action="{{route('Musteri.update', $datas->id)}}" class="form-horizontal">
                {{ csrf_field() }}
            <div class="form-group">
                  <label for="adres" class="col-md-4 control-label">Name</label>
                <div class="col-md-6">
                  <input id="name" type="text" class="form-control" name="name" value="{{ $datas->name }}" required autofocus>
                  </div>
                  @if ($errors->has('name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
                </div>


              

                <div class="form-group">
                      <label for="adres" class="col-md-4 control-label">T.C</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" id="tc" name='tc' value="{{ $datas->tc }}">
                      </div>
                </div>

                <div class="form-group">
                      <label for="adres" class="col-md-4 control-label"  >Sicil Numara</label>
                    <div class="col-md-6">
                  <input type="text" class="form-control" id="sc" name='sc'  value="{{ $datas->sc }}">
                </div>
                </div>

                <div class="form-group">
                      <label for="adres" class="col-md-4 control-label">Telefon </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="telefon" name="telefon" value="{{ $datas->telefon }}">
                      </div>
                </div>

                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $datas->email }}"  required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                  <div class="form-group">
                        <label for="adres" class="col-md-4 control-label">Üye Tipi</label>
                      <div class="col-md-6">
                           <select class="form-control" id="role" name="role">
                                  <option value="admin" @if (('$datas->role_id') == "admin") {{ 'selected' }} @endif >Admin</option>
                                    <option value="user" @if (('$datas->role_id') == "user") {{ 'selected' }} @endif>User</option>
                           </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="adres" class="col-md-4 control-label">Address</label>

                    <div class="col-md-6">
                        <textarea rows="5" cols="50%" name="adres"> {{ $datas->adres }}  </textarea>
                    </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </div>
          </form>
          @endforeach
          </div>
          </div>
          </div>
      </div>
    </div>
</div>
@endsection
