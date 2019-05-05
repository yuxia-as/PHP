
<?php include_once("nav.php");	?>
	
	<!-- property list area -->
	
	<div class="row" style="margin-top:15px;">
		<?php
			include_once("class.php");
			//connect to database
			$db = new Database('rentapp','root','');
			//instance a new Property
			$prop = new Property($db);

			//retrieve user_id
			$user_id = $_SESSION['userid'];
			//retrieve properties under this user_id
			$rows = $prop->getOwnProperties($user_id);
			//print property in the browser
			if(count($rows)>0){
				foreach($rows as $row){
					$property = new SingleProperty;
					$property->printOwnProperty($row);
				}
			}else{
				echo '<div class="no-result">You haven\'t uploaded any properties.</div>';
			}
			
		?>
	</div>

	<script>
		

	</script>
		
<?php include_once("footer.php");	?>	

