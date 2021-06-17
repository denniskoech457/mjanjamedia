<?php
   
   include "serversadmin.php"

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
    
</head>
<?php
   
   include "admin/assets/header.php"

?>



<p> Welcome back admin <strong><?php echo $_SESSION['user']; ?></strong></p>
<p> <a class="btn btn-outline-dark" href="admin/index.php?logout='1'" style="color: red;">logout</a> </p>
            
<a href="admin/add.php" class="btn btn-outline-dark">+ add author</a>
<a href="admin/index.php" class="btn btn-outline-dark">POSTS</a>
<a class="btn btn-dark" href="admin/authors.php">AUTHORS</a>
<a class="btn btn-dark" href="admin/editweb.php?id=1">Website information</a>


<body>

    <div class="container mt-5">


    <form method="POST"  enctype="multipart/form-data">
  <?php if (isset($_SESSION['sent'])) : ?>
<div class="successful" >
<h3>
  <?php 
          	echo $_SESSION['sent']; 
          	unset($_SESSION['sent']);
          ?></h3>
</div>
<?php endif ?>
  	<input type="hidden" name="size" value="1000000">
  	<div>
      <label for="image ">Image</label>
  	  <input type="file" name="image">
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
       
      if (isset($_SESSION['username'])) 
      echo $_SESSION['username'];
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