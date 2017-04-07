<?php

	require_once('./DatabaseHelper.php');

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
			var_dump($hm->all());
		}
	}

	// test
	HistoryMaster::test();

?>
