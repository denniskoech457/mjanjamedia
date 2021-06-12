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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" 
        crossorigin="anonymous">
    <link rel="stylesheet" href="assets/mjanja.css">
    <script src="https://kit.fontawesome.com/9ad9a54963.js"
            crossorigin="anonymous"></script>
    <title>Registered Authors</title>
</head>
<body>

<?php
   
   include "assets/header2.php"

?>
<p> Welcome <strong><?php echo $_SESSION['user']; ?></strong></p>
<p> <a class="btn btn-outline-dark" href="index.php?logout='1'" style="color: red;">logout</a> </p>
            
<a href="add.php" class="btn btn-outline-dark">+ add author</a>
<a href="create.php" class="btn btn-outline-dark">+ create a new post</a>
<a href="index.php" class="btn btn-outline-dark">POSTS</a>
<a class="btn btn-dark" href="editweb.php?id=1">Website information</a>





<div class="stylecontent">
<h1>Registered Authors</h1>
<div class="scheduled">
<table class="table" border="2">
  <tr>
    
    <td>User Name</td>
    <td>Email</td>
    <td>Password</td>
    <td>phone number</td>
    <td>Edit</td>
    <td>Delete</td>
  </tr>

<?php

// connect to the database
include_once "servers.php";

$records = mysqli_query($db, "select * from author"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    
    <td><?php echo $data['username']; ?></td>
    <td><?php echo $data['email']; ?></td>
    <td><?php echo $data ['password']; ?></td> 
    <td><?php echo $data['phone_number']; ?></td>  
    <td><a class="btn btn-primary" href="edit.php?id=<?php echo $data['id']; ?>">Edit</a></td>
    <td><a class="btn btn-danger" href="deleteuser.php?id=<?php echo $data['id']; ?>">Delete</a></td>
  </tr>	
<?php
}
?>
</table>

    </div>
</div>
 
<?php
   
   include "assets/footer.php"

?>  
</body>
</html>

