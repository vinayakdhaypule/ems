<!DOCTYPE html>
<html lang="en">
<head>
  <title>EMS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</head>
<body>
<div class="main-container inner">
				
				<div class="main-content">
					<div class="container">
						
						<div class="toolbar row">
							<div class="col-sm-6 hidden-xs">
								<div class="page-header">
									<h1>Blog View </h1>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<ol class="breadcrumb">
									<li>
										<a href="#">
											Dashboard
										</a>
									</li>
									<li>
										<a href="#">
											Blog
										</a>
									</li>
									 <li class="active">
										<a href="#">
											Blog View
										</a>
									</li>
                                   
								</ol>
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
		        <th class="title">Block Title</th>
		        <th class="blog_description">Block Description</th>
		        <th class="blog_img">Block Image</th>
		        <th>View</th>
		        <th>Rating</th>
	      </tr>
	<?php $no=1; ?>
	@foreach($blog as $blog)
	        <tr>
		          <td>{{$no++}}</td>
		          <td>{{$blog->title}}</td>
		          <td>{!!$blog->blog_description!!}</td>
		   
		          <td><img src="{{URL::asset('uploads/blog/'.$blog->blog_image)}}" class="img-thumbnail" alt="" width="150" height="150"> </td>
		          </td>
				  <td><a href="{{route('blog.edit',$blog->id)}}" class="edit-icon">Show</a></td>
				  <td>
					    <div class="rating" style="display: none;">{{$blog->id}}</div>
						<div id="rateYo">{{$blog->rating}}</div> 

				  </td>
	        </tr>
    @endforeach
      </table>

                                       </div>
                                    </div>
 								</div>
							</div>
						</div>
				</div>
			</div>
</body>
<script type="text/javascript">

$(document).ready(function() {
      
       var blog = $('.rating').val();
       alert(blog);

       $(function () {
       	
	      	$("#rateYo").rateYo({rating: 2});
	    });
});

</script>
</html>