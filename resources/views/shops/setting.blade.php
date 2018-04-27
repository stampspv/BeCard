@extends('shops.layout')

@section('content')
<div class="container" >

  <!-- Nav tabs -->

  <ul class="nav nav-tabs"  style="width:100%;z-index: 0;position:relative;">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('shop.show') }}">Shop</a>
    </li>
    <li class="nav-item">
      <a class="nav-link "   href="{{ route('shop.branch') }}">Branchs</a>
    </li>
    <li class="nav-item">
      <a class="nav-link "   href="{{ route('shop.cashier') }}">Cashiers</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"   href="{{ route('shop.membercard') }}">Member Card</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"   href="{{ route('shop.reward') }}">Reward</a>
    </li>
    <li class="nav-item pull-right active">
      <a class="nav-link"   href="{{ route('shop.setting') }}">Setting</a>
    </li>
  </ul>

      <div class="row" >
        <div class="col-md-12">
            <div class="panel panel-default" >
            <div style="padding:30px;">
            <h1 style="margin-bottom: 20px;"><span class="glyphicon glyphicon-cog"></span> Setting</h1>
            
            <div class="row" >
            <div class="col-sm-3">
                <ul class="nav nav-pills nav-stacked" style="width:100%;z-index: 0;position:relative;margin-left:-15px;">
                  <li class="active"><a href="#">&nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-home"></span> &nbsp;General</a></li>
                  <li><a href="#">&nbsp&nbsp&nbsp&nbsp<span class="	glyphicon glyphicon-list"></span> &nbspTimeline</a></li>
                </ul>
              </div>

             

              <div class="card" style="margin-left: -30px;">
                
                <div class="card-body" style="padding:20px;">
                  <h1>&nbsp&nbsp&nbsp&nbspGeneral</h1>
                  <hr>
                  <img src="{{ asset('img/shops/image/cog3.png') }}" class="img-responsive pull-right" width="150" height="150" style="margin-top:-120px;" >
                  <br>
                  <form class="form-horizontal" method="POST" action="" >
                    {{ csrf_field() }}
                    <table class="table">
                      <tbody>
                        <tr>
                        <div class="form-group">
                              <label class="col-md-3 control-label">Shop Name</label>
                                  <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" placeholder="Enter name"required>
                                  </div>
                        </div>
                        
                        </tr>

                        <tr >
                        <div class="form-group" style="margin-top:20px;">
                              <label  class="col-md-3 control-label">Shop Description</label>
                              <div class="col-md-6">
                                <textarea rows="7" cols="45" name="desc" class="form-control" placeholder="Enter text here..."></textarea>
                              </div>
                        </div>
                        </tr>

                        <tr>
                        <div class="form-group" style="margin-top:20px;">
                            <label class="col-md-3 control-label">Shop Phone</label>
                            <div class="col-md-6">
                              <input  type="text" class="form-control" name="phone" placeholder="Enter Phone"required>
                            </div>
                        </div>
                        </tr>

                        <tr>
                        <div class="form-group" style="margin-top:20px;">
                            <label class="col-md-3 control-label">Shop E-mail</label>
                            <div class="col-md-6">
                              <input  type="text" class="form-control" name="email" placeholder="Enter E-mail"required>
                            </div>
                        </div>
                        </tr>

                        <tr>
                        <div class="form-group" style="margin-top:20px;">
                            <label class="col-md-3 control-label">Shop Url</label>
                            <div class="col-md-6">
                              <input  type="text" class="form-control" name="url" placeholder="Enter Url"required>
                            </div>
                        </div>
                        </tr>

                        <tr>
                        <div class="form-group" style="margin-top:20px;">
                            <label class="col-md-3 control-label">Shop Package</label>
                            <div class="col-md-6">
                              <input  type="text" class="form-control" name="url" placeholder="Enter Url" value="gold" disabled>
                            </div>
                        </div>
                        </tr>

                        <tr>
                          <div class="form-group" style="margin-top:20px;">
                          <label  class="col-md-3 control-label">Business Type</label>
                            <div class="col-md-6" >
                              <select name="type" class="form-control" required>
                              <option value="beauty">Beauty</option>
                              <option value="clothes">Clothes</option>
                              <option value="drink">Drink</option>
                              <option value="food">Food</option>
                              <option value="jewellery">Jewellery</option>
                              <option value="service">Service</option>
                              </select>
                            </div>
                          </div>
                        </tr>

                        <tr>
                        <div class="form-group" style="margin-top:20px;">
                          <label  class="col-md-3 control-label">Business Hours</label>
                            <div class="col-md-6">
                            <div id="time">
                                <div class="col-md-5">
                                  <input id="timepicker1" width="100%"  name="timeOpen" required> 
                                </div>
                                <div class="col-md-1">
                                  <span><b>-</b></span>
                                </div>
                                <div class="col-md-5">
                                  <input id="timepicker2" width="100%"  name="timeClose" required >
                                </div>
                              </div>
                            </div>
                          </div>
                          </tr>

                                    <!-- google map -->
                          <tr>
                          <div class="form-group" style="margin-top:30rpx;">
                            <label  class="col-md-3 control-label">Shop Address</label>
                            <div class="col-md-6">
                                <input type="text" id="searchMap">
                              <div id="mapCanvas"></div>
                            </div>
                          </div>
                          </tr>

                          <tr>
                            <div class="form-group" style="margin-top:20px;">
                            <div class="col-md-8 col-md-offset-3">
                                <button id="myInput" type="submit" class="btn btn-primary" >&nbsp&nbspUpdate&nbsp&nbsp</button>
                            </div>
                            </div>
                          </tr>


                        
                      
                      </tbody>
                    </table>
                  </form>
                </div>
              </div>



             

              <div class="clearfix visible-lg"></div>
            </div>
          </div>
        </div>
      </div>
      </div>
