<?php 
	include "check_login.php";
?>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
	<div id="upload">
		<form action="" method="post" enctype="multipart/form-data">
			Choose image of property<br>
			<input type="file" placeholder="Select image of your property" name="fileToUpload" id="fileToUpload" required><br>
			<hr>Property Name<br>
			<input type="text" name="property_name"><br>
			<hr>Address of the property<br>
			<textarea rows="8" cols="40%" type="text" name="address" placeholder="Enter detailed address of the property"></textarea><br>
			<hr>Additional details of the property<br>
			<textarea rows="8" cols="40%" type="text" name="details" placeholder="Enter any additional details of the property"></textarea><br>
			<input type="submit" value="Submit" name="submit">
		</form>
	</div>
</body>
</html>

<?php
	if(isset($_POST["submit"])){
		$property_name = $_POST["property_name"];
		$address = $_POST["address"];
		$details = $_POST["details"];
		$target_dir = "property/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		echo "<hr><p>";
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}

		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "jpe") {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				$filename = basename( $_FILES["fileToUpload"]["name"]);
				include "php/dbconnect.php";
				$sql = "INSERT INTO `properties` (`photo`, `property_name`, `address`, `details`) VALUES ('$filename', '$property_name', '$address', '$details');";
				$retval = mysql_query( $sql, $conn );
				echo "Property uploaded success";
			} else {
				echo "<center>Sorry, there was an error uploading your property details to the database.</center>";
			}
		}
		echo "</p><hr>";
	}
?>