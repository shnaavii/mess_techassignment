<?php
session_start();
require('database.php');
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$email=filter_var($_POST['lemail'],FILTER_SANITIZE_STRING);
		$pass=filter_var($_POST['lpass'],FILTER_SANITIZE_STRING);
		
		$login_query=mysqli_query($conn,"SELECT * FROM `users` WHERE `email`='".$email."' AND `password`='".$pass."'");
		if($login_query){
			$_SESSION['email']=$email;
			echo'
			<script>
			alert("successfully login");
			window.location.href="dashboard.html";
			// window.location.href="demo.php";
			</script>
			';
		}else{
			echo'
			<script>
			alert("please login again");
			window.location.href="dashboard.html";
			</script>
			';
		}
		
	}

?>