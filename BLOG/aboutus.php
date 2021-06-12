<?php
   
   include "assets/header.php"

?>



<?php

     include "servers.php"; // Using database connection file here
 
     $records = mysqli_query($db, "select * from titles"); // fetch data from database

     while($data = mysqli_fetch_array($records))
    {
    ?>
      <div class="aboutpage">
        <h1> <u> About us</u></h1>
        <br>
       <hr>
       <br>
       <br>
       <h3><?php echo $data['web_name']; ?>| <?php echo $data['tagline']; ?></h3> 
       
       
       
       <div ><?php echo $data['about_us']; ?></div>
      
       <br>
       <br>
       
    <hr>
     </div>	
      <?php
      }
      ?>

<?php
   
   include "assets/footer.php"

?>