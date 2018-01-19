<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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

<div class="container-fluid">
  <div class="row">
	    <div class="col-sm-8"">
	    	  <div class="blog-post">
		            <h2 class="blog-post-title">{{$blog->title}}</h2>
                    <div id="blog_id" style="display: none;">{{$blog->id}}</div>
		            <p class="blog-post-meta">January 1, 2014 by</p>
		            <p><?php echo $blog ['blog_description'] ?></p>
	          </div>
	    </div>
	    <div class="col-sm-8">
			   <div class="blog_imag">
			        <img src="{{URL::asset('uploads/blog/'.$blog->blog_image)}}" class="slider" alt="Block" style="width:60%;">
			    </div>    	
	  </div>
	  <div class="col-sm-8">
	  	       <h3 class="blog-post-rating">Ratings</h3>
			   <div class="blog_ratings">
			        <div id="rateYo"></div>
			    </div>    	
	  </div>		
</div>

</body>
<script type="text/javascript">
	
$(document).ready(function() {

    $(function () {

         var blog_id = $('#blog_id').text();

	         $("#rateYo").rateYo({ starWidth: "30px",spacing: "5px",rating: 0, halfStar: true})
					.on("rateyo.set", function (e, data) {
	                    var rating = data.rating;
	                    var data = {'blog_id': blog_id,'rating': rating};
						   $.ajax ({
						     url: "{{ URL::route('rating.store') }}",
						     data: data,
						     type: 'POST',
						     dataType: 'json',
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
        });       
});
</script>
</html>