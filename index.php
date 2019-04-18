
	<?php include_once("nav.php");	?>

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
				include_once("getData.php");

				foreach($rows as $row){
					$property = new SingleProperty;
					$property->printProperty($row);
				}
			?>
		</div>

		<script>
			//delete property
			$('.btn-delete').on('click',function(){
				$id = $(this).attr("data-id");
			})
		</script>
			
	<?php include_once("footer.php");	?>	

