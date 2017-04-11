<?php

	if(!isset($_POST['alltanggal']) || !isset($_POST['allnama']) || !isset($_POST['alljenis'])){
		echo $_POST['allnama'] . "<br/>";
		echo $_POST['alljenis'] . "<br/>";
		echo $_POST['alltanggal'] . "<br/>";
		echo "your input is wrong";
		return;
	}else{

		require_once('../module/PengolahBarang.php');

		$datatanggal = explode(",", $_POST['alltanggal']);
		$datanama = explode(",", $_POST['allnama']);
		$datajenis = explode(",", $_POST['alljenis']);

		// Simple driver test
		$dbHost = "localhost";
		$dbName = "ef_manufacture";
		$dbUser = "root";
		$dbPass = "";

		// create instance
		$dbhelper = new DatabaseHelper($dbHost, $dbName, $dbUser, $dbPass);
		$pb = new PengolahBarang($dbhelper);

		$len = sizeof($datatanggal);
		for($i = 0; $i < $len; $i++)
			$pb->insert($datanama[$i], $datatanggal[$i], $datajenis[$i]);

		echo "<script> window.location.href = '../new-supply.php'; </script>";
	}
?>