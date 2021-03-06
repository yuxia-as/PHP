<?php 

class Rent{
	protected $id;
	protected $rent;
	protected $type;
	protected $beds;
	protected $bath;
	protected $size;
	protected $address;
	protected $img;
	protected $description;
	// public function __set($property,$value){
	// 	if(property_exists($this, $propery)){
	// 		$this->$property = $value;
	// 	}
	// }
	public function assignValue($arr){
		foreach ($arr as $key => $value) {
			switch($key){
				case 'id':
					$this->id = $value;
					break;
				case 'rent':
					$this->rent = $value;
					break;
				case 'type':
					$this->type = $value;
					break;
				case 'beds':
					$this->beds = $value;
					break;
				case 'bath':
					$this->bath = $value;
					break;
				case 'size':
					$this->size = $value;
					break;
				case 'address':
					$this->address = $value;
					break;
				case 'img_address':
					$this->img = $value;
					break;
				case 'description':
					$this->description = $value;
					break;
				default:
					break;
			}
		}
	}
}
class SingleProperty extends Rent{
	public function printAllProperty($arr){
		$this->assignValue($arr);		
		echo '<div class="col-md-6" style="margin-top:20px;"><div class="card" >';
		echo '<a href="detail.php?id='.$this->id.'"><img src="'.$this->img.'" class="card-img-top" width="100%" height="426"  alt="...">
				  <h5 class="card-title text-center">
				    <span>'.$this->beds.' '.$this->bath.'</span><span>'.$this->size.' sqft</span> <span>'.$this->type.'</span>
				  </h5></a>';
		echo "</div></div>";
	}	
	public function printOwnProperty($arr){
		$this->assignValue($arr);		
		echo '<div class="col-md-6" style="margin-top:20px;"><div class="card" >';
		echo '<a href="detail.php?id='.$this->id.'"><img src="'.$this->img.'" class="card-img-top" width="100%" height="426"  alt="...">
				  <h5 class="card-title text-center">
				    <span>'.$this->beds.' '.$this->bath.'</span><span>'.$this->size.' sqft</span> <span>'.$this->type.'</span>
				  </h5></a>
				  <div class="card-text text-center"><span><a href="upload.php?id='.$this->id.'">Edit Property</a></span>
				  <a class="btn btn-warning btn-delete" href="getData.php?deleteId='.$this->id.'" style="margin-left:10px;">Delete</a></div>';
		echo "</div></div>";
	}
}


class Page extends rent{
	public function printDetail($arr){
		$this->assignValue($arr);
		echo '<div class="row">
					<h4 style="margin-left:30px;">'.$this->address.'</h4>
				</div>
				<div class="row">
					<div class="col-7">
						<img src="'.$this->img.'" width="100%" alt="">
					</div>
					<div class="col-5">
						<div class="row">
							<div class="col-3">
								<h3>Overview</h3>
							</div>
							<div class="col-9">
								<div style="margin-left:10px;">
									<hr class="col-xs-12">
									<div class="row">
										<h5 class="col-6">'.$this->beds.'</h5>
										<h5 class="col-6">'.$this->rent.'$</h5>
									</div>
									<div class="row">
										<h5 class="col-6">'.$this->bath.'</h5>
										<h5 class="col-6">'.$this->size.' sqft</h5>
									</div>
									<div class="row">
										<h5 class="col-12">'.$this->type.'</h5>
										
									</div>
								</div>
							</div>
						</div>

						<div class="row" style="margin-top:30px;">
							<div class="col-3">
								<h5>Description</h5>
							</div>
								<div class="col-9">
									<div style="margin-left:10px;">
										<hr class="col-xs-12">
										<p>'.$this->description.'</p>
									</div>
								</div>
							</div>
						</div>

					</div>';
	}
}


class Database{
	private $dbh;
	//use pdo to connect database
	public function __construct($database,$user,$password){
		$this->dbh = new PDO("mysql:host=localhost;dbname=$database;",$user,$password);
	}
	public function getConnection(){
		return $this->dbh;
	}
}

