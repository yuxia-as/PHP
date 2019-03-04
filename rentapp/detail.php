
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>
	
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary" role="navigation">
		  <a class="navbar-brand" href="index.php">Rent.com</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		      <li class="nav-item active">
		        <a class="nav-link" href="#">House<span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Aparment</a>
		      </li>
		      
		    </ul>
		    
		    <div class="nav-right">
		    	<ul class="navbar-nav">
			      <li class="nav-item">
			        <a class="nav-link" href="#">Sign Up</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#">Sign In</a>
			      </li>      
			    </ul>
		    </div>
		  </div>
		</nav>

		<div class="container" style="margin-top:30px;">
			<?php
			include_once("class.php");
			if(isset($_GET['id'])){
				$id = $_GET['id'];
				foreach($data as $value){
					if($value['index']==$id){
						$page = new page;
						$page->printDetail($value);
				}
				}
				
			}
				
			?>	

			</div>		
	</div>
	
	
</body>
</html>