<?php 
	if($data['connection']){
		echo '<h1>HET WERK!</h1>';
		echo '<img src="<?= URL; ?>/images/done.png" style="width: 100%">';
	}else{
		echo '<h1>DB CONNECTION FAILED!</h1>';
	}