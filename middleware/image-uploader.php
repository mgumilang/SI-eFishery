<?php 
	
    // cross-origin request, if needed
	// header("Access-Control-Allow-Origin: *");

	$file_name = $_FILES['file']['name'];
	$file_size =$_FILES['file']['size'];
	$file_tmp =$_FILES['file']['tmp_name'];
	$file_type=$_FILES['file']['type'];
	$file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
	
	$fname = md5(date(time())) . '.' . $file_ext;
	move_uploaded_file($file_tmp, "../public/" . $fname);

    // output data ke interface user pelaku
	echo json_encode(
		array(
			"error" => false,
			"data" => array(
				"link" => "/public/" . $fname
			)
		)
	);
?>
