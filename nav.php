
<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
  	<title>Rent</title>
  	
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style>
	.no-result{
	  margin-top:30px;
	  width:100%;
	  height:300px;
	  text-align:center;
	  font-size:25px;
	  color:red;
	}
</style>
	
</head>
<body>
	
<div class="container">
	<!--top Nav part -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary" role="navigation">

		  <a class="navbar-brand mr-3" href="index.php"><i class="fas fa-home"></i><strong class="pl-1">Rent.com</strong></a>
		  <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button> -->

		  <!-- <div class="collapse navbar-collapse" id="navbarTogglerDemo02"> -->
		    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		      <li class="nav-item ml-3 active">
		        <a class="nav-link" href="index.php?house"><strong>House</strong></a>
		      </li>
		      <li class="nav-item ml-3 active">
		        <a class="nav-link" href="index.php?apartment"><strong>Aparment</strong></a>
		      </li>
		      
		    </ul>
		    
		    <div class="nav-right">
		    	<?php if(!isset($_SESSION['user'])){ ?>
		    	<ul class="navbar-nav" id="sign">
			      <li class="nav-item mr-3 active">
			      	<a class="nav-link" data-toggle="modal" data-target="#myModal1" href="#"><i class="fas fa-user-plus pr-1"></i><strong>Sign Up</strong></a>
			      </li>
			      <li class="nav-item mr-3 active">
			        <a class="nav-link" data-toggle="modal" data-target="#myModal2" href="#"><i class="fas fa-sign-in-alt pr-1"></i><strong>Sign In</strong></a>
			      </li>
			  </ul>
			  <?php }else{ ?>
			  <ul class="navbar-nav" id="out">
			      <li class="nav-item mr-3 active">
			        <a class="nav-link" data-toggle="modal" data-target="#myModal3" href="#"><i class="fas fa-sign-out-alt pr-1"></i>
			        <strong><span>
			        	<?php echo $_SESSION['user']; ?>
			        </span>-Log out</strong></a>
			      </li>
			      <li class="nav-item active">
			        <a class="nav-link" href="upload.php"><strong>Upload-Property<strong></a>
			      </li>
			      <li class="nav-item active">
			        <a class="nav-link" href="myproperty.php"><strong>My-Properties<strong></a>
			      </li>      
			    </ul>
			<?php } ?>
		    </div>
		  <!-- </div> -->
		</nav>

<!-- Modal -->

<!-- Sign up Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">     
      <div class="modal-body">
        <form action="getData.php" method="post">
        	<div class="form-group">
		    	<label for="signUpUser">User Name<span style="color:red;">*</span></label>
		    	<input type="text" class="form-control" id="signUpUser" name="signupUser" placeholder="User Name" required>
		  	</div>
        	<div class="form-group">
		    	<label for="signUpEmail">Email address<span style="color:red;">*</span></label>
		    	<input type="email" class="form-control" id="signUpEmail" name="signupEmail" placeholder="Email" required>
		  </div>
		  <div class="form-group">
		    	<label for="signUpPhone">Phone</label>
		    	<input type="text" class="form-control" id="signUpPhone" name="signupPhone" placeholder="Phone">
		  </div>
		  <div class="form-group">
		    	<label for="signUpPassword1">Password<span style="color:red;">*</span></label>
		    	<input type="password" class="form-control" id="signUpPassword1" name="signupPassword" placeholder="Password" required>
		  </div>
		  <div class="form-group">
		    	<label for="signUpPassword2">Renter Password<span style="color:red;">*</span></label>
		    	<input type="password" class="form-control" id="signUpPassword2" name="signupPassword2" placeholder="Renter Password" required>
		  </div>
		  <div><span id="msgSignUp" style="color:red;">
		  	<?php if(isset($_GET['signupError'])) echo $_GET['signupError'];  ?>
		  </span></div>
		  <!-- <button type="button" class="btn btn-primary" name="signUpBtn">Sign Up</button> -->
		  <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <input type="submit" class="btn btn-primary" id="signupBtn" name="signupBtn" value="Sign Up">
	      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

