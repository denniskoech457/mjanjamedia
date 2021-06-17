<?php
require('servers.php');

$id=$_REQUEST['id'];
$query = "SELECT * from images where id='".$id."'"; 
$result = mysqli_query($db, $query) or die (mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $row['title']; ?></title>

<link rel="stylesheet" href="assets/readmore1.css" />
</head>
<body>
<?php
   
   include "assets/header.php"

?>


<div class="form">
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];

$image =$_REQUEST['image'];
$title =$_REQUEST['title'];
$image_text =$_REQUEST['image_text'];


mysqli_query($db,) or die(mysqli_error($db));

}else {
?>
<div>


<section class="image"> 

<div class="title"><h2 ><?php echo $row['title']; ?></h2></div>
<div class="readimage"><?php echo "<img  src='images/".$row['image']."' >" ; ?></div>



<div >
   
   <div class="icons" >
   <p class="bg"><i class="fas fa-calendar-alt"></i><b><?php echo substr($row['time'],0,10); ?></b></p> 
   <p class="bg"><i class="far fa-user"></i> <b><?php echo $row['author']; ?></b></p>
   <p class="bg"><i class="fas fa-tags"></i> <b><?php echo $row['categoryname']; ?></b></p>
   </div>
   <div class="logos">
      <a class="bg" href="http://www.facebook.com/sharer.php?url=http://mjanja.medianewsonline.com/BLOG/readmore.php?id=<?php echo $row['id']; ?> &text=<?php echo $row['title']; ?>>"><i class="fab fa-facebook fa-2x"></i></a>
      <a class="bg" href="whatsapp://send?text=<?php echo $row['title']; ?> &url=http://mjanja.medianewsonline.com/BLOG/readmore.php?id=<?php echo $row['id']; ?>"><i class="fab fa-whatsapp fa-2x"></i></a>

      <a class="bg" href="http://twitter.com/share?text=<?php echo $row['title']; ?>&url=http://mjanja.medianewsonline.com/BLOG/readmore.php?id=<?php echo $row['id']; ?>" ><i class="fab fa-twitter-square fa-2x"></i></a>
   </div>
   

</div>
<div><p class="imagetext"><?php echo $row['image_text']; ?></p></div>



</section>
<?php } ?>


</div>
</div>

<?php
   
   include "assets/footer.php"

?>

</body>
</html>