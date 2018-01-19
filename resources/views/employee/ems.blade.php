@extends('layouts.app')

@section('content')
<style type="text/css">
#mapContainer {
		height: 650px;
}

#mapCanvas {
		width: 100%;
		height: 100%;
}


</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCl6dmRH_TmGZQkjpdOO6ItWSAS-G9u-go"></script>


<script>
function initMap() {

    var allMarkers = [];
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                    
// Display a map on the web page
    map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
    map.setTilt(50);

        
// Multiple markers location, latitude, and longitude
     var locations =  <?php echo $employee ?>;


// Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    

// Place each marker on the map  
    for( i = 0; i < locations.length; i++ ) {

        var position = new google.maps.LatLng(locations[i].lat, locations[i].lng);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: locations[i].emp_name,
            id: locations[i].id
        });
        
  // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {

                var content = '<div class="map-content"><h3>' + locations[i].emp_name + '</h3>' + locations[i].location + '<br />' + locations[i].emp_job + ', ' + locations[i].city +   '<br /></div>';
                infoWindow.setContent(content);
                infoWindow.open(map, marker);
                
            }

        })(marker, i));

  // Center the map to fit all markers on the screen
        map.fitBounds(bounds);   
    }
        
       allMarkers.push(marker);

 // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(12);
        google.maps.event.removeListener(boundsListener);
    });
 
}

// Load initialize function
google.maps.event.addDomListener(window, 'load', initMap);

</script>



<div class="container-fluid">
	<h1>Employee Address Location</h1>
	<br>
	<br>
	<div class="row">
		<div class="col-sm-6">
			<div id="mapContainer">
					<div id="mapCanvas"></div>
		</div>
		</div>
		<div class="col-sm-6">
			<div class="row">
					 @foreach($employee as $indexKey => $emp) 

						<div class="col-sm-4">
							   <div class="employee">
								<div class="sth" onmouseover="ShowMarker({{$indexKey}})" />
									<p><strong>Name:</strong>{{$emp->emp_name}}</p>
									<p><strong>Job:</strong>{{$emp->emp_job}}</p>
									<p><strong>Location:</strong>{{$emp->location}}</p>
									<p><strong>City:</strong>{{$emp->city}}</p>
									<p><strong>Country:</strong>{{$emp->country}}</p>
						
								</div>
							</div>
						</div>

				@endforeach
			</div>
		</div>
	</div>
</div>



@endsection