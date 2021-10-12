<?php
if (($_FILES['my_file']['name']!="")){
// Where the file is going to be stored
	$target_dir = "archivos/";
	$file = $_FILES['my_file']['name'];
	$path = pathinfo($file);
	$filename = $path['filename'];
	$ext = $path['extension'];
	$temp_name = $_FILES['my_file']['tmp_name'];
	$path_filename_ext = $target_dir.$filename.".".$ext;
 
// Check if file already exists
if (file_exists($path_filename_ext)) {
 echo "Sorry, file already exists.";
 }else{
 move_uploaded_file($temp_name,$path_filename_ext);
 
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<br /><br />
<form name="form" method="post" enctype="multipart/form-data" >
<input type="file" name="my_file" /><br /><br />
<input type="submit" name="guardar" value="Upload"/>
</form>
<br /><br />
    
</body>
</html>