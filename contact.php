<html>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
	<div id="contact">
		<hr>
		<h2>Contact Us</h2>
		<hr>
		<form action="php/submit.php" method="post">
			<input class="feedback" type="text" placeholder="Name" name="username" pattern="[a-zA-Z]+" title="Only enter letters" required></input><br>
			<input class="feedback" type="email" placeholder="E-mail" name="email" required></input><br>
			<textarea class="feedback" type="text" placeholder="Message" name="message" required></textarea><br>
			<button class="submit feedback" type="submit" value="submit">Submit</button>
		</form>
	</div>
</body>
</html>