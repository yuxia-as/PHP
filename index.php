
	<?php include_once("nav.php");	?>

	<!-- search area -->
		<div style="margin-top:6px;">
			<form class="form-inline">
				<label class="sr-only" for="searchCity">City</label>
  				<input type="text" class="form-control col-md-4" id="searchCity" placeholder="City">
				<label class="sr-only" for="searchPrice">Price</label>
			  	<select class="custom-select col-md-3" id="searchPrice">
				    <option value="700-1000" selected>$700-$1000</option>
				    <option value="1000-1500">$1000-$1500k</option>
				    <option value="1500-2000">$1500k-$2000</option>
				</select>
			  	<label class="sr-only" for="searchBeds">Bedrooms</label>
			  	<select class="custom-select col-md-2" id="searchBeds">
				    <option value="2 Beds" selected>2 Beds</option>
				    <option value="3 Beds">3 Beds</option>
				    <option value="4 Beds">4 Beds</option>
			  	</select>
			  	<label class="sr-only" for="searchBath">Baths</label>
			  	<select class="custom-select col-md-2" id="searchBath">
				    <option value="1 Bath" selected>1 Bath</option>
				    <option value="1.5 Bath">1.5 Bath</option>
				    <option value="2 Bath">2 Bath</option>
				    <option value="2.5 Bath">2.5 Bath</option>
			  	</select>
			  	<button class="col-md-1 btn btn-primary" id="search_btn">Search</button>
			</form>
		</div>
		
		<!-- property list area -->
		
		<div class="row" style="margin-top:15px"; id="propList"> 
			<?php
				include_once("getData.php");

				if(isset($_GET['house'])){
					$rows = $prop->getHouse();
				}else if(isset($_GET['apartment'])){
					$rows = $prop->getApartment();
				}

				foreach($rows as $row){
					$property = new SingleProperty;
					$property->printAllProperty($row);
				}
			?>
		</div>

		<script>
			$(document).ready(function(){
				$('#search_btn').on('click',function(e){
					e.preventDefault();
					//get all search variables
					$city = $('#searchCity').val().toLowerCase();
					$rent = $('#searchPrice').val().split('-');
					$rent_low = $rent[0];
					$rent_high = $rent[1];
					$beds = $('#searchBeds').val();
					$bath = $('#searchBath').val();
					//send data to getData.php through ajax
					$.ajax({
						url:'getData.php?search',
						type:'post',
						data:{city:$city,low_rent:$rent_low,high_rent:$rent_high,beds:$beds,bath:$bath},
						success:function(data){
							var data = data.trim();
							//if get some property data
							if(data.length>0){
								data = JSON.parse(data);
								var $div = '';
								//loop through data and parse them into html
								for(var i=0;i<data.length;i++){
									$div += '<div class="col-md-6" style="margin-top:20px;"><div class="card"><a href="detail.php?id='+data[i].id+'"><img src="'+data[i].img_address+'" class="card-img-top" width="100%" height="426"  alt="..."><h5 class="card-title text-center"><span>'+data[i].beds+' '+data[i].bath+'</span><span>'+data[i].size+' sqft</span> <span>'+data[i].type+'</span></h5></a></div></div>';
								}
								$('#propList').html($div);
							}else{
								//if get no property data, show a message.
								var $div = '<div class="no-result">No Properties is found based on your search.</div>';
								$('#propList').html($div);
							}
						}
					})
				})
			})			

		</script>
			
	<?php include_once("footer.php");	?>	

