<!DOCTYPE HTML>
<html>
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">

    window.onload = function () {

		var chart = new CanvasJS.Chart("chartContainer", {
			theme: "light1", // "light2", "dark1", "dark2"
			animationEnabled: false, // change to true		
			title:{
				text: "Available Product Quantities"
			},
	axisY: { 
            title: "Product Quantities", 
            suffix: "", 
            includeZero: true 
           },
    axisX: { 
            title: "Product Name", 
            suffix: "", 
            includeZero: true 
            }, 
			data: [
			{
				// Change type to "bar", "area", "spline", "pie",etc.
				type: "column",
				dataPoints: [
					@foreach($product as $product)

                { label: "{{$product->name }}",  y: {{$product->quantity}} },
              @endforeach
				]
			}
			]
		});

    chart.render();

}

</script>
</head>

<body> 
<div class="container">
  <div class="row">
    <div class="col-sm-6" ">
      <div id="chartContainer" style="height: 370px; width: 100%;"></div>
     </div>
    </div>
  </div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
</body>
</html>