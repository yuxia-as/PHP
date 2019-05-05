<?php

include_once('class.php');

$db = new Database('rentapp','root','');

$user = new User($db);
$prop = new Property($db);
$rows = $prop->getProperties();



//upload or update property data into database
if(isset($_POST['uploadProperty'])){
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
		$origin_img = $prop->getImg($id);
		//check if update the img
		if(!file_exists($target_file)){
			//upload new image
			move_uploaded_file($_FILES['inputGroupFile']['tmp_name'], $target_file);
			//remove original image
			unlink($origin_img);
		}

		$img_address = "img/".basename($_FILES['inputGroupFile']['name']);
		//find the property and update data;	
		$prop_update = array($type,$beds,$bath,$size,$rent,$address,$img_address,$description);
		if($prop->updateProperty($prop_update,$id)){
			header("Location: myproperty.php"); /* Redirect browser */
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
			session_start();
			$prop_add = array($type,$beds,$bath,$size,$rent,$address,$img_address,$description,$_SESSION['userid']);
			if($prop->addProperty($prop_add)){
				header("Location: index.php"); /* Redirect browser */
			}else{
				echo "System error, you cannot upload your property now. Please go back to <a href='upload.php'>Upload Page</a>";
			}
			
			
		}
	}
}

if(isset($_POST['signupBtn'])){
	//receiving all variables from sign up form;
	$name = htmlspecialchars($_POST['signupUser']);
	$email = htmlspecialchars($_POST['signupEmail']);
	$phone = htmlspecialchars($_POST['signupPhone']);
	$pwd = htmlspecialchars($_POST['signupPassword']);
	$pwd_hash = password_hash($pwd, PASSWORD_DEFAULT);
	//write sign up data into database
	$res = $user->createUser($name,$email,$phone,$pwd_hash);
	if($res){
		header("location:index.php?signupError=$res");
		exit();
	}else{
		session_start();
		$_SESSION['user'] = $name;
		$user_info = $user->queryUser($email);
		//print_r($user_info);
		$_SESSION['userid'] = $user_info[0]['id'];
		//redirect to home page
		header("location:index.php");
		exit();
	}
}


if(isset($_POST['signinBtn'])){
	//receiving variables from sign in form;
	$email = htmlspecialchars($_POST['signinEmail']);
	$pwd = htmlspecialchars($_POST['signinPassword']);
	$pwd_hash = password_hash($pwd, PASSWORD_DEFAULT);
	$res = $user->queryUser($email);
	
	//if find a name
	if(count($res)>0){
		$hash_pwd = $res[0]['password'];
		$pwdCheck = password_verify($pwd, $hash_pwd);
		if($pwdCheck){
			//set up session
			session_start();
			$_SESSION['user'] = $res[0]['name'];
			$_SESSION['userid'] = $res[0]['id'];
			//redirect to home page
			header("location:index.php");
			exit();
		}else{
			//send error message to home page
			header("location:index.php?signinErrorEmail");
			exit();
		}
		
	}else{
		//send error message to home page
		header("location:index.php?signinError");
		exit();
	}
}

//log out part
if(isset($_POST['logoutBtn'])){
	//remove session variable
	session_start();
	session_unset();
	session_destroy();
	header("location:index.php");
	exit();
}


//delete a property
if(isset($_GET['deleteId'])){
	$id_del = htmlspecialchars($_GET['deleteId']);
	//get img address from database
	$img = $prop->getImg($id_del);
	//remove property info from database
	if($prop->deleteProperty($id_del)){
		//remove img from diretory
		unlink($img);
		header("Location: myproperty.php"); /* Redirect browser */
	}else{
		echo "System error, you cannot delete your property now. Please go back to <a href='myproperty.php'>My Property Page</a>";
	}
}

if(isset($_GET['search'])){
	$city = htmlspecialchars($_POST['city']);
	$rent_low = $_POST['low_rent'];
	$rent_high = $_POST['high_rent'];
	$beds = $_POST['beds'];
	$bath = $_POST['bath'];
	//get search results based on search variables
	$search_res = $prop->searchProperty($city,$rent_low,$rent_high,$beds,$bath);
	if(count($search_res)>0){
		echo json_encode($search_res);
	}else{
		echo '';
	}
}


?>

