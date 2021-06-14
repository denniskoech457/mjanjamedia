<?php

include "servers.php"; // Using database connection file here

$records = mysqli_query($db, "select * from titles"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['web_name']; ?>| <?php echo $data['tagline']; ?></title>
    <!-- add icon link -->
    <link rel = "icon" href =  
    "mjanjalogo1.png" 
            type = "image/x-icon"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" 
        crossorigin="anonymous">
    <link rel="stylesheet" href="assets/headercss.css">
    <script
      src="https://kit.fontawesome.com/9ad9a54963.js"
      crossorigin="anonymous"
    ></script>
</head>

<body>
    


<div class="header ">
  
  <a class="logo" ><?php echo $data['web_name']; ?></a>
  <div class="header-right">
    <a class="active"class="btn btn-outline-dark" href="../BLOG">Home</a>
    <a href="../BLOG/entertainment.php">Entertainment</a>
    <a href="../BLOG/politics.php">politics</a>
    <a href="#contact">Ispiration</a>
    <a href="../BLOG/aboutus.php">About</a>
  </div>
  <?php
 }
 ?>
</div>

</body>
</html>
