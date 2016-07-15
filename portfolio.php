<html>
<link rel="stylesheet" type="text/css" href="style.css">
<head>
<script>
function details(){
	var name = document.viewdetails.propname.value;
	alert("Name "+ name);
}
</script>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="filter.js"></script>

<?php
	if(isset($_POST['viewdetails'])){
		echo "<script type='text/javascript'> alert('Get the details by emailing us @ info@propertywala.com'); </script>";
	}
?>
</head>
<body>
	<div id="portfolio">
		<hr>
		<h2>Gallery</h2>
		<hr>
		
		<div class="sections">
		  <ul>
		    <li class="grid-products" data-colour="red" data-name="1"><span>Product 1</span></li>
		    <li class="grid-products" data-colour="yellow" data-name="2"><span>Product 2</span></li>
		    <li class="grid-products" data-colour="green" data-name="3"><span>Product 3</span></li>
		    <li class="grid-products" data-colour="red" data-name="4"><span>Product 4</span></li>
		    <li class="grid-products" data-colour="blue" data-name="5"><span>Product 5</span></li>
		  </ul>
		</div>

		<div id="filters" class="sections">
		  <div>
		    <h4>Colour</h4>
		    <input type="checkbox" name="colour" id="red" value="red" >Red</input>
		    <input type="checkbox" name="colour" id="blue" value="blue">Blue</input>
		    <input type="checkbox" name="colour" id="green" value="green">Green</input>
		    <input type="checkbox" name="colour" id="yellow" value="yellow">Yellow</input>
		  </div>
		  <div>
		    <h4>Category</h4>
	    <input type="checkbox" name="name" id="1" value="1" >1</input>
	    <input type="checkbox" name="name" id="2" value="2">2</input>
	    <input type="checkbox" name="name" id="3" value="3">3</input>
	    <input type="checkbox" name="name" id="4" value="4">4</input>
		  </div>
		  <div>
		    <input type="button" id="none" value="Clear all"></input>
		  </div>
		</div>
		<!--Portfolio Items-->
		<div class="property">
		<?php
			include "php/dbconnect.php";
			$sql = "SELECT property_id, photo, property_name, address, details FROM properties;";
			$result = mysql_query($sql, $conn);
			$num_rows = mysql_num_rows($result);
			for($i=0; $i<$num_rows; $i++){
				$row = mysql_fetch_assoc($result);
				$image = $row["photo"];
				$product_name = $row["property_name"];
				$location = $row["address"];
				include "portfolio_item.php";
			}
		?>
		</div>
		<!--/Portfolio Items-->
	<div>
	</body>
</html>