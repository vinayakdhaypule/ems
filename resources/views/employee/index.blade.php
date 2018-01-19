@extends('layouts.app')

@section('content')
<style type="text/css">
	
	.page-header a {
    color: #ffffff;
    text-decoration: none;
}
</style>
<div class="main-container inner">
				<!-- start: PAGE -->
				<div class="main-content">
					<div class="container">
						<!-- start: PAGE HEADER -->
						<!-- start: TOOLBAR -->
						<div class="toolbar row">
							<div class="col-sm-8 hidden-xs">
								<div class="page-header">
									<h1>Employee List </h1>
								</div>
							</div>
							<div class="col-sm-4 hidden-xs">
								<div class="page-header">
									<button type="button" class="btn btn-sm btn-success">
<a href="{{route('employee.create')}}"> Add Employee</a>
</button>
								</div>
							</div>
						</div>
					
						<div class="row">
							<div class="col-sm-12">
 								<div class="panel panel-white">                              
        <div class="panel-body">
            <div class="row">

     <table class="table table-striped">
      <tr>
        <th>Sl No.</th>
        <th class="title">Name</th>
        <th class=""> Department </th>
        <th class=""> Sub Department</th>  
        <th class=""> Job</th> 
        <th class=""> Phone</th> 
        <th class="">Salary</th> 
        <th class="">Created At</th> 
        <th class="">Action</th> 
        
      </tr>
      <?php $no=1; ?>
      @foreach($employee as $emp)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$emp->emp_name}}</td>
          <td>{{$emp->dept_name}}</td>
          <td>{{$emp->sub_dept}}</td>
          <td>{{$emp->emp_job}}</td>
          <td>{{$emp->emp_phone}}</td>
          <td>{{$emp->emp_salary}}</td>
          <td>{{$emp->created_at}}</td>
          <td><a href="{{route('employee.edit',$emp->id)}}">Edit</a> &nbsp;
          	<a href="javascript:void(0)" onclick="delete_employee({{$emp->id}});" class="delete-icon">Delete</a> &nbsp; <a href="{{route('employee.show',$emp->id)}}">Show</a>
            </td>
        </tr>
          @endforeach
    
      </table>
                    </div>
                  </div>
 								</div>
							</div>
						</div>

					<div class="subviews">
						<div class="subviews-container"></div>
					</div>
				</div>
			</div>

<script type="text/javascript">

	var public_path = '<?php echo url('/');?>';
	function delete_employee(id){

		    swal({
        title: "Are you sure?",
        text: "You will not be able to delete this record file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function (isConfirm) {
      
        if (!isConfirm) return;

		            $.ajax({
                          type: "get",
                          data: {'id':id},
                          url: public_path + '/deleteEmployee/' + id,
                          dataType:'json',
                          
                          success: function(data){
                              if(data.success == 1) {
                              	swal("Done!","It was succesfully deleted!","success");
                                 // swal({
                                 //        title: "",
                                 //        text: data.message,
                                 //         type: "success",          
                                 //   });
                                 }  
  

                             }             
                          });
		         });
    
	
}
</script>
@endsection