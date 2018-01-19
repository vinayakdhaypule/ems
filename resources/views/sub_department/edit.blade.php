@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
         
    <div class="alert alert-success" style="display: none;"><span class="glyphicon glyphicon-ok">Record Created Successfully</span><em> </em></div>


            <div class="panel panel-default">
                <div class="panel-heading"> Edit Department</div>
                <div class="panel-body">
                    <form id="departmentedit_form" class="form-horizontal" role="form" method="POST" >
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="department name" class="col-md-4 control-label">Department Name</label>
                            
                            
                             <input  id="id" name="id" type="hidden" value="{{$dept[0]->id}}">
                            <div class="col-md-6">
                                <input id="dept_name" type="text" class="form-control" name="dept_name" value="{{$dept[0]->dept_name}}" required autofocus> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="department location" class="col-md-4 control-label">Department Location</label>
                            <div class="col-md-6">
                        <input id="dept_location" type="text" name="dept_location" class="form-control"  value="{{$dept[0]->dept_location}}" required autofocus>  
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
  
    $('#departmentedit_form').submit(function(e){
       e.preventDefault();
  
          var formData = $("#departmentedit_form").serialize();

            $.ajax({
                          type: "POST",
                          data: formData,
        
                          url: "{{ URL::route('department.update') }}",
                          dataType:'json',
                          
                          success: function(data){
                               if(data.success == 1) {
                                 swal({
                                        title: "",
                                        text: data.message,
                                         type: "success",          
                                   });
                                 } 

                             }             
                          });
});


</script>
@endsection
