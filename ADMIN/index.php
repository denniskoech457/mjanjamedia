<?php
   
   include "servers.php"
  
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
<html>
<head>

<link rel="stylesheet"  href="assets/mjanja.css">

</head>

<?php
   
   include "assets/header2.php"

?>
<div class="text-centre">
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

<p> Welcome <strong><?php echo $_SESSION['user']; ?></strong></p>
<p> <a class="btn btn-outline-dark" href="index.php?logout='1'" style="color: red;">logout</a> </p>

<a href="create.php" class="btn btn-outline-dark">+ create a new post</a>
<a href="add.php" class="btn btn-outline-dark">+ add author</a>
<a href="addcategory.php" class="btn btn-outline-dark">categories</a>
<a class="btn btn-dark" href="authors.php">AUTHORS</a>
<a class="btn btn-dark" href="editweb.php?id=1">Website information</a>



   <form action="" method="post">
   <label for="title">search by title</label>
   <input name="searchtitle" type="text"><br>
   <label for="author">search by author</label>
   <input name="searchauthor" type="text"><br>
   
   <button  class="btn btn-primary" name="search" type="submit">search</button>

   
   </form>
 <div class="row">
 <table class="table" border="2" >
    
          <tbody>
          <?php 
          include("servers.php");
          if (isset($_POST['search'])) {
            // receive all input values from the form
            
            $searchauthor = ( $_POST['searchauthor']);
            $searchtitle = ( $_POST['searchtitle']);
          if ($searchauthor |= "" or $searchtitle |= "") {
              $query = "SELECT *FROM images WHERE  author='$searchauthor' || title='$searchtitle'  ";
            
            $data = mysqli_query($db, $query) or die('error') ;

            if (mysqli_num_rows($data) > 0) {
              while($row = mysqli_fetch_assoc($data)){
              $id = $row['id'];
              $image = $row['image'];
              $title = $row['title'];
              $image_text = $row['image_text'];
              $author = $row['author'];
              $categoryname = $row['categoryname'];
              ?>
            
            <div class="card" style="width: 18rem; margin:7px;  ">
                <img  class="card-img-top" src="<?php echo " ../images/$image "; ?>" alt="Card image cap">
                <div class="card-body">
                  <h2 class="title"  ><u><?php echo $title; ?></u></h2>
                  <p class="bg"><i class="fas fa-tags"></i> <b><?php echo $categoryname; ?></b></p>
                  <p class=""  ><u><?php echo $author; ?></u></p>
                  <a class="btn btn-primary" href="editpost.php?id=<?php echo $id; ?>">edit</a></td> 
                  <a class="btn btn-danger" href="deletepost.php?id=<?php echo $id; ?>">Delete</a></td>
                </div>
                      
                      
                    </div>	
                    <?php 
                  }
                }
              else{
                ?>
              <tr>
              <td>Records Not Found!</td>
              </tr>
              <?php
                }

              }
            }
            
          ?>
          </tbody>
</table>


</div>

<?php
   
   include "assets/footer.php"

?>



</html>