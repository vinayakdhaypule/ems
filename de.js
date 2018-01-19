$(document).ready(function(){
var map, infowindow = new google.maps.InfoWindow(),
bounds = new google.maps.LatLngBounds(), markers=[], alternateMarkers=[], markersIcon=[];
var mapOptions = {
    zoom: 0, //Set to 0 because we are using auto formatting w/ bounds
    disableDefaultUI: true,
    zoomControl: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    };

map = new google.maps.Map(document.getElementById("map"), mapOptions);
map.fitBounds(bounds);

$("#map_list ul li").each(function(index) {
    var mTxt=$(this).children(".marker_number").text();
    var markerLatLng = new google.maps.LatLng($(this).children(".marker_lat").text(), $(this).children(".marker_long").text());
    var markImg=new google.maps.MarkerImage('http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld='+mTxt+'|00aeef|000000');
    var altMarkImg=new google.maps.MarkerImage('http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld='+mTxt+'|ff0000');
    var marker = new google.maps.Marker({
    position: markerLatLng,
    map: map,
    animation: google.maps.Animation.DROP,
    title : $(this).children(".marker_title").text(),
    brief: $(this).children(".marker_brief").text(),
    icon: markImg
    });
    
    markers.push(marker);
    markersIcon.push(markImg);
    alternateMarkers.push(altMarkImg);
    //add to bounds for auto center and zoom
    bounds.extend(markerLatLng);
});

$("#map_list ul li").on('mouseenter', function(){
    var id=$(this).attr('id');
    markers[id].setIcon(alternateMarkers[id]);
}).on('mouseleave', function(){
    var id=$(this).attr('id');
    markers[id].setIcon(markersIcon[id]);      
});    

});