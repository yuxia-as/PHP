<?php

//reading file
function getData($fileName){
	$file = fopen($fileName, 'r');
	if($file==false){
		echo " file not exist";
		exit();
	}
	//define an array for storing each line array
	$data = array();
	while(!feof($file)){
		$line = fgets($file);
		if(strlen($line)==0) break;
		
		//convert each line to an array
		$line_arr = explode(";", $line);
		//convert each element to an associate index and value
		$line_new_arr = mapFunc($line_arr);
		//push to a dataarray
		array_push($data,$line_new_arr);
	}
	fclose($file);
	return $data;
}

//map index and value and convert to an array
function mapFunc($arr){
	foreach($arr as $val){
		//remove empty string
		if(strlen($val)==1) break;
		//seperate string with "=";
		$sub_arr = explode("=",$val);
		//write data to an associate array
		$key = $sub_arr[0];
		$value = $sub_arr[1];
		$dataArr[$key]=$value;				
	}
	return $dataArr;
}

function appendData($fileName,$str){
	$file = fopen($fileName,"a+");
	fwrite($file,$str);
	fwrite($file,"\n");
	fclose($file);
}
function updateData($fileName,$data){
	$file = fopen($fileName,"w+");
	$line_str = "";
	foreach($data as $line_arr){
		foreach($line_arr as $key=>$val){
			$str = "$key=$val;";
			$line_str .= $str;
		}
		$line_str .= "\n";
	}
	fwrite($file,$line_str);
	fclose($file);
}

//raw data is saved in this fie.
$fileName="data.txt";
$data = getData($fileName);
$index = count($data)+1;



//check if client has posted some variables, other variables either have been checked in the front end or have default values
if(isset($_POST['inputAddress']) && isset($_POST['inputRent']) && isset($_FILES['inputGroupFile']) && isset($_POST['inputDesp'])){
	$raw_address = trim($_POST['inputAddress']);
	$city = trim($_POST['inputCity']);
	$state = $_POST['inputState'];
	$zip = trim($_POST['inputZip']);
	//get full address;
	$address = $raw_address.", ".$city.", ".$state." ".$zip;
	$rent = trim($_POST['inputRent']);
	$size = trim($_POST['inputSize']);
	$beds = $_POST['inputBeds'];
	$bath = $_POST['inputBath'];	
	$description = trim($_POST['inputDesp']);
	$type = $_POST['type'][0];

	$file = $_FILES['inputGroupFile'];
	$dir = "./img/";
	$target_file = $dir.basename($_FILES['inputGroupFile']['name']);


// if(isset($_POST['id'])&&!empty($_POST['id'])){
// 	echo "has id";
// }else{echo "no id";}

	//if index exists, will update data file
	if(isset($_POST['id'])&&!empty($_POST['id'])){
		$id = $_POST['id'];
		//echo $index."<br>";
		//check if update the img
		if(!file_exists($target_file))
			move_uploaded_file($_FILES['inputGroupFile']['tmp_name'], $target_file);

		$img_address = "img/".basename($_FILES['inputGroupFile']['name']);
		//find the property and update data;	
		for($i=0;$i<count($data);$i++){
			if($data[$i]['index']==$id){
				$data[$i]['address']=$address;
				$data[$i]['type']=$type;
				$data[$i]['size']=$size;
				$data[$i]['rent']=$rent;
				$data[$i]['beds']=$beds;
				$data[$i]['bath']=$bath;
				$data[$i]['description']=$description;
				$data[$i]['img']=$img_address;	
			}
		}
		updateData($fileName,$data);
		//echo "succ";
		header("Location: index.php"); /* Redirect browser */
		//exit();


	}else{
		//echo "add new";
		// if index not exists, append new data to data file
		// check if file exists
		if(file_exists($target_file)){
			$error = true;
			$msg = "Sorry, this file already exists";
		}else{
			//check file type
			$imgType = pathinfo($target_file,PATHINFO_EXTENSION);
			if($imgType != "jpg" && $imgType != "jpeg" && $imgType != "png"){
				$error = true;
				$msg = "Sorry, you need to upload an image file";
			}else if(move_uploaded_file($_FILES['inputGroupFile']['tmp_name'], $target_file)){
				$img_address = "img/".basename($_FILES['inputGroupFile']['name']);
				$error=false;
			}else{
				$error = true;
				$msg = "The image can not be uploaded.";
			}
		}
		
		
		//if error occurs, return back to upload page
		if($error){
			echo $msg."<br>";
			echo "please go back to <a href='upload.php'>Upload Page</a>";
		}else{
			$line_str = "index=".$index.";rent=".$rent.";type=".$type.";beds=".$beds.";bath=".$bath.";size=".$size.";address=".$address.";img=".$img_address.";description=".$description;
			appendData($fileName,$line_str);
			header("Location: index.php"); /* Redirect browser */
			exit();
		}
	}
}

?>