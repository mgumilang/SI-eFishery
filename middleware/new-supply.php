<?php

	// Add supply/ barang
	// Setelah menambah supply baru halaman akan di redirect 
	// ke halaman supply baru kembali

	// URL PARAM
	// allnama 			-> Nama barang STRING (serialized STRING - separator ',')
	// alljenis			-> Jenis barang STRING (serialized INT - separator ',')
	// alltanggal		-> Tanggal barang di-supply STRING (serialized DATE - separator ',')

	if(!isset($_POST['alltanggal']) || !isset($_POST['allnama']) || !isset($_POST['alljenis'])){
		echo $_POST['allnama'] . "<br/>";
		echo $_POST['alljenis'] . "<br/>";
		echo $_POST['alltanggal'] . "<br/>";
		echo "your input is wrong";
		return;
	}else{

		// Include module
		require_once('../module/PengolahBarang.php');

		// Exploding/ unserialized STRING to its type
		$datatanggal = explode(",", $_POST['alltanggal']);
		$datanama = explode(",", $_POST['allnama']);
		$datajenis = explode(",", $_POST['alljenis']);

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

		// Database helper instance
		$dbhelper = new DatabaseHelper($dbHost, $dbName, $dbUser, $dbPass);

		// Pengolah barang instance
		$pb = new PengolahBarang($dbhelper);

		// Get size of data to be add
		$len = sizeof($datatanggal);

		// Insert data
		for($i = 0; $i < $len; $i++)
			$pb->insert($datanama[$i], $datatanggal[$i], $datajenis[$i]);

		// redirect
		echo "<script> window.location.href = '../new-supply.php'; </script>";
	}
?>