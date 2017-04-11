<?php

	// Find supply
	// Mengambil data dari sebuah supply/ barang 
	// berdasarkan id barang

	// ASUMSI: parameter selalu ada dan valid
	// NOTE: belum ada handler ketika parameter kosong

	// URL PARAM
	// id 				-> ID barang INT

	if(isset($_GET['id_barang'])){

		// Include module
		require_once('../module/PengolahBarang.php');

		// Database credential
		$dbHost = "localhost";
		$dbName = "ef_manufacture";
		$dbUser = "root";
		$dbPass = "";

		// Database helper instance
		$dbhelper = new DatabaseHelper($dbHost, $dbName, $dbUser, $dbPass);

		// Pengolah barang instance
		$pb = new PengolahBarang($dbhelper);

		// Getting data
		$res = $pb->one_id($_GET['id_barang']);

		// If data is exist
		if(sizeof($res->data) > 0)
			echo json_encode($res->data[0]);
		else
			echo "";
	}
?>