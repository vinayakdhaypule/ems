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
									<h1>Sub Department List </h1>
								</div>
							</div>
							<div class="col-sm-4 hidden-xs">
								<div class="page-header">
									<button type="button" class="btn btn-sm btn-success">
<a href="{{route('sub-department')}}"> Add Sub Department</a>
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
        <th class="title">Department</th>
        <th class="blog_url">Sub Department </th> 
        <th>Actions</th>
      </tr>
      <?php $no=1; ?>
      @foreach($subdept as $subdept)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$subdept->dept_name}}</td>
          <td>{{$subdept->sub_dept}}</td>
          <td><a href="">Edit</a> &nbsp;
          	<a href="javascript:void(0)"  class="delete-icon">Delete</a></td>
        </tr>
          @endforeach
    
      </table>

                                       </div>
                                    </div>


 								</div>
							</div>
						</div>


						
						<!-- Ends: PAGE CONTENT -->
					<div class="subviews">
						<div class="subviews-container"></div>
					</div>
				</div>
				<!-- end: PAGE -->
			</div>

<script type="text/javascript">
	var public_path = '<?php echo url('/');?>';
	function delete_department(id){

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
                          url: public_path + '/deleteDepartment/' + id,
                          // url: "{{ URL::route('department.update') }}",
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
    //code goes here
	
}
</script>
@endsection