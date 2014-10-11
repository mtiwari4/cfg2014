<?php
function createThumbs( $pathToImages, $pathToThumbs, $thumbWidth ,$fname)
{
	// open the directory
	//$dir = opendir( $pathToImages );

	// loop through it, looking for any/all JPG files:
	//while (false !== ($fname = readdir( $dir ))) {
		// parse path for the extension
		$info = pathinfo($pathToImages . $fname);
		// continue only if this is a JPEG image
		if ( strtolower($info['extension']) == 'jpg' )
		{
			echo "Creating thumbnail for {$fname} <br />";

			// load image and get image size
			$img = imagecreatefromjpeg( "{$pathToImages}{$fname}" );
			$width = imagesx( $img );
			$height = imagesy( $img );

			// calculate thumbnail size
			$new_width = $thumbWidth;
			$new_height = floor( $height * ( $thumbWidth / $width ) );

			// create a new temporary image
			$tmp_img = imagecreatetruecolor( $new_width, $new_height );

			// copy and resize old image into new image
			imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

			// save thumbnail into a file
			imagejpeg( $tmp_img, "{$pathToThumbs}{$fname}" );
		}
		
}
if(isset($_FILES["FileInput"]) && $_FILES["FileInput"]["error"]== UPLOAD_ERR_OK)
{
	// ../csci566/upload/thumbs/1136297215.jpg 
	############ Edit settings ##############
	$UploadDirectory	= ' ../csci566/upload/thumbs/'; //specify upload directory ends with / (slash)
	##########################################
	
	/*
	Note : You will run into errors or blank page if "memory_limit" or "upload_max_filesize" is set to low in "php.ini". 
	Open "php.ini" file, and search for "memory_limit" or "upload_max_filesize" limit 
	and set them adequately, also check "post_max_size".
	*/
	
	//check if this is an ajax request
	if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
		die();
	}
	
	
	//Is file size is less than allowed size.
	if ($_FILES["FileInput"]["size"] > 5242880) {
		die("File size is too big!");
	}
	
	//allowed file type Server side check
	switch(strtolower($_FILES['FileInput']['type']))
		{
			//allowed file types
            case 'image/png': 
			case 'image/gif': 
			case 'image/jpeg': 
			case 'image/pjpeg':
			case 'text/plain':
			case 'text/html': //html file
			case 'application/x-zip-compressed':
			case 'application/pdf':
			case 'application/msword':
			case 'application/vnd.ms-excel':
			case 'video/mp4':
				break;
			default:
				die('Unsupported File!'); //output error
	}
	
	$File_Name          = strtolower($_FILES['	']['name']);
	$File_Ext           = substr($File_Name, strrpos($File_Name, '.')); //get file extention
	$Random_Number      = rand(0, 9999999999); //Random number to be added to name.
	$NewFileName 		= $Random_Number.$File_Ext; //new file name
	echo $_FILES['FileInput']['tmp_name'];
	echo $UploadDirectory.$NewFileName;
	if(move_uploaded_file($_FILES['FileInput']['tmp_name'], $UploadDirectory.$NewFileName ))
	   {
	   $teamId  = isset($_POST["adminTeamImgSelect"]) ? mysql_real_escape_string($_POST['adminTeamImgSelect']) : '';
	 //path =   $UploadDirectory . $NewFileName
	      // Create connection
	   $con=mysqli_connect("students","z1727212","19890120","z1727212");
	   
	   // Check connection
	   if (mysqli_connect_errno())
	   {
	   	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	   }
	
	   $result = mysqli_query($con,"update z1727212.Team set teamImagePath=\"upload/$NewFileName\"  where Team_ID='$teamId' ;");
	   
	   createThumbs("../upload/","../upload/thumbs/",100,$NewFileName);
	   $result = mysqli_query($con,"update z1727212.Team set teamThumbnailPath=\"upload/thumbs/$NewFileName\"  where Team_ID='$teamId' ;");
	   
		die('Success! File Uploaded.');
	}else{
		die('error uploading File!');
	}
	
}
else
{
	die('Something wrong with upload! Is "upload_max_filesize" set correctly?');
}