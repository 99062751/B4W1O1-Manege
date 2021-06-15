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
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= 'Manegewebsite' ?></title>
	<script src="<?= URL ?>/js/script.js"></script>
	<link rel="stylesheet" href="<?= URL ?>public/css/style.css">
</head>
<body>
<div class="navbar">
			<div class="nav-items">
				<ul class="nav-list">
					<li class="list-items"><a class="nav-links" href="<?=URL?>empty/index">HOME</a></li>
					<li class="list-items"><a class="nav-links" href="<?=URL?>empty/about">OVER</a></li>
					<li class="list-items"><a class="nav-links" href="<?=URL?>empty/overviewhorses">PAARDRIJDEN</a></li>
					<li class="list-items"><a class="nav-links" href="<?=URL?>empty/riders">ONZE RUITERS</a></li>
					<li class="list-items"><a class="nav-links" href="<?=URL?>empty/register">REGISTREREN</a></li>
					<li class="list-items"><a class="nav-links" href="<?=URL?>empty/contact">CONTACT</a></li>
				<?php 
					if($_SERVER["REQUEST_METHOD"] == "post"){
						echo '<li><a href="<?=URL?>empty/detailsreservation">MIJN RESERVERINGEN</a></li>'; 
					}

				?>
				</ul>
			</div>
		</div>

