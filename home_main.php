<html>
<style>
td{
	padding: 10px;
}
</style>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="sss/sss.min.js"></script>
<link rel="stylesheet" href="sss/sss.css" type="text/css" media="all">

<script>
jQuery(function($) {
$('.slider').sss();
});
$('.slider').sss({
slideShow : true, // Set to false to prevent SSS from automatically animating.
startOn : 0, // Slide to display first. Uses array notation (0 = first slide).
transition : 400, // Length (in milliseconds) of the fade transition.
speed : 3500, // Slideshow speed in milliseconds.
showNav : true // Set to false to hide navigation arrows.
});
</script>
</head> 
<body>
<div class="slider">
	<?php 
		include "php/dbconnect.php";
		$sql = "SELECT property_id, photo, property_name, address, details FROM properties ORDER BY property_id DESC";
		$result = mysql_query($sql, $conn);
		$num_rows = mysql_num_rows($result);
		for($i=0; $i<4; $i++){
			$row = mysql_fetch_assoc($result);
			$image = $row["photo"];
			$name = $row["property_name"];
			$location = $row["address"];
			$details = $row["details"];
			$details = nl2br($details);
			$details = stripslashes($details);
			include "slider.php";
		}
	?>
</div>
<hr>
</body>
</html>