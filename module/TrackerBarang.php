<?php

	require_once('./DatabaseHelper.php');

	class TrackerBarang{

		private $dbhelper;

		// in: credential basis data server
	    function __construct(DatabaseHelper $dbhelper){
	    	$this->dbhelper = $dbhelper;
	    }

	    public function allPemeriksaan(){

	    }

	    public function somePemeriksaan($offset){

	    }

	    public function somePemeriksaanByDateIdPegawai($date, $id_pegawai, $offset){

	    }

	    public function allPengambilan(){
	    	return $this->dbhelper->DoQuery("SELECT * FROM Pengambilan;");
	    }

	    public function somePengambilan($offset){

	    }

	    public function somePengambilanByDateIdPegawai($date, $id_pegawai, $offset){

	    }

		public static function test(){

			// Simple driver test
			$dbHost = "localhost";
			$dbName = "ef_manufacture";
			$dbUser = "root";
			$dbPass = "";

			// create instance
			$dbhelper = new DatabaseHelper($dbHost, $dbName, $dbUser, $dbPass);
			$tb = new TrackerBarang($dbhelper);

			// dump result
			var_dump($tb->allPengambilan());
		}
	}

	// test
	TrackerBarang::test();

?>
