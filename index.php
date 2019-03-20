<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<style>
		.card span{
			padding:0 15px;
		}
		.card a{
			text-decoration: none;
		}
	</style>
</head>
<body>
	
<div class="container">
	<!--top Nav part -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary" role="navigation">
		  <a class="navbar-brand" href="index.php">Rent.com</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		      <li class="nav-item active">
		        <a class="nav-link" href="/index.php"><strong>House</strong><span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#"><strong>Aparment</strong></a>
		      </li>
		      
		    </ul>
		    
		    <div class="nav-right">
		    	<ul class="navbar-nav">
			      <li class="nav-item active">
			        <a class="nav-link" href="#"><strong>Sign Up</strong></a>
			      </li>
			      <li class="nav-item active">
			        <a class="nav-link" href="#"><strong>Sign In<strong></a>
			      </li>
			      <li class="nav-item active">
			        <a class="nav-link" href="upload.php"><strong>Upload-Property<strong></a>
			      </li>      
			    </ul>
		    </div>
		  </div>
		</nav>
	<!-- search area -->
		<div style="margin-top:6px;">
			<form action="" class="form-inline">
				<label class="sr-only" for="inlineFormInputCity">City</label>
  				<input type="text" class="form-control col-md-6" id="inlineFormInputCity" placeholder="City">
				<label class="sr-only" for="inlineFormCustomSelect1">Price</label>
			  	<select class="custom-select col-md-3" id="inlineFormCustomSelect1">
				    <option selected>$700-$1000</option>
				    <option value="1">$1000-$1500k</option>
				    <option value="2">$1500k-$2000</option>
				</select>
			  	<label class="sr-only" for="inlineFormCustomSelect2">Bedrooms</label>
			  	<select class="custom-select col-md-3" id="inlineFormCustomSelect2">
				    <option selected>2 Beds 1 Bath</option>
				    <option value="1">2 Beds 1.5 Baths</option>
				    <option value="2">3 Beds 1.5 Baths</option>
				    <option value="3">3 Beds 2 Baths</option>
				    <option value="4">4 Beds 2 Baths</option>
				    <option value="5">4 Beds 2.5 Baths</option>
			  	</select>
			</form>
		</div>
		
		<!-- property list area -->
		<div class="row" style="margin-top:15px;"> 
			<?php
				include_once("class.php");

				foreach($data as $value){
					$property = new SingleProperty;
					$property->printProperty($value);
				}
			?>
		</div>
			
		
	</div>
	<script>

	</script>
	
</body>
</html>
