<?php 
// <?= URL;/public/
	if($data['connection']){
		//echo '<p>werkt</p>';
		// echo '<img src="images/done.png" style="width: 100%">';
	}else{
		echo '<h1>DB CONNECTION FAILED!</h1>';
	}
?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Manegesite</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		
		
		
		
		
	

		<div class="navbar">
			<div class="nav-items">
				<ul>
					<li><a href="">HOME</a></li>
					<li><a href="">OVER</a></li>
					<li><a href="">PAARDRIJDEN</a></li>
					<li><a href="">ONZE RUITERS</a></li>
					<li><a href="">REGISTREREN</a></li>
					<li><a href="">CONTACT</a></li>
				</ul>
			</div>
		</div>

		<h1>Welkom op de manege website!</h1>
		<h2>Hier kunnen bezoekers ervoor kiezen op ritjes op paarden te maken.</h2>

	<div class="images">
		<img src="images/horse.jpg" id="horse">
		<img src="images/hangar.jpg" id="hangar">
	</div>
		
	</body>
	</html>