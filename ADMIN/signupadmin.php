<?php include('loginserver.php') ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Registration system PHP and MySQL</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" 
        crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="assets/login.css">
</head>
<body>

  <form method="post" action="signupadmin.php" class="container" >
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
  	
  	  <button type="submit" class="btn btn-dark" name="reg_user">Create account</button>
  	
</div>
  	<p class="account">
  		Already have an account? <a href="login.php">log in</a>
  	</p>
  </form>
</body>
</html>