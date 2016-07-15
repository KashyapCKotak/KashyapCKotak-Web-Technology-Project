<html>
<head>
<link rel="stylesheet" type="text/css" href="style1.css">
<script src="textarea.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script src="loader.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="se-pre-con"></div>
<div class= 'body'>
	<div id="contact">
		<form method="post" action="">
			<fieldset>
			<legend>Login</legend>
			<input class="feedback" type="text" name="username" autocomplete="off" onfocus="this.removeAttribute('readonly');" placeholder="Username" readonly required></input><br>
			<input class="feedback" type="password" name="password" placeholder="Password"></input><br>
			<input class="submit feedback" type="submit" name="submit" value="Submit"></input>
			</fieldset>
		</form>
	</div>
	<center><div class='form-style-8'><input type='button' onclick='document.location="reviewform.php"' value='Not Yet Registered? Click Here'></input></div></center>

<?php
echo "<p>";
session_start();
if(isset($_SESSION['login_user'])){
	include "php/dbconnect.php";
	header("Location: property_upload.php");
}
else if(isset($_POST["submit"])){
	include "php/dbconnect.php";
	$username = $_POST["username"];
	$password = $_POST["password"];
	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	
  	if($username!="" && $password!=""){
  		$sql = "SELECT username, password  FROM `user` WHERE `username` LIKE '$username' AND `password` LIKE '$password'";
		$result = mysql_query( $sql, $conn );
		$num_rows = mysql_num_rows($result);
		if($num_rows==1){
			$_SESSION['login_user'] = $username;
			header("Location: property_upload.php");
		}else{
			echo '<hr><center>Username or password is incorrect<hr></center>';
		}
	}
}
if(isset($_POST["frgtpass"])){
	echo '<hr><center>Please contact administrator on abc@def.com<hr></center>';
}
echo "</p>";
?>
</div>
</body>
</html>
