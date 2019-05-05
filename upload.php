<?php 

include_once("nav.php");

include_once('getData.php');

if(isset($_GET['id'])){
	$id = $_GET['id'];
	foreach($rows as $row){
	if($row['id'] == $id)
		$property = $row;
	}
	$address = $property['address'];
	$address_arr = explode(',',$address);
	$st_address = $address_arr[0];
	$city = $address_arr[1];
	$state = substr($address_arr[2],0,strlen($address_arr[2])-6);
	$zip = substr($address_arr[2],strlen($address_arr[2])-5,5);
	 
}
?>	

	<!-- upload form area -->
		<div style="margin-top:20px;">
			<form method="post" action="getData.php" enctype="multipart/form-data">
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
						<span id="msgCheck" style="color:red;"></span>
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
			  	  <div class="row">
			  	  	<div class="col-md-3"></div><div class="col-md-9"><span id="msgFile" style="color:red;"></span></div>
			  	  </div>
			  
			</fieldset>
			  
			  <div class="form-group">
			    <label for="inputDesp">Description*</label>
			    <textarea  class="form-control" id="inputDesp" name="inputDesp" rows="5" placeholder="Please enter property description here..." required> <?php echo (!empty($property)) ? $property['description'] :'' ?></textarea>
			  </div>
			  <button type="submit" class="btn btn-primary" name="uploadProperty">Submit</button>
			</form>
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
    	//check if select a property type
    	var $check=false;
    	$('.form-check-input').each(function(){
    		if($(this).is(':checked')){
    			$check = true;
    		}
    	})
    	if(!$check) {
    		$('#msgCheck').text('Please select a property type.');
    		e.preventDefault();
    		return false;
    	}else{
    		$('#msgCheck').html('');
    	}
    	//check if upload a file
    	var fileLen = $('#inputGroupFile')[0].files.length;
    	if(fileLen==0){
    		console.log("file=0");
    		$('#msgFile').text('Please Upload an image file.');
    		e.preventDefault();
    		return false;
    	}else{
    		$('#msgFile').html('');
    	}

    })	
</script>	
	
<?php include_once("footer.php");	?>
