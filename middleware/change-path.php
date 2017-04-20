<?php

	
	if(!isset($_POST['path'])){
		echo $_POST['path'] . "<br/>";
		echo "your input is wrong";
		return;
	}else{

		require('../module/PengolahBarang.php');

    	$myfile = fopen("../module/PATH.ME", "w") or die("Unable to open file!");
		fwrite($myfile, $_POST['path']);
		fclose($myfile);

		// Redirect to page
		echo "<script> window.location.href = '../settings.php' </script>";
	}
?>