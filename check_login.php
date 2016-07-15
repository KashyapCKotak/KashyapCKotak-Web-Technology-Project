<?php
	session_start();
	if(isset($_SESSION['login_user'])){
		echo "<form style='float: right;' action='' method='post'><input type='submit' name='logout' value='Logout'></form><p/>";
		if(isset($_POST["logout"])){
			session_destroy();
			unset($_SESSION['login_user']);
			header("Location: login.php");	
		}
	}else
		header("Location: login.php");
?>