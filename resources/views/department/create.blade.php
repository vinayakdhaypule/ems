@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
         
    <div  class="alert alert-success" style="display: none;"><span class="glyphicon glyphicon-ok"></span><em> </em></div>


            <div class="panel panel-default">
                <div class="panel-heading">Department</div>
                <div class="panel-body">
                    <form id="department_form" class="form-horizontal" role="form" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="department name" class="col-md-4 control-label">Department Name</label>

                            <div class="col-md-6">
                                <input id="dept_name" type="text" class="form-control" name="dept_name" value="" required autofocus> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="department location" class="col-md-4 control-label">Department Location</label>
                            <div class="col-md-6">
                        <input id="dept_location" type="text" name="dept_location" class="form-control"  value="" required autofocus>  
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

 

    $('#department_form').submit(function(e){
          var formData = $("#department_form").serialize();
       e.preventDefault();
        $.ajax({
                          type: "POST",
                          data: formData,
                          // url: public_path + "/department/store",
                          url: "{{ URL::route('department.store') }}",
                          dataType:'json',
                          
                          success: function(data){
                              if(data.success == 1) {
                                 swal({
                                        title: "",
                                        text: data.message,
                                         type: "success",          
                                   });
                                 } 

                                 $('#department_form')[0].reset();

                             }             
                          });
    //code goes here
});



  



</script>
@endsection
