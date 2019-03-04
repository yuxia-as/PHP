<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>
	<?php include_once('data.php'); ?>
	
	<div class="container" style="margin-top:20px;">
		<div class="col-9">
			<ul class="nav nav-tabs" role="tablist">
			  <li class="nav-item">
			    <a class="nav-link active" data-toggle="tab" href="#home">Laptop</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" data-toggle="tab" href="#menu1">Book</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" data-toggle="tab" href="#menu2">DVD</a>
			  </li>
			</ul>
			<div class="tab-content">
			<div id="home" class="container tab-pane active"><br>
				<div class="row">
				<?php
				//print_r($laptopArr);
				foreach ($laptopArr as $value) {
					# code...
					$lapTop = new Laptop;
					foreach ($value as $key => $lapVariable) {
						# code...
						switch ($key) {
							case 'name':
								$lapTop->name = $lapVariable;
								break;
							case 'price':
								$lapTop->price = $lapVariable;
								break;
							case 'imgAddress':
								$lapTop->imgAddress = $lapVariable;
								break;
							default:
								break;
						}
					}
					$lapTop->showTopInfo();
					$lapTop->showMidInfo();
					$lapTop->showBottomInfo();	
				}
				?>
			</div>
			</div>
			<div id="menu1" class="container tab-pane fade"><br>
				<div class="row">
				<?php
					foreach ($bookArr as $value) {
						$book = new Book;
						foreach ($value as $key => $bookVariable) {
							switch($key){
								case 'name':
									$book->name = $bookVariable;
									break;
								case 'price':
									$book->price = $bookVariable;
									break;
								case 'imgAddress':
									$book->imgAddress = $bookVariable;
									break;
								case 'editor':
									$book->editor = $bookVariable;
									break;
								default:
									break;
							}
						}
						$book->showTopInfo();
						$book->showMidInfo();
						$book->showBottomInfo();
					}
				?>
			</div>
			</div>
			<div id="menu2" class="container tab-pane fade"><br>
			<div class="row">
				<?php
					foreach ($dvdArr as $value) {
						$dvd = new DVD;
						foreach ($value as $key => $dvdVariable) {
							switch($key){
								case 'name':
									$dvd->name = $dvdVariable;
									break;
								case 'price':
									$dvd->price = $dvdVariable;
									break;
								case 'imgAddress':
									$dvd->imgAddress = $dvdVariable;
									break;
								case 'director':
									$dvd->director = $dvdVariable;
									break;
								case 'genres':
									$dvd->genres = $dvdVariable;
								default:
									break;
							}
						}
						$dvd->showTopInfo();
						$dvd->showMidInfo();
						$dvd->showBottomInfo();
					}
				?>
			</div>
			</div>
		</div>
	</div>
</body>
</html>