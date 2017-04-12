<?php

	require_once('DatabaseHelper.php');

	class HistoryMaster{

		private $dbhelper;

		// in: credential basis data server
	    function __construct(DatabaseHelper $dbhelper){
	    	$this->dbhelper = $dbhelper;
	    }

	    public function all(){
	    	return $this->dbhelper->DoQuery("SELECT * FROM Barang;");
	    }

	    public function some($offset){
	    	$dataPengambilan = $this->dbhelper->DoQuery("SELECT Barang.Nama, Pengambilan.Tanggal, Pegawai.Nama AS PN, 'Pengambilan' AS Kode FROM Barang JOIN Pengambilan ON Barang.E_Pengambilan_ID = Pengambilan.ID JOIN Pegawai ON Pengambilan.E_Pegawai_ID = Pegawai.ID ORDER BY Pengambilan.Tanggal;");

	    	$dataQC = $this->dbhelper->DoQuery("SELECT Barang.Nama, Barang.R_diperiksa_Tanggal AS Tanggal, Pegawai.Nama AS PN, 'QC' AS Kode FROM Barang JOIN Pegawai ON Barang.E_Pegawai_ID = Pegawai.ID ORDER BY Tanggal_Masuk;");

	    	$out = array();

	    	foreach ($dataPengambilan->data as $value)
	    		array_push($out, $value);

	    	foreach ($dataQC->data as $value)
	    		array_push($out, $value);
	    	
	    	return $out;
	    }

		public static function test(){

			// Simple driver test
			$dbHost = "localhost";
			$dbName = "ef_manufacture";
			$dbUser = "root";
			$dbPass = "";

			// create instance
			$dbhelper = new DatabaseHelper($dbHost, $dbName, $dbUser, $dbPass);
			$hm = new HistoryMaster($dbhelper);

			// dump result
			echo json_encode($hm->some(2));
		}
	}

	// test
	// HistoryMaster::test();

?>
