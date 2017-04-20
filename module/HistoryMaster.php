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
	    	$dataPengambilan = $this->dbhelper->DoQuery("SELECT Barang.Nama, Date(Pengambilan.Tanggal) AS Tanggal, Pegawai.Nama AS PN, 'Pengambilan' AS Kode FROM Barang JOIN Pengambilan ON Barang.E_Pengambilan_ID = Pengambilan.ID JOIN Pegawai ON Pengambilan.E_Pegawai_ID = Pegawai.ID ORDER BY Pengambilan.Tanggal;");

	    	$dataQC = $this->dbhelper->DoQuery("SELECT Barang.Nama, Barang.R_diperiksa_Tanggal AS Tanggal, Pegawai.Nama AS PN, 'QC' AS Kode FROM Barang JOIN Pegawai ON Barang.E_Pegawai_ID = Pegawai.ID ORDER BY Tanggal_Masuk;");

	    	$out = array();

	    	foreach ($dataPengambilan->data as $value)
	    		array_push($out, $value);

	    	foreach ($dataQC->data as $value)
	    		array_push($out, $value);

	    	function date_compare($a, $b)
			{
			    $t1 = strtotime($a['Tanggal']);
			    $t2 = strtotime($b['Tanggal']);
			    return $t2 - $t1;
			}    
			usort($out, 'date_compare');
	    	
	    	return $out;
	    }

	    public function getWithParams($type, $nama, $tanggal, $pegawai){

	    	$out = array();

	    	if ($type == "pengambilan" || $type == "") {
	    		$params = "";
	    	
		    	if(strlen($nama) > 0)
		    		$params .= "Barang.Nama LIKE '$nama%'";
		    	
		    	if(strlen($tanggal) > 0)
		    		$params .= (strlen($params) > 0 ? " AND " : "") . "Tanggal LIKE '%$tanggal%'";

	    		if(strlen($pegawai) > 0)
	    			$params .= (strlen($params) > 0 ? " AND " : "") . "Pengambilan.E_Pegawai_ID = '$pegawai'";

		    	if(strlen($params) > 0)
	    			$dataPengambilan = $this->dbhelper->DoQuery("SELECT Barang.Nama, Date(Pengambilan.Tanggal) AS Tanggal, Pegawai.Nama AS PN, 'Pengambilan' AS Kode FROM Barang JOIN Pengambilan ON Barang.E_Pengambilan_ID = Pengambilan.ID JOIN Pegawai ON Pengambilan.E_Pegawai_ID = Pegawai.ID WHERE $params ORDER BY Pengambilan.Tanggal;");
	    		else
	    			$dataPengambilan = $this->dbhelper->DoQuery("SELECT Barang.Nama, Date(Pengambilan.Tanggal) AS Tanggal, Pegawai.Nama AS PN, 'Pengambilan' AS Kode FROM Barang JOIN Pengambilan ON Barang.E_Pengambilan_ID = Pengambilan.ID JOIN Pegawai ON Pengambilan.E_Pegawai_ID = Pegawai.ID ORDER BY Pengambilan.Tanggal;");

		    	foreach ($dataPengambilan->data as $value)
		    		array_push($out, $value);
	    	}
	    	if ($type == "qc" || $type == "") {
				$params = "";
	    	
		    	if(strlen($nama) > 0)
		    		$params .= "Barang.Nama LIKE '$nama%'";
		    	
		    	if(strlen($tanggal) > 0)
		    		$params .= (strlen($params) > 0 ? " AND " : "") . "R_diperiksa_Tanggal LIKE '%$tanggal%'";

				if(strlen($pegawai) > 0)
	    			$params .= (strlen($params) > 0 ? " AND " : "") . "Barang.E_Pegawai_ID = '$pegawai'";

	    		if(strlen($params) > 0)
	    			$dataQC = $this->dbhelper->DoQuery("SELECT Barang.Nama, Date(Barang.R_diperiksa_Tanggal) AS Tanggal, Pegawai.Nama AS PN, 'QC' AS Kode FROM Barang JOIN Pegawai ON Barang.E_Pegawai_ID = Pegawai.ID WHERE $params ORDER BY Tanggal_Masuk;");
	    		else
	    			$dataQC = $this->dbhelper->DoQuery("SELECT Barang.Nama, Date(Barang.R_diperiksa_Tanggal) AS Tanggal, Pegawai.Nama AS PN, 'QC' AS Kode FROM Barang JOIN Pegawai ON Barang.E_Pegawai_ID = Pegawai.ID ORDER BY Tanggal_Masuk;");
	    	
	    		foreach ($dataQC->data as $value)
	    			array_push($out, $value);
	    	}
	    	if (($type == "supply" || $type == "") && (strlen($pegawai) == 0)) {
	    		$params = "";
	    	
		    	if(strlen($nama) > 0)
		    		$params .= "Barang.Nama LIKE '$nama%'";
		    	
		    	if(strlen($tanggal) > 0)
		    		$params .= (strlen($params) > 0 ? " AND " : "") . "Tanggal_Masuk LIKE '%$tanggal%'";

	    		if(strlen($params) > 0)
	    			$dataSupply = $this->dbhelper->DoQuery("SELECT Nama, Date(Tanggal_Masuk) AS Tanggal, '-' AS PN, 'Supply' AS Kode FROM Barang WHERE $params ORDER BY Tanggal_Masuk;");
	    		else
	    			$dataSupply = $this->dbhelper->DoQuery("SELECT Nama, Date(Tanggal_Masuk) AS Tanggal, '-' AS PN, 'Supply' AS Kode FROM Barang ORDER BY Tanggal_Masuk;");
	    	
	    		foreach ($dataSupply->data as $value)
	    			array_push($out, $value);
	    	}

	    	function date_compare($a, $b)
			{
			    $t1 = strtotime($a['Tanggal']);
			    $t2 = strtotime($b['Tanggal']);
			    return $t2 - $t1;
			}    
			usort($out, 'date_compare');
	    	
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
