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
<html>
<head>

<link rel="stylesheet"  href="assets/mjanja.css">

</head>
<body>
<?php
   
   include "assets/header2.php"

?>
<div class="text-centre">
<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

<p> Welcome <strong><?php echo $_SESSION['user']; ?></strong></p>
<p> <a class="btn btn-outline-dark" href="index.php?logout='1'" style="color: red;">logout</a> </p>

<a href="create.php" class="btn btn-outline-dark">+ create a new post</a>
<a href="add.php" class="btn btn-outline-dark">+ add author</a>
<a href="addcategory.php" class="btn btn-outline-dark">categories</a>
<a class="btn btn-dark" href="authors.php">AUTHORS</a>
<a class="btn btn-dark" href="editweb.php?id=1">Website information</a>


<div id="content">


 
 <table class="table" border="2">
  <tr>
    
    <td>image</td>
    <td>title</td>
    <td>content</td>
    <td>edit</td>
    <td>Delete</td>
  </tr>

<?php

include "servers.php"; // Using database connection file here

$records = mysqli_query($db, "select * from images"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    
    <td><?php echo "<img src='/mjanjamedia/test/images/".$data['image']."' >"; ?></td>
    <td><?php echo $data['title']; ?></td>
    <td><?php echo $data['image_text']; ?></td> 
    <td><a class="btn btn-primary" href="editpost.php?id=<?php echo $data['id']; ?>">edit</a></td> 
    <td><a class="btn btn-danger" href="deletepost.php?id=<?php echo $data['id']; ?>">Delete</a></td>

  </tr>	
<?php
}
?>
</table>





</div>

<?php
   
   include "assets/footer.php"

?>


</body>
</html>