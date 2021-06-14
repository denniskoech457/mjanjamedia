<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<?php
   
   include "assets/header2.php"

?>
<div class="text-centre">

    <p> Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    <p><a href="../BLOG/index.php" class="btn btn-outline-dark" >view blog</a></p>
    <p> <a class="btn btn-outline-dark" href="index.php?logout='1'" style="color: red;">logout</a> </p>

    <a href="create.php" class="btn btn-outline-dark">+ create a new post</a>
    <a href="index.php" class="btn btn-outline-dark">POSTS</a>
    <a href="myprofile.php" class="btn btn-outline-dark">profile</a>


    <?php
    require('servers.php');

    $username=$_SESSION['username'];
    $query = "SELECT * from author where username='".$username."'"; 
    $result = mysqli_query($db, $query) or die ( mysqli_error());
    $row = mysqli_fetch_assoc($result);
    ?>
   
    <div style="text-align: center;"class="form">

        <h1>Update profile</h1>
        <?php

        if(isset($_POST['new']) && $_POST['new']==1)
        {
        $username=$_REQUEST['username'];
        $trn_date = date("Y-m-d H:i:s");
        $password =$_REQUEST['password'];
        $password = md5($password);

        $phone_number =$_REQUEST['phone_number'];

        $username1 = $_SESSION["username"];


        $update="update author set 
        password='".$password."', phone_number='".$phone_number."'
        where username='".$username1."'";
        mysqli_query($db, $update) or die(mysqli_error());


        $status = "Record Updated Successfully. </br></br>
        <a href='index.php'>View Updated Record</a>";
        echo '<p style="color:#FF0000;">'.$status.'</p>';
        }else {
            
            
        ?>
        <div >
            <form name="form" method="post" action=""> 
            <input type="hidden" name="new" value="1" />
            <input name="username" type="hidden" value="<?php echo $row['username'];?>" />

            <p><h4>PASSWORD</h4><br><input type="text" placeholder="change password" name="password"  required  /></p>
            <p><h4>PHONE NUMBER</h4><br> <input type="text" name="phone_number" required value="<?php echo $row['phone_number'];?>" /></p>
            <p><input name="submit" type="submit" value="Update" /></p>
            </form>
            <?php } ?>
        </div>
    </div>
</div>
<?php
   
   include "assets/footer.php"

?>