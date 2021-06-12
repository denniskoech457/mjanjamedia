<?php
   
   include "categoryserver.php"

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" 
        crossorigin="anonymous">
        <link rel="stylesheet" href="assets/mjanja.css">
    
</head>
<?php
   
   include "assets/header2.php"

?>

<body>

    <p> Welcome back admin <strong><?php echo $_SESSION['user']; ?></strong></p>
    <p> <a class="btn btn-outline-dark" href="index.php?logout='1'" style="color: red;">logout</a> </p>
                
    <a href="add.php" class="btn btn-outline-dark">+ add author</a>
    <a href="index.php" class="btn btn-outline-dark">POSTS</a>
    <a class="btn btn-dark" href="authors.php">AUTHORS</a>
    <a class="btn btn-dark" href="editweb.php?id=1">Website information</a>

<?php if (isset($_SESSION['deleted'])) : ?>
                <div class="successful" >
                <h3>
                <?php 
                    echo $_SESSION['deleted']; 
                    unset($_SESSION['deleted']);
                ?></h3>
            </div>
            <?php endif ?>


    <div class="container mt-5">


            <form method="POST"  enctype="multipart/form-data">
                    <?php if (isset($_SESSION['added'])) : ?>
                <div class="successful" >
                <h3>
                <?php 
                    echo $_SESSION['added']; 
                    unset($_SESSION['added']);
                ?></h3>
            </div>
            <?php endif ?>
            <?php include('errors.php'); ?>
                        <input type="hidden" name="size" value="1000000">
                    
                        <div> 
                        <input type="text" name="categoryname" placeholder="add a category" class="form-control bg-dark text-white my-3 text-centre" required>
                        </div>
                
                    <div>
                        <button class="btn btn-dark" type="submit" name="add">+ADD CATEGORY</button>
                    </div>
                </form>
          <table class="table" border="2">
                    <tr>
                        
                        
                        <td>category</td>
                        
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>

                    <?php

                    // connect to the database
                    include_once "categoryserver.php";

                    $records = mysqli_query($db, "select * from categories"); // fetch data from database

                    while($data = mysqli_fetch_array($records))
                    {
                    ?>
                    <tr>
                        
                        
                        <td><?php echo $data['categoryname']; ?></td>
                         
                        <td><a class="btn btn-primary" href="editcategory.php?id=<?php echo $data['id']; ?>">Edit</a></td>
                        <td><a class="btn btn-danger" href="deletecategory.php?id=<?php echo $data['id']; ?>">Delete</a></td>
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