<?php
   
   include "servers.php"
  
?>
<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!-- notification message -->
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

    <!-- logged in user information -->
<!DOCTYPE html>
<html>
<head>
<title>Author <?php echo $_SESSION['username']; ?></title>
<link rel="stylesheet"  href="assets/mjanja.css">

</head>
<body>
<?php
   
   include "assets/header2.php"

?>
<div class="text-centre">

<p> Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
<p><a href="../BLOG/index.php" class="btn btn-outline-dark" >view blog</a></p>
<p> <a class="btn btn-outline-dark" href="index.php?logout='1'" style="color: red;">logout</a> </p>

<a href="create.php" class="btn btn-outline-dark">+ create a new post</a>
<a href="index.php" class="btn btn-outline-dark">POSTS</a>
<a href="myprofile.php" class="btn btn-outline-dark">profile</a>




<div id="content">

<?php if (isset($_SESSION['sent'])) : ?>
<div class="successful" >
<h3>
  <?php 
          	echo $_SESSION['sent']; 
          	unset($_SESSION['sent']);
          ?></h3>
</div>
<?php endif ?>
 
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
$username =   $_SESSION['username']; 
$records = mysqli_query($db, "select * from images WHERE `author`='$username' ORDER BY id  "); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    
    <td><?php echo "<img src='../images/".$data['image']."' >"; ?></td>
    <td><?php echo $data['title']; ?></td>
    <td><?php echo $data['image_text']; ?></td> 
    <td><a class="btn btn-primary" href="edit.php?id=<?php echo $data['id']; ?>">edit</a></td> 
    <td><a class="btn btn-danger" href="delete.php?id=<?php echo $data['id']; ?>">Delete</a></td>

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