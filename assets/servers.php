<?php
  // Create database connection
  require('dbcon.php');

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload']) & isset($_POST['title'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_POST['image_text']);
    $title = $_POST["title"];
	$author = $_POST["author"];

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO images (image, image_text, title, author) VALUES ('$image', '$image_text', '$title', '$author')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
	  $res = mysqli_query($db, $sql);

	 


	  if ($res){
		$_SESSION['sent'] = "post added successfuly";
	   header ("location:index.php");
		
	}
	else {
		echo "Post Not Successfull!!";
	}




  }
  $result = mysqli_query($db, "SELECT * FROM images");
  
 






?>