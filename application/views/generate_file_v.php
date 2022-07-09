<!DOCTYPE html>
<html>
<head>
	<title>Test 1</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<script data-require="jquery" data-semver="2.1.4" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script data-require="bootstrap" data-semver="3.3.5" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

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
		<h1 align="center">How many records would you like to generate</h1>
		<form action="<?=$action?>" method="post">
		  <div class="form-row justify-content-center" >
		    <div class="form-group col-md-6" >
		      <label for="inputEmail4">No records</label>
		      <input type="number" class="form-control" id="no_records" name="no_records" min="0" max="1000000" value="<?=$value?>">
		      <span <?php if ($error == false) echo "hidden";  ?> style="color: red">Please enter a number greater than zero and less than 1000000</span>
		    </div>
		  </div>
		  <div class="form-row justify-content-center" >
		  	<input type="button" onClick="this.form.submit(); this.disabled=true; this.value='Generating...'; " type="submit" class="btn btn-primary" value="Submit" />
		  </div>
		</form>
	</div>
	
</body>
</html>