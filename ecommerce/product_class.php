<?php

abstract class Product{
	protected $name;
	protected $price;
	protected $imgAddress;
	public function __set($prop,$value){
		if(property_exists($this,$prop)){
			$this->$prop = $value;
		}
	}
	public function __get($prop){
			if(property_exists($this, $prop)){
				return $this->$prop;
			}
		}
	public function showTopInfo(){
		echo '<div class="col-4">
				<figure class="figure text-center">
					<img src="'.$this->imgAddress.'" class="figure-img img-fluid" alt="" >
					<figcaption class="figure-caption ">';
	}
	abstract public function showMidInfo();
	public function showBottomInfo(){
		echo '<p><button type="button" class="btn btn-primary">Get Details</button></p>
					</figcaption>
				</figure>
			</div>';
	}
}

class Laptop extends Product{
	public function showMidInfo(){
		echo '<p>'.$this->name.'</p>
			<strong>'.$this->price.'$</strong>';
	}
}

class Book extends Product{
	public $editor;
	public function showMidInfo(){
		echo '<p>'.$this->name.'</p>
			<p>Author: '.$this->editor.'</p>
			<strong>'.$this->price.'$</strong>';
	}
	public function showBottomInfo(){
		echo '<p><button type="button" class="btn btn-primary">Add to Cart</button></p>
					</figcaption>
				</figure>
			</div>';
	}	
}

class DVD extends Product{
	public $director;
	public $genres;
	public function showMidInfo(){
		echo '<p>'.$this->name.'</p>
			<p>Director: '.$this->director.'</p>
			<p>Genres: '.$this->genres.'</p>
			<strong>'.$this->price.'$/day</strong>';
	}
}



?>