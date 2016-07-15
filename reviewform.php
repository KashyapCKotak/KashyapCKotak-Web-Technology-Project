<html>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
	<div id="reviewform">
		<hr>
		<h2>Registration Form</h2>
		<hr>
		<form action="" method="post">
			<fieldset class="block">
				<legend>Personal Information</legend>
				<input class="review half" type="text" placeholder="First Name" name="fname" pattern="[a-zA-Z]+" title="Only enter letters" required></input>
				<input class="review half" type="text" placeholder="Last Name" name="lname" pattern="[a-zA-Z]+" title="Only enter letters" required></input><br>
				<textarea class="review" type="text" placeholder="Address" name="address" required></textarea><br>
				<input class="review" type="text" placeholder="Contact Number" name="contact" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required></input><br>
				<input class="review" type="email" placeholder="E-Mail" name="email" required></input><br>
			</fieldset>
			<fieldset class="block">
				<legend class="block_name">Login Details</legend>
				<input class="review" type="text" placeholder="Username" name="username" required></input><br>
				<input class="review" type="password" placeholder="Password" name="password" required></input><br>
				<input class="review" type="password" placeholder="Confirm Password" name="passwordcnf" required></input><br>
			</fieldset>
			<div class="blk">
				<button class="submit review half" type="submit" value="submit" name="submit">Submit</button>
				<button class="submit review half" type="reset" value="Reset">Reset</button>
			</div>
			</form>
	</div>
</body>
</html>
<?php
	include "php/dbconnect.php";
	if(isset($_POST["submit"])){
		$fname = $_POST["fname"];
		$lname = $_POST["lname"];
		$address = $_POST["address"];
		$contact = $_POST["contact"];
		$email = $_POST["email"];
		$username = $_POST["username"];
		$password = $_POST["password"];
		$passwordcnf = $_POST["passwordcnf"];

		if($password == $passwordcnf){
			$sql = "INSERT INTO `user` (`first_name`, `last_name`, `address`, `contact`, `email`, `username`, `password`) VALUES ('$fname', '$lname', '$address', '$contact', '$email', '$username', '$password');";
			$result = mysql_query($sql, $conn);
			echo "Registered Successfully";
		}else{
			echo "Passwords do not match";
		}
	}
?>