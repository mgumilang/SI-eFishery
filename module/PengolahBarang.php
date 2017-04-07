<?php

	require_once('./DatabaseHelper.php');

	class PengolahBarang{

		private $dbhelper;

		// in: credential basis data server
	    function __construct(DatabaseHelper $dbhelper){
	    	$this->dbhelper = $dbhelper;
	    }

	    public function insert($nama, $status, $tanggal_masuk, $jenis){

	    }

	    public function update($id, $nama, $status, $tanggal_masuk, $jenis){

	    }

	    public function delete($id){

	    }

	    public function all(){
	    	return $this->dbhelper->DoQuery("SELECT * FROM Barang;");
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
	PengolahBarang::test();

?>