<!-- Sign in Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">     
      <div class="modal-body">
        <form action="getData.php" method="post">
        	<div class="form-group">
		    	<label for="signinEmail">Email address<span style="color:red;">*</span></label>
		    	<input type="email" class="form-control" id="signinEmail" name="signinEmail" placeholder="Email" required>
		  </div>
		  <div class="form-group">
		    	<label for="signinPassword">Password<span style="color:red;">*</span></label>
		    	<input type="password" class="form-control" id="signinPassword" name="signinPassword" placeholder="Password" required>
		  </div>
		  <div><span id="msgSignIn" style="color:red;">
		  	<?php 
		  		if(isset($_GET['signinError'])) echo "The email doesn't exist.";
		  		if(isset($_GET['signinErrorEmail'])) echo "The password is not correct."; 
		  	?>
		  </span></div>
		  <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <input type="submit" class="btn btn-primary" name="signinBtn" value="Sign In">
	      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

<!-- Log Out Modal -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">     
      <div class="modal-body text-center">
        <i class="fas fa-user h1"></i><span class="ml-3">
        	<?php if(isset($_SESSION['user'])) echo $_SESSION['user']; ?>
        </span>
      </div>
      <div class="modal-footer text-center">
      	<form action="getData.php" method="post">
      		<input type="submit" class="btn btn-primary" name="logoutBtn" value="Log Out">
      	</form>
      </div>
    </div>
  </div>
</div>

<script>
	$(document).ready(function(){
		var $signinError = $('#msgSignIn').text().trim();
		var $signupError = $('#msgSignUp').text().trim();
		//console.log($signinError);
		if($signinError !=''){
			$('#myModal2').modal('show');
		}
		if($signupError !=''){
			$('#myModal1').modal('show');
		}
		$('#signupBtn').on('click',function(e){
			$pwd1 = $('#signUpPassword1').val();
			$pwd2 = $('#signUpPassword2').val();
			if($pwd1!=$pwd2){
				e.preventDefault();
				$('#msgSignUp').text("The passwords do not match, please enter again.");
			}
		})

	})
	
</script>

<!-- <script>

	$('#out').hide();
	//$('#sign').hide();
	$('#signUpBtn').on('click',function(e){
		//get all sign up value
		$user = $('#signUpUser').val();
		$email = $('#signUpEmail').val();
		$phone = $('#signUpPhone').val();
		$pwd1 = $('#signUpPassword1').val();
		$pwd2 = $('#signUpPassword2').val();
		//check if passwords match
		if($pwd1 != $pwd2){
			e.preventDefault();
			$('#msgSignUp').html("The two passwords do not match, please entet again.");
		}else{
			//send data to backend
			$.ajax({
				url:'getData.php',
				type:'post',
				data:{signupUser:$user,signupEmail:$email,signupPhone:$phone,signupPwd:$pwd1},
				success:function(data){
					var data = JSON.parse(data);
					if(data.result){
						$('#myModal1').modal('hide');
						$('#sign').hide();
						$('#out').show();
						$('.myname').html(data.name);
					}else{
						$('#msgSignUp').html(data.msg);
					}
				}
			})
		}
	})

	$('#signInBtn').on('click',function(e){
		//get sign in value
		$email = $('#signinEmail').val();
		$pwd = $('#signinPassword').val();
		$.ajax({
			url:'getData.php',
			type:'post',
			data:{signinEmail:$email,signinPwd:$pwd},
			success:function(data){
				var data = JSON.parse(data);
				//console.log(data);
				if(data.result){
					$('#myModal2').modal('hide');
					$('#sign').hide();
					$('#out').show();
					$('.myname').html(data.name);
				}else{
					e.preventDefault();
					$('#msgSignIn').html(data.msg);
				}
			}
		})
	})
</script> -->