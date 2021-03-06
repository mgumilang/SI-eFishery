<?php

	require_once('DatabaseHelper.php');

	class PengolahBarang{

		private $dbhelper;

		// in: credential basis data server
	    function __construct(DatabaseHelper $dbhelper){
	    	$this->dbhelper = $dbhelper;
	    }

	    public function allJenisBarang(){
	    	return $this->dbhelper->DoQuery("SELECT * FROM Jenis;");
	    }

	    // update 11 April 2017 -> parameter $status dihapus,
	    // soalnya ketika insert status update pasti 0
	    // public function insert($nama, $status, $tanggal_masuk, $jenis){
	    public function insert($id, $nama, $jenis){
	    	date_default_timezone_set('Asia/Jakarta');
	    	$datex = date('Y-m-d');
	    	$insert_status = $this->dbhelper->DoQuery("INSERT INTO Barang(ID, Status, Nama, Tanggal_Masuk, E_Jenis_ID) VALUES ('$id', 'Ada', '$nama', '$datex', '$jenis');");
	    }

	    public function update($id, $nama, $status, $tanggal_masuk, $jenis, $hasil, $keterangan){
	    	return $this->dbhelper->DoQuery("UPDATE Barang SET Nama = '$nama', Status = '$status', Tanggal_Masuk = '$tanggal_masuk', E_Jenis_ID = '$jenis', R_diperiksa_Hasil = '$hasil', R_diperiksa_Keterangan = '$keterangan' WHERE ID = '$id';");
	    }

	    public function updateForQC($id, $idpegawai, $file, $hasil, $keterangan){
	    	date_default_timezone_set('Asia/Jakarta');
	    	$datex = date('Y-m-d');
	    	return $this->dbhelper->DoQuery("UPDATE Barang SET R_diperiksa_Data_QC = '$file', R_diperiksa_Keterangan = '$keterangan', E_Pegawai_ID = '$idpegawai', R_diperiksa_Hasil = '$hasil', R_diperiksa_Tanggal = '$datex' WHERE ID = '$id';");
	    }

	    public function delete($id){

	    }

	    public function createAndGetIDPengambilan($idPegawai){
	    	return $this->dbhelper->DoQuery("INSERT INTO Pengambilan(E_Pegawai_ID) VALUES('$idPegawai')");
	    }

	    public function setBarangKePengambilan($arrIDBarang, $IDPengambilan){
	    	$arr = array();
	    	foreach($arrIDBarang as $data)
	    		array_push($arr, "ID = " . $data);

	    	$queryCondition = implode(" OR ", $arr);

	    	var_dump($queryCondition);

	    	return $this->dbhelper->DoQuery("UPDATE Barang SET E_Pengambilan_ID = $IDPengambilan, Status = 'Tidak Ada' WHERE $queryCondition;");
	    }

	    public function all(){
	    	return $this->dbhelper->DoQuery("SELECT * FROM Barang;");
	    }

	    public function allWithParams($id, $nama, $tanggal, $status, $jenis){
	    	$params = "";
	    	
	    	if(strlen($id) > 0)
	    		$params .= "ID = '$id'";
	    	
	    	if(strlen($nama) > 0)
	    		$params .= (strlen($params) > 0 ? " AND " : "") . "Nama LIKE '$nama%'";
	    	
	    	if(strlen($tanggal) > 0)
	    		$params .= (strlen($params) > 0 ? " AND " : "") . "Tanggal_Masuk LIKE '%$tanggal%'";
	    	
	    	if(strlen($status) > 0)
	    		$params .= (strlen($params) > 0 ? " AND " : "") . "Status = '$status'";
	    	
	    	if(strlen($jenis) > 0)
	    		$params .= (strlen($params) > 0 ? " AND " : "") . "E_Jenis_ID = '$jenis'";

			if(strlen($params) > 0)
	    		return $this->dbhelper->DoQuery("SELECT * FROM Barang WHERE $params;");

	    	return $this->dbhelper->DoQuery("SELECT * FROM Barang;");
	    }

	    public function allQCWithParams($id, $hasil, $tanggal, $idpegawai){
	    	$q = "SELECT 
		    		Barang.R_diperiksa_Tanggal AS Tanggal_QC, 
		    		Barang.ID AS ID_Barang, 
		    		Barang.R_diperiksa_Hasil AS Hasil_QC, 
		    		Pegawai.Nama AS Pemeriksa, 
		    		Barang.R_diperiksa_Data_QC AS File_QC, 
		    		Barang.R_diperiksa_Keterangan AS Keterangan 
	    		  FROM Barang 
	    		  JOIN Pegawai 
	    		  ON Barang.E_Pegawai_ID = Pegawai.ID";

	    	$params = "";
	    	
	    	if(strlen($id) > 0)
	    		$params .= "Barang.ID = '$id'";
	    	
	    	if(strlen($hasil) > 0)
	    		$params .= (strlen($params) > 0 ? " AND " : "") . "Barang.R_diperiksa_Hasil = '$hasil'";
	    	
	    	if(strlen($tanggal) > 0)
	    		$params .= (strlen($params) > 0 ? " AND " : "") . "Barang.R_diperiksa_Tanggal LIKE '%$tanggal%'";
	    	
	    	if(strlen($idpegawai) > 0)
	    		$params .= (strlen($params) > 0 ? " AND " : "") . "Barang.E_Pegawai_ID = '$idpegawai'";
	    	
			if(strlen($params) > 0)
	    		return $this->dbhelper->DoQuery($q . " WHERE $params;");

	    	return $this->dbhelper->DoQuery($q);
	    }

	    public function allPengambilanWithParams($id, $tanggal, $id_pegawai){
	    	$q = "SELECT 
	    			Pengambilan.Tanggal AS Tanggal_Pengambilan, 
	    			Barang.ID AS ID_Barang, 
	    			Pegawai.Nama as Nama_Pegawai 
	    		  FROM Barang 
	    		  JOIN Pengambilan 
	    		  ON Barang.E_Pengambilan_ID = Pengambilan.ID 
	    		  JOIN Pegawai 
	    		  ON Pengambilan.E_Pegawai_ID = Pegawai.ID";

	    	$params = "";
	    	
	    	if(strlen($id) > 0)
	    		$params .= "Barang.ID = '$id'";
	    	
	    	if(strlen($tanggal) > 0)
	    		$params .= (strlen($params) > 0 ? " AND " : "") . "Pengambilan.Tanggal LIKE '%$tanggal%'";
	    	
	    	if(strlen($id_pegawai) > 0)
	    		$params .= (strlen($params) > 0 ? " AND " : "") . "Pengambilan.E_Pegawai_ID = '$id_pegawai'";
	    	
	    	// echo $q . " WHERE $params;";

			if(strlen($params) > 0)
	    		return $this->dbhelper->DoQuery($q . " WHERE $params;");

	    	return $this->dbhelper->DoQuery($q);
	    }

	    public function some($offset){

	    }

	    public function one_id($id){
	    	return $this->dbhelper->DoQuery("SELECT Barang.*, Jenis.Nama AS Jenis FROM Barang JOIN Jenis ON E_Jenis_ID = Jenis.ID WHERE Barang.ID = '$id';");
	    }

	    public function one_name($nama){

	    }

	    public static function getPath(){
			$myfile = fopen("PATH.ME", "r") or die("Unable to open file!");
			$path = fgets($myfile);
			fclose($myfile);

			return $path;
	    }

		public static function test(){

			// Simple driver test
			$dbHost = "localhost";
			$dbName = "ef_manufacture";
			$dbUser = "root";
			$dbPass = "";

			// create instance
			$dbhelper = new DatabaseHelper($dbHost, $dbName, $dbUser, $dbPass);
			$pb = new PengolahBarang($dbhelper);

			// // dump result
			// var_dump($pb->all());

			$pb->changeQCPath("notpublic");
			echo PengolahBarang::getPath();
		}
	}

	// test
	// PengolahBarang::test();

?>
