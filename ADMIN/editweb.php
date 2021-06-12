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
<?php
   
   include "assets/header2.php"

?>
<p> Welcome <strong><?php echo $_SESSION['user']; ?></strong></p>
<p> <a class="btn btn-outline-dark" href="index.php?logout='1'" style="color: red;">logout</a> </p>

<a href="create.php" class="btn btn-outline-dark">+ create a new post</a>
<a href="addcategory.php" class="btn btn-outline-dark">categories</a>
<a href="add.php" class="btn btn-outline-dark">+ add author</a>
<a href="index.php" class="btn btn-outline-dark">POSTS</a>
<a class="btn btn-dark" href="authors.php">AUTHORS</a>



<?php
require('servers.php');

$id=$_REQUEST['id'];
$query = "SELECT * from titles where id='".$id."'"; 
$result = mysqli_query($db, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
 
<table class="table" border="2">
  <tr>
    
    <td>web name</td>
    <td>email</td>
    <td>tagline</td>
    <td>about us</td>
    <td>facebook</td>
    <td>twitter</td>
    <td>edit</td>
    
  </tr>

<?php

include "servers.php"; // Using database connection file here

$records = mysqli_query($db, "select * from titles"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    
    <td><?php echo $data['web_name']; ?></td>
    <td><?php echo $data['email']; ?></td>
    <td><?php echo $data['tagline']; ?></td>
    <td><?php echo $data['about_us']; ?></td> 
    <td><?php echo $data['facebook']; ?></td>
    <td><?php echo $data['twitter']; ?></td> 
    
    <td><a class="btn btn-danger" href="editweb.php?id=1">edit</a></td>
    
  </tr>	
<?php
}
?>
</table>









<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{

$trn_date = date("Y-m-d H:i:s");
$web_name =$_REQUEST['web_name'];
$email =$_REQUEST['email'];
$tagline =$_REQUEST['tagline'];
$about_us =$_REQUEST['about_us'];
$facebook =$_REQUEST['facebook'];
$twitter =$_REQUEST['twitter'];

$update="update titles set 
web_name='".$web_name."', email='".$email."', tagline='".$tagline."', about_us='".$about_us."', facebook='".$facebook."', twitter='".$twitter." '
 where id='1'";
mysqli_query($db, $update) or die(mysqli_error($db));
$status = "Record Updated Successfully. </br></br>
<a href='editweb.php?id=1'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
    
<form class="updateform"  name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<label for="web_name"> web name</label><br>
<p><input type="text" name="web_name" placeholder="Enter web name" required value="<?php echo $row['web_name'];?>" /></p>
<label for="email"> email</label><br>
<p><input type="email" name="email" placeholder="Enter email" required value="<?php echo $row['email'];?>" /></p>
<label for="tagline"> tagline</label>
<p><input type="text" name="tagline" placeholder="Enter tagline" required value="<?php echo $row['tagline'];?>" /></p>
<label for="about us"> About Us</label>
<p><input    type="text" name="about_us"   value="<?php echo $row['about_us'];?>" ></p>
<label for="facebook"> facebook link</label>
<p><input    type="text" name="facebook"   value="<?php echo $row['facebook'];?>" ></p>
<label for="twitter"> twitter</label>
<p><input    type="text" name="twitter"   value="<?php echo $row['twitter'];?>" ></p>
<p><input class="btn btn-primary" name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>

<?php
   
   include "assets/footer.php"

?>




</body>
</html>