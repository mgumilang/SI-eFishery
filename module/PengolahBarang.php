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
	    public function insert($nama, $tanggal_masuk, $jenis){
	    	$insert_status = $this->dbhelper->DoQuery("INSERT INTO Barang(Status, Nama, Tanggal_Masuk, E_Jenis_ID) VALUES ('0', '$nama', '$tanggal_masuk', '$jenis');");
	    }

	    public function update($id, $nama, $status, $tanggal_masuk, $jenis){

	    }

	    public function delete($id){

	    }

	    public function all(){
	    	return $this->dbhelper->DoQuery("SELECT * FROM Barang;");
	    }

	    public function allWithParams($id, $nama, $tanggal, $status, $jenis){
	    	$params = "";
	    	
	    	if(strlen($id) > 0)
	    		$params .= "ID = '$id'";
	    	
	    	if(strlen($nama) > 0)
	    		$params .= (strlen($params) > 0 ? " AND " : "") . "Nama = '$nama'";
	    	
	    	if(strlen($tanggal) > 0)
	    		$params .= (strlen($params) > 0 ? " AND " : "") . "Tanggal_Masuk = '$tanggal'";
	    	
	    	if(strlen($status) > 0)
	    		$params .= (strlen($params) > 0 ? " AND " : "") . "Status = '$status'";
	    	
	    	if(strlen($jenis) > 0)
	    		$params .= (strlen($params) > 0 ? " AND " : "") . "E_Jenis_ID = '$jenis'";

	    	return $this->dbhelper->DoQuery("SELECT * FROM Barang WHERE $params;");
	    }

	    public function some($offset){

	    }

	    public function one_id($id){
	    	
	    }

	    public function one_name($nama){

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

			// dump result
			var_dump($pb->all());
		}
	}

	// test
	// PengolahBarang::test();

?>
