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
<?php include('regserver.php') ?>
<!DOCTYPE html>
<html>

<?php include('assets/header2.php') ?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Author Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" 
        crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="assets/login.css">
</head>
	<p> Welcome back admin <strong><?php echo $_SESSION['user']; ?></strong></p>
    <p> <a class="btn btn-outline-dark" href="index.php?logout='1'" style="color: red;">logout</a> </p>
                
    <a href="add.php" class="btn btn-outline-dark">+ add author</a>
    <a href="index.php" class="btn btn-outline-dark">POSTS</a>
    <a class="btn btn-dark" href="authors.php">AUTHORS</a>
    <a class="btn btn-dark" href="editweb.php?id=1">Website information</a>

  <form method="post" action="add.php" class="container" >
  	<?php  include('errors.php'); ?>
		<div class="register">

			<h1>Sign up</h1><br>
			
			<label ><b>Username</b></label><br>
			<input placeholder="enter username" type="text" name="username" value="<?php echo $username; ?>"><br>
			
			
			<label><b >Email</b></label><br>
			<input placeholder="Enter email" type="email" name="email" value="<?php echo $email; ?>"><br>
			
			<label><b>Password</b></label><br>
			<input placeholder="Enter Password" type="password" name="password_1"><br>
			
			<label><b>Confirm password</b></label><br>
			<input placeholder="Enter Password" type="password" name="password_2"><br><br>
			
			<button type="submit" class="btn btn-dark" name="reg_user">ADD AUTHOR</button>
			
		</div>
  	
  </form>
<?php 
include('assets/footer.php') 
?>