class User{
	private $db;
	//connect to database
	public function __construct(Database $db){
		$this->db = $db;
	}
	//find user with this email address
	private function checkUser($email){
		$stmt = $this->db->getConnection()->prepare("SELECT count(*) FROM `users` WHERE email=?");
		$stmt->execute(array($email));
		$row = $stmt->fetchColumn();
		return $row;
	}
	//register new user
	public function createUser($name,$email,$phone,$password){
		if(!$this->checkUser($email)){
			$stmt = $this->db->getConnection()->prepare("INSERT INTO `users`(`name`, `email`, `phone`, `password`) VALUES (?,?,?,?)");
			if($stmt->execute(array($name,$email,$phone,$password))){
				$error = null;
			}else{
				$error = "System error, cannot sign up for now.";
				
			}
		}else{
			$error = "This email has been registed.";			
		}
		return $error;
	}
	
	//retrieve user name by logging in with email and password
	public function queryUser($email){
		$stmt = $this->db->getConnection()->prepare("SELECT name,password,id FROM `users` WHERE email=?");
		$stmt->execute(array($email));
		$res = $stmt->fetchAll();
		return $res;
	}
}

class Property{
	private $db;

	public function __construct(Database $db){
		$this->db = $db;
	}
	//retrieve all properties information
	public function getProperties(){
		$stmt = $this->db->getConnection()->query("SELECT * FROM `properties`");
		$rows = $stmt->fetchAll();
		return $rows;
	}
	//retrieve properties information based on user id
	public function getOwnProperties($id){
		$stmt = $this->db->getConnection()->prepare("SELECT * FROM `properties` WHERE user_id = ?");
		$stmt->execute(array($id));
		$rows = $stmt->fetchAll();
		return $rows;
	}
	//update a property's information
	public function updateProperty($arr,$id){
		$stmt = $this->db->getConnection()->prepare("UPDATE `properties` SET `type`=?,`beds`=?,`bath`=?,`size`=?,`rent`=?,`address`=?,`img_address`=?,`description`=? WHERE id=$id");
		if($stmt->execute($arr)){
			return true;
		}else{
			return false;
		}
	}
	//add new property
	public function addProperty($arr){
		$stmt = $this->db->getConnection()->prepare("INSERT INTO `properties`(`type`, `beds`, `bath`, `size`, `rent`, `address`, `img_address`, `description`, `user_id`) VALUES (?,?,?,?,?,?,?,?,?)");
		if($stmt->execute($arr)){
			return true;
		}else{
			return false;
		}
	}
	//find img address
	public function getImg($id){
		$stmt = $this->db->getConnection()->prepare("SELECT img_address FROM `properties` WHERE id=?");
		$stmt->execute(array($id));
		$img = $stmt->fetchColumn();
		return $img;
	}
	//delete a property
	public function deleteProperty($id){
		$stmt = $this->db->getConnection()->prepare("DELETE FROM `properties` WHERE id=?");
		if($stmt->execute([$id])){
			return true;
		}else{
			return false;
		}
	}

	//get all house properties
	public function getHouse(){
		$stmt = $this->db->getConnection()->query('SELECT * FROM `properties` WHERE type = "Single Family Home"');
		$rows = $stmt->fetchAll();
		return $rows;
	}
	//get all apartment properties
	public function getApartment(){
		$stmt = $this->db->getConnection()->query('SELECT * FROM `properties` WHERE type = "Apartment"');
		$rows = $stmt->fetchAll();
		return $rows;
	}

	//search properties
	public function searchProperty($city,$rent_low,$rent_high,$beds,$bath){
		$stmt = $this->db->getConnection()->prepare('SELECT * FROM `properties` WHERE LOWER(address) LIKE ? AND rent between ? and ? AND beds=? AND bath=?');
		$city = "%$city%";
		$stmt->execute(array($city,$rent_low,$rent_high,$beds,$bath));
		$rows = $stmt->fetchAll();
		return $rows;
	}

}


?>