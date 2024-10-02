<?php
	require('database.php');
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
		$email=filter_var($_POST['email'],FILTER_SANITIZE_STRING);
		$password=filter_var($_POST['pass'],FILTER_SANITIZE_STRING);
		$regex = '/^[a-z][_a-z0-9-]+(\.[_a-z0-9-]+)*@([a-z0-9-]{2,})+(\.[a-z0-9-]{2,})*$/';
		if(!preg_match('~^[\p{L}\p{Z}]+$~u', $name)){
			echo'
			<script>
			alert("Please enter your name not any characters");
			window.location.href="registration.html";
			</script>
			';
		}elseif(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $password)){
			echo'
			<script>
			alert("invalid password");
			window.location.href="registration.html";
			</script>
			';
			
		}elseif(!preg_match($regex, $email)){
				echo'<script>
					alert("Please enter valid email");
					window.location.href="registration.html";
				</script>';
		}else{
			$insert=mysqli_query($conn,"INSERT INTO `users`(`name`, `email`, `password`) VALUES
			('$name','$email','$password')");
			if($insert){
				echo'<script>
					alert("Successfully registered");
					window.location.href="registration.html";
				</script>';
			}else{
				echo'<script>
					alert("please register again'.$name.'");
					window.location.href="registration.html";
				</script>';
			}
		}
		
		
	}


?>