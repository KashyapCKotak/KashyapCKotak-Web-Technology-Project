<html>
	<p>Thank You <?php echo $_POST["username"]; ?> for your feedback.</p>
	<p>We will get back to you on <?php echo $_POST["email"]; ?>.</p>
</html>
<?php
	$name = $_POST["username"];
	$email = $_POST["email"];
	$message = $_POST["message"];
	
	include 'dbconnect.php';
	$sql = "INSERT INTO `webtech`.`feedback` (`name`, `email`, `message`) VALUES ('$name', '$email', '$message');";
	$retval = mysql_query( $sql, $conn );
?>