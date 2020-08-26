<?php 
include 'db.php';
session_start(); 
// Count total files
$countfiles = count($_FILES['files']['name']);
$FileSize   = $_FILES['files']["size"];
// Upload directory
$upload_location = "images/uploard/";

// To store uploaded files path
$files_arr = array();
$errors = array(); 
$_SESSION['success'] = "";
$returnText = "";


// Loop all files
for($index = 0;$index < $countfiles;$index++){

	// File name
	$filename = $_FILES['files']['name'][$index];
	
	// Get extension
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    // Valid image extension
    $valid_ext = array("png","jpeg","jpg");

    // Check extension
    if(in_array($ext, $valid_ext)){
		$newfilename = round(microtime(true)).$index . '.' .$ext;
    	// File path
    	$path = $upload_location.$newfilename;

        // Upload file
		if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
			$files_arr[] = $path;
			$_SESSION['success'] ="set file size";
		}else {
			$returnText = "Sorry, there was an error uploading your file.";
			array_push($errors, "Sorry, there was an error uploading your file. "); 
		}
    } else {

		array_push($errors, " Sorry File Extension is invalid! you can use only jpg, jpeg or PNG"); 
	}
			   	
}



echo json_encode($files_arr);
die;