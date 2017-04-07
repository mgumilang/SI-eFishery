<?php

	require_once('./DatabaseHelper.php');

	class PengolahPegawai{

		private $dbhelper;

		// in: credential basis data server
	    function __construct(DatabaseHelper $dbhelper){
	    	$this->dbhelper = $dbhelper;
	    }

	    public function insert($nama){

	    }

	    public function update($id, $nama){

	    }

	    public function delete($id){

	    }

	    public function all(){
	    	return $this->dbhelper->DoQuery("SELECT * FROM Pegawai;");
	    }

	    public function some($offset){

	    }

	    public function one_id($id){
	    	
	    }

	    public function one_name($nama){

	    }

	    public function periksaBarang($id_barang, $hasil, $keterangan, $alamat_file_qc){

	    }

	    public function ambilBarang($array_id_barang){

	    }

		public static function test(){

			// Simple driver test
			$dbHost = "localhost";
			$dbName = "ef_manufacture";
			$dbUser = "root";
			$dbPass = "";

			// create instance
			$dbhelper = new DatabaseHelper($dbHost, $dbName, $dbUser, $dbPass);
			$pp = new PengolahPegawai($dbhelper);

			// dump result
			var_dump($pp->all());
		}
	}

	// test
	PengolahPegawai::test();

?>
