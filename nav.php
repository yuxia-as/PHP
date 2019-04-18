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
		        <a class="nav-link" href="/index.php"><strong>House</strong></a>
		      </li>
		      <li class="nav-item ml-3 active">
		        <a class="nav-link" href="#"><strong>Aparment</strong></a>
		      </li>
		      
		    </ul>
		    
		    <div class="nav-right">
		    	<ul class="navbar-nav" id="sign">
			      <li class="nav-item mr-3 active">
			      	<a class="nav-link" data-toggle="modal" data-target="#myModal1" href="#"><i class="fas fa-user-plus pr-1"></i><strong>Sign Up</strong></a>
			      </li>
			      <li class="nav-item mr-3 active">
			        <a class="nav-link" data-toggle="modal" data-target="#myModal2" href="#"><i class="fas fa-sign-in-alt pr-1"></i><strong>Sign In</strong></a>
			      </li>
			  </ul>
			  <ul class="navbar-nav" id="out">
			      <li class="nav-item mr-3 active">
			        <a class="nav-link" data-toggle="modal" data-target="#myModal3" href="#"><i class="fas fa-sign-out-alt pr-1"></i><span class="mr-2 myname"></span><strong>Log out</strong></a>
			      </li>
			      <li class="nav-item active">
			        <a class="nav-link" href="upload.php"><strong>Upload-Property<strong></a>
			      </li>      
			    </ul>
		    </div>
		  <!-- </div> -->
		</nav>

<!-- Modal -->

<!-- Sign up Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">     
      <div class="modal-body">
        <form action="">
        	<div class="form-group">
		    	<label for="signUpUser">User Name</label>
		    	<input type="email" class="form-control" id="signUpUser" placeholder="User Name">
		  	</div>
        	<div class="form-group">
		    	<label for="signUpEmail">Email address</label>
		    	<input type="email" class="form-control" id="signUpEmail" placeholder="Email">
		  </div>
		  <div class="form-group">
		    	<label for="signUpPhone">Phone</label>
		    	<input type="text" class="form-control" id="signUpPhone" placeholder="Phone">
		  </div>
		  <div class="form-group">
		    	<label for="signUpPassword1">Password</label>
		    	<input type="password" class="form-control" id="signUpPassword1" placeholder="Password">
		  </div>
		  <div class="form-group">
		    	<label for="signUpPassword2">Renter Password</label>
		    	<input type="password" class="form-control" id="signUpPassword2" placeholder="Renter Password">
		  </div>
		  <div><span id="msgSignUp" style="color:red;"></span></div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="signUpBtn">Sign Up</button>
      </div>
    </div>
  </div>
</div>

<!-- Sign in Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">     
      <div class="modal-body">
        <form action="">
        	<div class="form-group">
		    	<label for="signinEmail">Email address</label>
		    	<input type="email" class="form-control" id="signinEmail" placeholder="Email">
		  </div>
		  <div class="form-group">
		    	<label for="signinPassword">Password</label>
		    	<input type="password" class="form-control" id="signinPassword" placeholder="Password">
		  </div>
		  <div><span id="msgSignIn" style="color:red;"></span></div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="signInBtn">Sign In</button>
      </div>
    </div>
  </div>
</div>

<!-- Log Out Modal -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">     
      <div class="modal-body text-center">
        <i class="fas fa-user h1"></i><span class="ml-3 myname"></span>
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="btn btn-primary">Log Out</button>
      </div>
    </div>
  </div>
</div>

<script>

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
</script>