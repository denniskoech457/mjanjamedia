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
    "mjanjalogo.png" 
            type = "image/x-icon"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" 
        crossorigin="anonymous">
    <link rel="stylesheet" href="assets/header.css">
    <script
      src="https://kit.fontawesome.com/9ad9a54963.js"
      crossorigin="anonymous"
    ></script>
</head>

<body>
    


<header>
       <a class="logo"  href=""><h1><?php echo $data['web_name']; ?><span></span></h1></a> 
            <div class="open"></div>
            <div class="navigation">
                <div class="navigation-items">
                    <a href="index.php">Home</a>
                      <a href="politics.php">politics</a>
                      <a href="entertainment.php">Entertainment news</a>
                  <a href="#">NewsLetter</a>
                    <a href="aboutus.php">Contact</a>
                </div>
         </div>    
    </header>
  <?php
 }
 ?>

<script type="text/javascript">

const menuBtn = document.querySelector(".open");
const navigation = document.querySelector(".navigation");

menuBtn.addEventListener("click" ,() => {
menuBtn.classList.toggle("active");
navigation.classList.toggle("active");
});
</script>
</body>
</html>
