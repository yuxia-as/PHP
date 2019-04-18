
<?php include_once("nav.php");	?>

<div style="margin-top:30px;">
	<?php
	include_once("getData.php");
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		foreach($rows as $row){
			if($row['id']==$id){
				$page = new page;
				$page->printDetail($row);
			}
		}
		
	}
		
	?>	
</div>
<?php include_once("footer.php");	?>		
	
</body>
</html>