</div>

@endsection

@section('js')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbR2fPnPAqOeegpN6ml_SNSMSc7wN613k&libraries=places&callback=initMap"
    async defer></script>
<script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<script>
    var map,geocoder,marker;

    function initMap() {
        map = new google.maps.Map(document.getElementById('mapCanvas'), {
          center: {lat: 13.7563, lng: 100.5018},
          zoom: 15
        });
        marker = new google.maps.Marker( {
          position: {lat: 13.7563, lng: 100.5018},
          map: map,
          draggable: true
        });

         var searchBox = new google.maps.places.SearchBox(document.getElementById('searchMap'));
         google.maps.event.addListener(searchBox, 'places_changed' , function(){
          var places = searchBox.getPlaces();
          var bounds = new google.maps.LatLngBounds();
          var i,place;

          for (i=0; place=places[i];i++){
              bounds.extend(place.geometry.location);
              marker.setPosition(place.geometry.location);
          }

          map.fitBounds(bounds);
          map.setZoom(15);
      });
      google.maps.event.addListener(marker, 'position_changed', function(){
          var lat = marker.getPosition().lat();
          var lng = marker.getPosition().lng();

          $('#lat').val(lat);
          $('#lng').val(lng);
      });


        
      }

    $('#timepicker1').timepicker({
        uiLibrary: 'bootstrap'
    });
    $('#timepicker2').timepicker({
        uiLibrary: 'bootstrap'
    });

    // $(document).keypress(function(e) {
    // if(e.keyCode === 32 && e.target.nodeName=='BODY') {
    //     event.preventDefault(); //prevent default if it is body
    // }
// });

</script>

@endsection

@section('css')

<style type="text/css">
     #mapCanvas {
        width: 450px;
        height: 300px;
      }
      #searchMap{
          width:450px;
      }
      .time , #timepicker1 , #timepicker2{
    display: inline-block;
}
</style>

@endsection