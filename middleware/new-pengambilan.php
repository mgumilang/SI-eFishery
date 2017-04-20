<?php

	// Add pengambilan
	// Setelah menambah data pengambilan halaman akan di redirect 
	// ke halaman pengambilan baru kembali

	// URL PARAM
	// allid 			-> IDs barang STRING (serialized INT - separator ',')
	// id_pegawai		-> ID pegawai yang melakukan pengambilan barang INT

	if(!isset($_POST['allid']) || !isset($_POST['id_pegawai'])){
		echo $_POST['allid'] . "<br/>";
		echo $_POST['id_pegawai'] . "<br/>";
		echo "your input is wrong";
		return;
	}else{

		// Include module
		require_once('../module/PengolahBarang.php');

		// Exploding/ unserialized STRING to array of INT
		$dataid = explode(",", $_POST['allid']);

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

		// Create record to table Pengambilan to get Pengambilan's id
		$result = $pb->createAndGetIDPengambilan($_POST['id_pegawai']);

		// Check if error
		if(!$result->error){

			// Update Barang record
			$result2 = $pb->setBarangKePengambilan($dataid, $result->last_id);

			// Check if error
			if(!$result2->error)

				// Redirect
				echo "<script> window.location.href = '../new-pengambilan.php'; </script>";
			else
				echo $result2->data;
		}else{
			echo $result->data;
		}
	}
?>