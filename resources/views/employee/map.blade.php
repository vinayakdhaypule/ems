@extends('layouts.app')

@section('content')
<style type="text/css">

#map_canvas{width:500px;height:600px;}

</style>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCl6dmRH_TmGZQkjpdOO6ItWSAS-G9u-go"></script>
<script>

$(document).ready(function(){

var infoWindow = new google.maps.InfoWindow(), markers;    
// var map, infowindow = new google.maps.InfoWindow(),
bounds = new google.maps.LatLngBounds(), markers=[], alternateMarkers=[], markersIcon=[];
var mapOptions = {
    zoom: 0, //Set to 0 because we are using auto formatting w/ bounds
    disableDefaultUI: true,
    zoomControl: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    };

map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
map.fitBounds(bounds);

$("#map_list ul li").each(function() {

    var mTitle=$(this).children(".marker_title").text();
    var mjob=$(this).children(".marker_job").text();
    var mlocation=$(this).children(".marker_location").text();
    var markerLatLng = new google.maps.LatLng($(this).children(".marker_lat").text(), $(this).children(".marker_long").text());
    var altMarkImg=new google.maps.MarkerImage('https://maps.gstatic.com/mapfiles/ms2/micons/green-dot.png');
    var marker = new google.maps.Marker({
    position: markerLatLng,
    map: map,
    animation: google.maps.Animation.DROP,
    });
         // Add info window to marker    
        google.maps.event.addListener(marker, 'mouseover', (function(marker) {
            return function() {
               var content = '<div class="map-content"><h3>' + mTitle + '</h3>' + mjob + '<br />' + mlocation + ', ' + mjob +   '<br /></div>';

                infoWindow.setContent(content);
                infoWindow.open(map, marker);
            }
        })(marker));


            markers.push(marker);
            // markersIcon.push(markImg);
            alternateMarkers.push(altMarkImg);
            //add to bounds for auto center and zoom
            bounds.extend(markerLatLng);
});


  // map_list.onmouseover = function(){
   
  // }

  $("#map_list ul li").on('mouseover', function(){

      var id=$(this).attr('id');
      var mTitle=$(this).children(".marker_title").text();
      var mjob=$(this).children(".marker_job").text();
      var mlocation=$(this).children(".marker_location").text();

      google.maps.event.trigger(markers[id], 'mouseover');
   
         // alert(id);
         var content = '<div class="map-content"><h3>' + mTitle + '</h3>' + mjob + '<br />' + mlocation + ', ' + mjob +   '<br /></div>';

                infoWindow.setContent(content);
                infoWindow.open(map, markers[id]);


  }).on('mouseleave', function(){
              
              infoWindow.close();     
            
         });
        
             
    // });   
            
    // $("#map_list ul li").on('mouseenter', function(){
    //         var id=$(this).attr('id');
    //         markers[id].setIcon(alternateMarkers[id]);

    // }) .on('mouseleave', function(){
    //         var id=$(this).attr('id');
    //         markers[id].setIcon(markersIcon[id]);      
    // });    

});

</script>
<div class="container-fluid">
	<h1>Employee Address Location</h1>
	<br>
	<br>
	<div class="row">
		 <div class="col-sm-6">
        <div id="map_canvas"></div>
        </div>
  <div class="col-sm-6">
		<div id="map_list">
          @foreach($employee as $indexKey => $emp) 
        			<div class="col-sm-4">
        		<ul>     
        		     <li id="{{$indexKey}}">
        		        <div class="marker_number">{{$emp->id}}</div>
        		        <div class="marker_title">{{$emp->emp_name}}</div>
        		        <div class="marker_lat">{{$emp->lat}}</div>
                        <div class="marker_long">{{$emp->lng}}</div>
                        <div class="marker_job">{{$emp->emp_job}}</div>
        		        <div class="marker_location">{{$emp->location}}</div>
        		      </li>  
        		</ul>
        		 </div>
         @endforeach
	</div>
 </div>
 </div>
 </div>


@endsection