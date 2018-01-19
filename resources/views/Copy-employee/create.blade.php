@extends('layouts.app')

@section('content')
<style type="text/css">
    .input-controls {
      margin-top: 10px;
      border: 1px solid transparent;
      border-radius: 2px 0 0 2px;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      height: 32px;
      outline: none;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    }
    #searchInput {
      background-color: #fff;
      font-family: Roboto;
      font-size: 15px;
      font-weight: 300;
      margin-left: 12px;
      padding: 0 11px 0 13px;
      text-overflow: ellipsis;
      width: 50%;
    }
    #searchInput:focus {
      border-color: #4d90fe;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
         
    <div  class="alert alert-success" style="display: none;"><span class="glyphicon glyphicon-ok"></span><em> </em></div>


            <div class="panel panel-default">
                <div class="panel-heading">Employee</div>
                <div class="panel-body">
                    <form id="employee_form" class="form-horizontal" role="form" method="POST">
                        <div class="form-group">
                            <label for="department name" class="col-md-4 control-label">Employee Name</label>

                            <div class="col-md-6">
                                <input id="emp_name" type="text" class="form-control" name="emp_name" value="" required autofocus> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="department location" class="col-md-4 control-label">Employee Job</label>
                            <div class="col-md-6">
                        <input id="emp_job" type="text" name="emp_job" class="form-control"  value="" required autofocus>  
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="department location" class="col-md-4 control-label">Employee Phone</label>
                            <div class="col-md-6">
                        <input id="emp_phone" type="number" name="emp_phone" class="form-control"  value="" required autofocus>  
                            </div>
                        </div>
                          <div class="form-group">
                            <label for="department location" class="col-md-4 control-label">Employee Salary</label>
                            <div class="col-md-6">
                        <input id="emp_salary" type="number" name="emp_salary" class="form-control"  value="" required autofocus>  
                            </div>
                        </div>


                      <div class="form-group">
                            <label for="department location" class="col-md-4 control-label">Employee Department</label>
                            <div class="col-md-6">
                                    <select  id="department_id" class="form-control" name="emp_dept">
                                      <option>Select Department</option>
                                      @foreach($department as $dept)
                                      <option value="{{$dept->id}}">{{$dept->dept_name}}</option>
                                      @endforeach
                                    </select> 
                            </div>
                        </div>


                      <div class="form-group">
                            <label for="department location" class="col-md-4 control-label">Sub Department</label>
                            <div class="col-md-6">
                                    <select id="subdepartment" name="sub_dept_id" class="form-control" >
                                      
                                    </select> 
                            </div>
                        </div>
                        <div class="form-group">
                          <input id="searchInput" class="input-controls" type="text" placeholder="Enter a location">
                           <div class="map" id="map" style="width: 100%; height: 300px;"></div>
                            </div>
                             <div class="form-group">
                            <label for="department location" class="col-md-4 control-label">Employee Address</label>
                            <div class="col-md-6">
                                 
                                    <input type="text" name="location" id="location" class="form-control">
                            </div>
                        </div>
                          <div class="form-group">
                            <label for="department location" class="col-md-4 control-label">Latitude </label>
                            <div class="col-md-6">
                                  <input type="text" name="lat" id="lat" class="form-control">
                            </div>
                        </div>

                      
                                  <div class="form-group">
                            <label for="department location" class="col-md-4 control-label">Longitude </label>
                            <div class="col-md-6">
                                    <input type="text" name="lng" id="lng" class="form-control">
                            </div>
                        </div>


<!--                         <div class="form-group">
                            <label for="department location" class="col-md-4 control-label">Telephone </label>
                            <div class="col-md-6">
                                    <input type="text" name="telephone" id="formatted_phone_number" class="form-control">
                            </div>
                        </div> -->
                      
                        <div class="form-group">
                            <label for="department location" class="col-md-4 control-label">City </label>
                            <div class="col-md-6">
                                    <input type="text" name="city" id="city" class="form-control">
                            </div>
                        </div>

                      <div class="form-group">
                            <label for="department location" class="col-md-4 control-label">Country </label>
                            <div class="col-md-6">
                                    <input type="text" name="country" id="country" class="form-control">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

  $(document).ready(function($) {

         $('#department_id').change(function() {
             
             var public_path = "{{ url('/') }}";

             var deptId = $(this).val();

              $.ajax({
                       url: public_path + '/employee/subDept/'+deptId,
                       type: 'GET',
                       success:function(data){

                            if(data){

                              $('#subdepartment').empty();
                              $('#subdepartment').append('<option value="">Select  Sub Department</option>');
                              $.each(data, function(key, value) {
                                 /* iterate through array or object */
                                 $('#subdepartment').append('<option value="'+key+'">'+value+'</option>');
                              });

                            }
                                                            
                        }
                  
                 });

         });
  });


    $('#employee_form').submit(function(e){
       var formData = $("#employee_form").serialize();
       e.preventDefault();
       
             $.ajax({
                          type: "POST",
                          data: formData,
                          // url: public_path + "/department/store",
                          url: "{{ URL::route('employee.store') }}",
                          dataType:'json',
                          
                          success: function(data){
                              if(data.success == 1) {
                                 swal({
                                        title: "",
                                        text: data.message,
                                         type: "success",          
                                   });
                                 } 
                                     
                                      $('#employee_form')[0].reset();
                                 // window.location.href = '{{route('department.create')}}'; 

                             }             
                          });
    //code goes here
});

</script>


   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCl6dmRH_TmGZQkjpdOO6ItWSAS-G9u-go&libraries=geometry,places,drawing&ext=.js"></script>


<script>
/* script */
function initialize() {

   var latlng = new google.maps.LatLng(28.5355161,77.39102649999995);
    var map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoom: 13
    });
    var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      draggable: true,
      anchorPoint: new google.maps.Point(0, -29)
   });
    var input = document.getElementById('searchInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    var geocoder = new google.maps.Geocoder();
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);
    var infowindow = new google.maps.InfoWindow(); 

    autocomplete.addListener('place_changed', function() {

        var place = autocomplete.getPlace();
        console.log(place);

        var filtered_array = place.address_components.filter(function(address_component){
        return address_component.types.includes("country");
        }); 
        var country = filtered_array.length ? filtered_array[0].long_name: "";
        console.log(country);

         var filtered_array_1 = place.address_components.filter(function(address_component){
         return address_component.types.includes("locality");
        }); 

        var city = filtered_array_1.length ? filtered_array_1[0].long_name: "";
        console.log(city);
        // var city = place.address_components[4].long_name;
       
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);          
    
        bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng(),place.formatted_phone_number,country,city);
        infowindow.setContent(place.formatted_address);
        infowindow.open(map, marker);
       
    });
}


function bindDataToForm(address,lat,lng,telephone,country,city){
   document.getElementById('location').value = address;
   document.getElementById('lat').value = lat;
   document.getElementById('lng').value = lng;
   // document.getElementById('formatted_phone_number').value = telephone;
   document.getElementById('city').value = city;
   document.getElementById('country').value = country;
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>





  




@endsection
