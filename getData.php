<?php

include_once('class.php');

$db = new Database('rentapp','root','');

$user = new User($db);
//$user->createUser("Parse","parse@gmail.com","2265635896",'test345');
//$user->queryUser("parse@gmail.com",'test345');
$prop = new Property($db);
$rows = $prop->getProperties();



//check if client has posted some variables, other variables either have been checked in the front end or have default values
if(isset($_POST['inputAddress']) && isset($_POST['inputRent']) && isset($_FILES['inputGroupFile']) && isset($_POST['inputDesp'])){
	$raw_address = htmlspecialchars($_POST['inputAddress']);
	$city = htmlspecialchars($_POST['inputCity']);
	$state = $_POST['inputState'];
	$zip = htmlspecialchars($_POST['inputZip']);
	//get full address;
	$address = $raw_address.", ".$city.", ".$state." ".$zip;
	$rent = htmlspecialchars($_POST['inputRent']);
	$size = htmlspecialchars($_POST['inputSize']);
	$beds = $_POST['inputBeds'];
	$bath = $_POST['inputBath'];	
	$description = htmlspecialchars($_POST['inputDesp']);
	$type = $_POST['type'][0];

	$file = $_FILES['inputGroupFile'];
	$dir = "./img/";
	$target_file = $dir.basename($_FILES['inputGroupFile']['name']);


	//if index exists, will update data file
	if(isset($_POST['id'])&&!empty($_POST['id'])){
		$id = $_POST['id']; 
		
		//check if update the img
		if(!file_exists($target_file))
			move_uploaded_file($_FILES['inputGroupFile']['tmp_name'], $target_file);

		$img_address = "img/".basename($_FILES['inputGroupFile']['name']);
		//find the property and update data;	
		$prop_update = array($type,$beds,$bath,$size,$rent,$address,$img_address,$description);
		if($prop->updateProperty($prop_update,$id)){
			header("Location: index.php"); /* Redirect browser */
		}else{
			echo "System error, you cannot update your property now. Please go back to <a href='upload.php'>Upload Page</a>";
		}
		

	}else{
		// if index not exists, append new data to data file
		// check if file exists
		$error = array();
		if(file_exists($target_file)){
			$error['exist'] = "Sorry, this file already exists";
		}else{
			//check file type
			$imgType = pathinfo($target_file,PATHINFO_EXTENSION);
			if($imgType != "jpg" && $imgType != "jpeg" && $imgType != "png"){
				$error['imgtype'] = "Sorry, you need to upload an image file";
			}else if(move_uploaded_file($_FILES['inputGroupFile']['tmp_name'], $target_file)){
				$img_address = "img/".basename($_FILES['inputGroupFile']['name']);
				
			}else{
				$error['system'] = "System Error, the image can not be uploaded.";
			}
		}
		
		
		//if error occurs, return back to upload page
		if(array_filter($error)){
			//print each error;
			foreach($error as $single_error){
				echo $single_error."<br>";
			}
			echo "please go back to <a href='upload.php'>Upload Page</a>";
		}else{
			$prop_add = array($type,$beds,$bath,$size,$rent,$address,$img_address,$description,2);
			if($prop->addProperty($prop_add)){
				header("Location: index.php"); /* Redirect browser */
			}else{
				echo "System error, you cannot upload your property now. Please go back to <a href='upload.php'>Upload Page</a>";
			}
			
			
		}
	}
}

if(isset($_POST['signupUser'])&&isset($_POST['signupEmail'])&&isset($_POST['signupPwd'])){
	//receiving all variables from sign up form;
	$name = htmlspecialchars($_POST['signupUser']);
	$email = htmlspecialchars($_POST['signupEmail']);
	$phone = htmlspecialchars($_POST['signupPhone']);
	$pwd = htmlspecialchars($_POST['signupPwd']);
	//write sign up data into database
	$res = $user->createUser($name,$email,$phone,$pwd);
	echo $res;
}

if(isset($_POST['signinEmail'])&&isset($_POST['signinPwd'])){
	$email = htmlspecialchars($_POST['signinEmail']);
	$pwd = htmlspecialchars($_POST['signinPwd']);
	$res = $user->queryUser($email,$pwd);
	echo $res;
}






//delete a property
if(isset($_GET['deleteId'])){
	$id = htmlspecialchars($_GET['deleteId']);
	if($prop->deleteProperty($id)){
		header("Location: index.php"); /* Redirect browser */
	}else{
		echo "System error, you cannot delete your property now. Please go back to <a href='index.php'>Home Page</a>";
	}
}
?>

