<?php 

	require("../module/PengolahBarang.php");
	
    // cross-origin request, if needed
	// header("Access-Control-Allow-Origin: *");

	$file_name = $_FILES['file']['name'];
	$file_size =$_FILES['file']['size'];
	$file_tmp =$_FILES['file']['tmp_name'];
	$file_type=$_FILES['file']['type'];
	$file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
	
	$myfile = fopen("../module/PATH.ME", "r") or die("Unable to open file!");
	$path = fgets($myfile);
	fclose($myfile);

	$fname = md5(date(time())) . '.' . $file_ext;
	if (!is_dir("../$path/") && !mkdir("../$path/")){
		die("Error creating folder $uploaddir");
	}
	move_uploaded_file($file_tmp, "../$path/" . $fname);

    // output data ke interface user pelaku
	echo json_encode(
		array(
			"error" => false,
			"data" => array(
				"link" => $path . "/" . $fname
			)
		)
	);
?>
