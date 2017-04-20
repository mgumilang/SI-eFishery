<?php

	// Edit barang
	// Setelah edit akan di redirect ke halaman edit kembali dengan 
	// fokus pada barang yang sama.

	// URL PARAM
	// id 				-> ID barang INT
	// nama 			-> Nama barang STRING
	// jenis			-> Jenis barang INT
	// hasil 			-> Hasil pemeriksaan barang (lulus/ tidak lulus) STRING
	// tanggal_masuk	-> Tanggal barang masuk ke inventory DATE
	// status 			-> Status dari barang (Ada/ Tidak ada) INT (0/1)

	// Terdapat parameter yang kurang lengkap
	if(!isset($_POST['id']) || !isset($_POST['nama']) || 
	   !isset($_POST['jenis']) || !isset($_POST['hasil']) || 
	   !isset($_POST['tanggal_masuk']) || !isset($_POST['status']) || 
	   !isset($_POST['keterangan'])){

		echo $_POST['id'] . "<br/>";
		echo $_POST['nama'] . "<br/>";
		echo $_POST['jenis'] . "<br/>";
		echo $_POST['hasil'] . "<br/>";
		echo $_POST['tanggal_masuk'] . "<br/>";
		echo $_POST['status'] . "<br/>";
		echo $_POST['keterangan'] . "<br/>";
		echo "your input is wrong";
		return;
	}else{

		require_once('../dbconfig.php');
		global $HOST;
		global $NAME;
		global $USER;
		global $PASS;
		
		// Database credential
		$dbHost = $HOST;
		$dbName = $NAME;
		$dbUser = $USER;
		$dbPass = $PASS;

		// Include module
		require_once('../module/PengolahBarang.php');

		// Database helper instance
		$dbhelper = new DatabaseHelper($dbHost, $dbName, $dbUser, $dbPass);

		// Pengolah barang instance
		$pb = new PengolahBarang($dbhelper);

		// Doing update
		$pb->update($_POST['id'], $_POST['nama'], $_POST['status'], $_POST['tanggal_masuk'], $_POST['jenis'], $_POST['hasil'], $_POST['keterangan']);

		// Redirect to page
		echo "<script> window.location.href = '../edit.php?id=" . $_POST['id'] . "'; </script>";
	}
?>