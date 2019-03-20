<?php 

include_once("data.php");

class Rent{
	protected $index;
	protected $rent;
	protected $type;
	protected $beds;
	protected $bath;
	protected $size;
	protected $address;
	protected $img;
	protected $description;
	public function __set($property,$value){
		if(property_exists($this, $propery)){
			$this->$property = $value;
		}
	}
	public function assignValue($arr){
		foreach ($arr as $key => $value) {
			switch($key){
				case 'index':
					$this->index = $value;
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
				case 'img':
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
	public function printProperty($arr){
		$this->assignValue($arr);		
		echo '<div class="col-md-6" style="margin-top:20px;"><div class="card" >';
		echo '<a href="detail.php?id='.$this->index.'"><img src="'.$this->img.'" class="card-img-top" width="640" height="426"  alt="...">
				  <h5 class="card-title text-center">
				    <span>'.$this->beds.' '.$this->bath.'</span><span>'.$this->size.' sqft</span> <span>'.$this->type.'</span>
				  </h5></a>
				  <p class="card-text text-center"><a href="upload.php?id='.$this->index.'">Edit This Property</a></p>';
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
						<img src="'.$this->img.'" width="640" height="426" alt="">
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

?>