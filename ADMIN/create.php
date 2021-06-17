<?php
   
   include "servers.php"

?>
<?php 
  session_start(); 

  if (!isset($_SESSION['user'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: loginadmin.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['user']);
  	header("location: loginadmin.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" 
        crossorigin="anonymous">
        <link rel="stylesheet" href="assets/mjanja.css">
    <title><?php echo $_SESSION['user']; ?>| create post </title>
</head>
<?php
   
   include "assets/header2.php"

?>



<p> Welcome <strong><?php echo $_SESSION['user']; ?></strong></p>
<p> <a class="btn btn-outline-dark" href="index.php?logout='1'" style="color: red;">logout</a> </p>
            
        
<a href="create.php" class="btn btn-outline-dark">+ create a new post</a>
<a href="addcategory.php" class="btn btn-outline-dark">categories</a>
<a href="index.php" class="btn btn-outline-dark">POSTS</a>

<body>

    <div class="container mt-5">


    <form method="POST"  enctype="multipart/form-data">
  
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
    <div>
    <p>select category</p>
                        <?php

                            $conn = new mysqli('localhost', 'root', '', 'mjanjamedia') 
                        or die ('Cannot connect to db');

                            $result = $conn->query("select  categoryname from categories");

                            
                            echo "<select name='categoryname'>";

                            while ($row = $result->fetch_assoc()) {

                                          unset( $name);
                                          
                                          $name = $row['categoryname']; 
                                          echo '<option value="'.$name.'">'.$name.'</option>';

                        }

                            echo "</select>";
                            
                        ?> 
       
     </div>
    
    <div> 
           <input type="text" name="title" placeholder="Blog title" class="form-control bg-dark text-white my-3 text-centre" required>
    </div>
    <div> 
           <textarea class="form-control btn-dark text-white my-3 text-centre"id="text" 
      	cols="40" 
      	rows="4" 
      	name="image_text" 
           placeholder="Content" 
           required></textarea>
    </div>
    <input type="hidden" name="author" value="<?php 
       
      if (isset($_SESSION['user'])) 
      echo $_SESSION['user'];
            ?>" readonly>
  	
  	<div>
  		<button class="btn btn-dark" type="submit" name="upload">ADD POST</button>
  	</div>
  </form>
    </div>


    <?php
   
   include "assets/footer.php"

?>
</body>
</html>