@extends('layouts.app')

@section('content')
  <div class="container"  style="background:#fff;">
      <div class="row">
          <h2 style="padding-left:10%;"> Bilgi Formu </h2>
          <div class=" col-md-12" >   <button type="button"  id="myBtn" class="btn btn-primary btn-lg pull-right">Money Add</button>  <div>
            <div class="col-md-3 ">
              <h3>Menü</h3>
                  <ul class="nav nav-pills nav-stacked">
                    <li ><a href="{{ route('Musteri.create') }}">Kayit</a></li>
                    <li class="active"><a href="">Müşteriler</a></li>
                    <li><a href="">Ödemeler</a></li>
                    <li><a href="">Profil</a></li>
                  </ul>
            </div>
              <div class="col-md-9  ">
                      <div class="col-md-3 ">
                            <img class="card-img-top"
                                          src="{{url($musteri->image ? 'uploads/'.$musteri->image:'images/noimage.png')}}"
                                          alt="{{$musteri->description}}" width="100%" height="180px"/>
                      </div>
                      <div class="col-md-6 ">

                            <div class="card">
                                <div class="card-header">
                                  <h3>{{$musteri->name}}</h3>
                                    <div><span>Üye Tipi</span>{{$musteri->role_id}}</div>

                                    <div><span>T.C Kimlik Numarası   : </span>
                                      @if( ($musteri->tc=='') || ($musteri->tc==0))
                                      {{"Bilgi Girilmemmiş"}}
                                      @else
                                      {{$musteri->tc}}
                                      @endif
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div><span>Src  : </span>
                                      @if( ($musteri->src=='') || ($musteri->src==0))
                                      {{"Bilgi Girilmemmiş"}}
                                      @else
                                      {{$musteri->src}}
                                      @endif

                                    </div>
                                    <div><span>telefon  : </span>
                                      @if( ($musteri->telefon=='') || ($musteri->telefon==0))
                                      {{"Bilgi Girilmemmiş"}}
                                      @else
                                      {{$musteri->telefon}}
                                      @endif
                                    </div>

                                    <div><span>E-mail  : </span>{{$musteri->email}}</div>
                                    <div><span>address  : </span>
                                      @if( ($musteri->email=='') || ($musteri->email==0))
                                      {{"Bilgi Girilmemmiş"}}
                                      @else
                                      {{$musteri->email}}
                                      @endif

                                    </div>

                                </div>
                                <div class="card-footer"><hr></div>
                            </div>
                            <h2>Ödeme Bilgileri</h2>
                        <div class="col-md-12">



                        </div>
                      </diV>
              </div>
        </div>
      </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ödeme Ekle</h4>
              </div>
              <div class="modal-body">
                      <form>
                        <div class="form-group hidden">

                            <input type="text" class="form-control" id="csrf" value="{{Session::token()}}" >
                        </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Total Monay</label>
                              <input type="text" class="form-control" id="tutar"  placeholder="Monay ADD ">
                          </div>
                          <div class="form-group hidden">
                              <label for="exampleInputEmail1">user</label>
                              <input type="text" class="form-control" id="userID"  placeholder="" value="{{$musteri->id}}">
                          </div>
                          <div class="form-group">
                              <label for="exampleInputPassword1">Tarih</label>
                             <input type="text" class="form-control" id="tarihh" data-toggle="datepicker">
                          </div>
                          <button type="submit" class="btn btn-primary" id="butsave">Kaydet</button>
                      </form>
              </div>
              <div class="modal-footer">
              <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
              </div>
            </div>

          </div>
        </div>
        <script type="text/javascript">

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#butsave').click(function() {

            var user = $("#userID").val();
            var tarih = $("#tarihh").val();
            var tutar = $("#tutar").val();
          if( (user !="")  && (tarih !="") && (user !="")){

              $.ajax({
                  type:'POST',
                  url:"/getUser",
                  data: {
                      user : user,
                      tutar: tutar,
                      tarih: tarih
                    },
                    cache: false,
                  success:function(data){
                        alert(data);
                  },
                  error: function(data) {
                      alert(data);

                    }
              });
          }else{
            alert("Lütfen boş bırakmayınız.");
          }


       });

</script>
@endsection
