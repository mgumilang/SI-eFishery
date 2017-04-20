<?php

	// var_dump($_POST);

	// Add qc
	// Setelah menambah data qc halaman akan di redirect 
	// ke halaman qc baru kembali

	// URL PARAM
	// file 			-> Alamat file hasil qc STRING [LINK]
	// idpegawai		-> ID pegawai yang melakukan qc barang INT
	// idbarang			-> ID barang INT
	// hasil			-> Hasil qc STRING
	// keterangan		-> Keterangan qc STRING

	if(!isset($_POST['file']) || !isset($_POST['idpegawai'])
    || !isset($_POST['idbarang']) || !isset($_POST['hasil']) || !isset($_POST['keterangan'])){
		echo $_POST['file'] . "<br/>";
		echo $_POST['idpegawai'] . "<br/>";
		echo $_POST['idbarang'] . "<br/>";
		echo $_POST['hasil'] . "<br/>";
		echo $_POST['keterangan'] . "<br/>";
		echo "your input is wrong";
		return;
	}else{

		// Include module
		require_once('../module/PengolahBarang.php');

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
		$result = $pb->updateForQC($_POST['idbarang'], $_POST['idpegawai'], $_POST['file'], $_POST['hasil'], $_POST['keterangan']);

		// Check if error
		if(!$result->error){
			// Redirect
			echo "<script> window.location.href = '../new-qc.php'; </script>";
		}else{
			echo $result->data;
		}
	}
?>