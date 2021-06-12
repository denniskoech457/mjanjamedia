<?php include('loginserver.php') ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" 
        crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="assets/login.css">
</head>
<body>
  
	 
  <form method="post" action="loginadmin.php" class="container">
        <?php include('errors.php'); ?>
        <h1>Log in</h1><br><br>
        <div class="login">
        <div>
         <label class="username" for="uname"><b>Username</b></label><br>
         <input type="text" placeholder="Enter Username" name="username" required><br>
        </div>
    
        
            <label  for="psw"><b>Password</b></label><br>
            <input type="password" placeholder="Enter Password" name="password" required><br><br>
        
    
        <button  class="btn btn-dark" type="submit" name="login_user">Login</button><br>
       </div>
       <p>
        Not yet a member? <a href="signup.php">Sign up</a>
    </p>
       
       </form>
</body>
</html>