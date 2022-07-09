<!DOCTYPE html>
<html>
<head>
	<title>Test 1</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


	<style type="text/css">
		
		.container_div{
			position: absolute;
		    top: 25%;
		    left: 0;
		    right: 0;
		    bottom: 0;
		}
	</style>
</head>
<body>
	<div class="container container_div" >
		<h1 align="center"><?=number_format($total)?> Records have been imported to the database</h1>
		<form action="../" method="post">
		  <div class="form-row justify-content-center" >
		  </div>
		  <div class="form-row justify-content-center" >
		  	<button type="submit" class="btn btn-primary">Go Home</button>
		  </div> 		
		</form>
	</div>
	
</body>
</html>