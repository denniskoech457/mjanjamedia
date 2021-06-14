<?php
  // Create database connection
  
  $db = mysqli_connect("localhost", "root", "", "mjanjamedia");

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
	$categoryname = $_POST["categoryname"];

    // image file directory
    $target = ".././images/".basename($image);
	
  	$sql = "INSERT INTO images (image, image_text, title, author, categoryname) VALUES ('$image', '$image_text', '$title', '$author', '$categoryname')";
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
  
 






?>