<?php

	class DatabaseHelper{

		private $servername;
		private $username;
		private $password;
		private $dbname;

		// in: credential basis data server
	    function __construct($serverName, $databaseName, $username, $password){
	    	$this->servername 	= $serverName;
	        $this->dbname 		= $databaseName;
	        $this->username 	= $username;
	        $this->password 	= $password;
	    }

		// in: query basis data yang ingin dieksekusi
		// proses:	1. Buka koneksi ke basis data
		//			2. Periksa koneksi, 
		//			   jika gagal maka selesai, mengembalikan objek array {error: true, data: $conn->connect_error}
		//			3. Melakukan eksekusi query ke basis data
		//			4. Periksa error eksekusi basis data
		//			   jika terjadi kesalahan maka mengembalikan pesan error
		//			5. Menutup koneksi basis data
		//			6. Mengembalikan data hasil eksekusi query pada basis data, dengan format:
		// out:	{
		//		error: true|false,
		//		data: <hasil eksekusi query>
		// }
		public function DoQuery($query){

			// Create connection
			$conn = new mysqli(
						$this->servername, 
						$this->username, 
						$this->password, 
						$this->dbname
					);

			// Check connection
			// ERROR: Gagal melakukan koneksi ke database
			if ($conn->connect_error)
			    return (object)array(
			    	'error' => true, 
			    	'data' => $conn->connect_error
			    );
			
			// Request query
			$hasil = $conn->query($query);

			// Iniatializing error message variable
			$errorDB = "";

			// If query error, get the error message
			if(!$hasil)
				$errorDB = $conn->error;

			$last_id = isset($conn->insert_id) ? $conn->insert_id : NULL;
			// Close connection
			$conn->close();

			// If query succes return result
			// ERROR: Gagal melakukan query pada databse
			if($hasil){

				// init temporary variable
				$arrResult = array();

				if(isset($hasil->num_rows))
					if($hasil->num_rows > 0)

						// getting query result to 
						// temporary reuslt variable
						while($row = $hasil->fetch_assoc())
							array_push($arrResult, $row);

				// return result to caller
			    return (object)array(
			    	'error' => false,
			    	'data' => $arrResult,
			    	'last_id' => $last_id
			    );
			}

			// Else return error message
		    return (object)array(
		    	'error' => true,
		    	'data' => $errorDB,
		    	'last_id' => NULL
		    );
		}

		public static function test(){

			// Simple driver test
			$dbHost = "localhost";
			$dbName = "ef_manufacture";
			$dbUser = "root";
			$dbPass = "";
			$sampleQuery = "SELECT * FROM Alat WHERE id = 88;";

			// create instance
			$dbhelper = new DatabaseHelper($dbHost, $dbName, $dbUser, $dbPass);

			// do some query and get result
			$queryResult = $dbhelper->DoQuery($sampleQuery);

			// dump result
			var_dump($queryResult);
		}
	}

	// test
	// DatabaseHelper::test();

?>
