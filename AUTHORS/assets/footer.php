<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/footer.css">
    
</head>
<body>
    

<footer>
<?php

include "servers.php"; // Using database connection file here

$records = mysqli_query($db, "select * from titles"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
<div class="chini">
 <div class="tags">
    <h1>follow us</h1>
    <a class="active" href="<?php echo $data['facebook']; ?>"><i class="fab fa-facebook"></i>facebook</a>
    <hr>
    
    <a href="<?php echo $data['twitter']; ?>"><i class="fab fa-twitter-square"></i>twitter</a>
    <hr>
 </div>
 
 <div class="tags">
    <a href="">politics</a>
    <hr>
    <a href="">Entertainment News</a>
    <hr>
    <a href="http://localhost/mjanjamedia/test/aboutus.php">About Us</a>
    <hr>
 </div>
<div class="tags">
    <h1>contact us</h1>
    
 


    <a href="mailto:<?php echo $data['email']; ?>"><i class="fab fa-mail"></i><?php echo $data['email']; ?></a><br>

   <hr>
  <?php echo $data['tagline']; ?>
 
 
</div>  
  


 




  




</div>
<p>copyright ©<?php echo $data['web_name']; ?> 2021 | <?php echo $data['tagline']; ?></p>
<?php
 }
 ?>
</footer>
</body>
</html>