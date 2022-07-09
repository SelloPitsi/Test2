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
		<h1 align="center">Upload CSV File Data to Database</h1>

		<form action="import" method="post" enctype="multipart/form-data" >
		  <div class="form-row justify-content-center" >
		    <div class="form-group col-md-6" >
		      <label for="file">Upload File</label>
		      <input type="file" name="file" id="file" class="form-control" accept=".csv">
		       <span <?php if ($error == false) echo "hidden";  ?> style="color: red">Error on file upload, please try again</span>
		    </div>
		
		   
		  </div>
		  <div class="form-row justify-content-center" >
		  	<input type="button" onClick="this.form.submit(); this.disabled=true; this.value='Importing...'; " type="submit" class="btn btn-primary" value="Submit" />
		  </div>
		
		</form>
	</div>
	
</body>
</html>