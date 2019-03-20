<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<style>
		.card span{
			padding:0 15px;
		}
		.card a{
			text-decoration: none;
		}
		.form-group label,legend{
			font-weight: normal;
		}
	</style>
</head>
<body>
<?php
include_once('data.php');
if(isset($_GET['id'])){
	$id = $_GET['id'];
	foreach($data as $line_arr){
	if($line_arr['index'] == $id)
		$property = $line_arr;
	}
	$address = $property['address'];
	$address_arr = explode(',',$address);
	$st_address = $address_arr[0];
	$city = $address_arr[1];
	$state = substr($address_arr[2],0,strlen($address_arr[2])-6);
	$zip = substr($address_arr[2],strlen($address_arr[2])-5,5);
	 
}
?>	
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
			        <a class="nav-link" href="#"><strong>Upload-Property<strong></a>
			      </li>      
			    </ul>
		    </div>
		  </div>
		</nav>
	<!-- upload forwm area -->
		<div style="margin-top:20px;">
			<form method="post" action="data.php" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo(!empty($id)) ? $id : ''; ?>" />		 
			  <div class="form-group">
			    <label for="inputAddress">Address*</label>
			    <input type="text" class="form-control" id="inputAddress" name="inputAddress"required value="<?php echo (!empty($st_address)) ? $st_address :'' ?>">
			  </div>
			  
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="inputCity">City*</label>
			      <input type="text" class="form-control" id="inputCity" name="inputCity" required value="<?php echo (!empty($city)) ? $city :'' ?>">
			    </div>
			    <div class="form-group col-md-3">
			      <label for="inputState">State</label>
			      <select id="inputState" name="inputState" class="form-control">
			        <option value="PA" <?php if(!empty($state)&& "PA"==trim($state)) echo "selected" ?> >PA</option>
			        <option value="NY" <?php if(!empty($state)&& "NY"==trim($state)) echo "selected" ?> >NY</option>
			        <option value="NJ" <?php if(!empty($state)&& "NJ"==trim($state)) echo "selected" ?> >NJ</option>
			        <option value="VA" <?php if(!empty($state)&& "VA"==trim($state)) echo "selected" ?> >VA</option>
			      </select>
			    </div>
			    <div class="form-group col-md-3">
			      <label for="inputZip">Zip*</label>
			      <input type="text" class="form-control" id="inputZip" name="inputZip" required value="<?php echo (!empty($zip)) ? $zip :'' ?>">
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-3">
			      <label for="inputRent">Rent*</label>
			      <input type="text" class="form-control" id="inputRent" name="inputRent" required value="<?php echo (!empty($property)) ? $property['rent'] :'' ?>">
			    </div>
			    <div class="form-group col-md-3">
			      <label for="inputSize">Squere Foot*</label>
			      <input type="text" class="form-control" id="inputSize" name="inputSize" required value="<?php echo (!empty($property)) ? $property['size'] :'' ?>">
			    </div>
			    <div class="form-group col-md-3">
			      <label for="inputBeds">Bed Room</label>
			      <select id="inputBeds" name="inputBeds" class="form-control">
			        <option value="2 Beds" <?php if(!empty($property['beds'])&& "2 Beds"==trim($property['beds'])) echo "selected" ?> >2 Beds</option>
			        <option value="1 Bed" <?php if(!empty($property['beds'])&& "1 Bed"==trim($property['beds'])) echo "selected" ?>  >1 Bed</option>
			        <option value="3 Beds" <?php if(!empty($property['beds'])&& "3 Beds"==trim($property['beds'])) echo "selected" ?> >3 Beds</option>
			        <option value="4 Beds" <?php if(!empty($property['beds'])&& "4 Beds"==trim($property['beds'])) echo "selected" ?> >4 Beds</option>
			      </select>
			    </div>
			    <div class="form-group col-md-3">
			      <label for="inputBath">Bath Room</label>
			      <select id="inputBath" name="inputBath" class="form-control">
			        <option value="1 Bath" <?php if(!empty($property['bath'])&& "1 Bath"==trim($property['bath'])) echo "selected" ?> >1 Bath</option>
			        <option value="1.5 Bath" <?php if(!empty($property['bath'])&& "1.5 Bath"==trim($property['bath'])) echo "selected" ?> >1.5 Bath</option>
			        <option value="2 Bath" <?php if(!empty($property['bath'])&& "2 Bath"==trim($property['bath'])) echo "selected" ?> >2 Bath</option>
			        <option value="2.5 Bath" <?php if(!empty($property['bath'])&& "2.5 Bath"==trim($property['bath'])) echo "selected" ?> >2.5 Bath</option>
			        <option value="3 Bath" <?php if(!empty($property['bath'])&& "3 Bath"==trim($property['bath'])) echo "selected" ?> >3 Bath</option>
			      </select>
			    </div>
			  </div>
			  <fieldset class="form-group">
			    <div class="row">
			      <legend class="col-form-label col-md-3 pt-0">Property Type*:</legend>
			      <div class="col-md-9">
				    <div class="form-check form-check-inline">
					  <input class="form-check-input" type="checkbox" id="apartment" name="type[]" value="Apartment" <?php if(!empty($property['type'])&& "Apartment"==trim($property['type'])) echo "checked" ?> >
					  <label class="form-check-label" for="apartment">Apartment</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="checkbox" id="house" name="type[]" value="Single Family Home" <?php if(!empty($property['type'])&& "Single Family Home"==trim($property['type'])) echo "checked" ?> >
					  <label class="form-check-label" for="house">Single Family Home</label>
					</div>
					<div class="form-check form-check-inline">
						<span id="msg" style="color:red;"></span>
					</div>
			  	  </div>
			  </div>
			</fieldset>
			<fieldset class="form-group">
			    <div class="row">
			      <legend class="col-form-label col-md-3 pt-0">Upload Property Image*:</legend>
			      <div class="input-group col-md-9">
			      	  <!-- <div class="input-group-prepend">
					    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
					  </div> -->
					  <div class="custom-file">
					    <input type="file" class="custom-file-input" id="inputGroupFile" name="inputGroupFile" aria-describedby="inputGroupFileAddon01">
					    <label class="custom-file-label" for="inputGroupFile">Choose file</label>
					  </div>
				    
				  </div>
			  	  </div>
			  </div>
			</fieldset>
			  
			  <div class="form-group">
			    <label for="inputDesp">Description*</label>
			    <textarea  class="form-control" id="inputDesp" name="inputDesp" placeholder="Please enter property description here..." required> <?php echo (!empty($property)) ? $property['description'] :'' ?></textarea>
			  </div>
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
		
</div>
<script type="text/javascript">	

	$('.form-check-input').each(function(){
		$(this).click(function(){
			if($(this).is(':checked')){
				//console.log($(this).parent().siblings().find('input:checkbox'));
				$(this).parent().siblings().find('input:checkbox').prop('checked',false);
			}
		})
		
	})

	$('#inputGroupFile').on('change',function(e){
        //get the file name
        var fileName = e.target.files[0].name;
        
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })
    $('button').click(function(e){
    	var $check=false;
    	$('.form-check-input').each(function(){
    		if($(this).is(':checked')){
    			$check = true;
    		}
    	})
    	if(!$check) {
    		$('#msg').text('Please select a property type.');
    		e.preventDefault();
    		return false;
    	}
    })	
</script>	
	
</body>
</html>
