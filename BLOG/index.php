<?php
   
   include "servers.php"

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   
    <link rel="stylesheet" href="assets/blog.css">
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $(document).on('click','.show_more',function(){
        var ID = $(this).attr('id');
        $('.show_more').hide();
        $('.loding').show();
        $.ajax({
            type:'POST',
            url:'politics_more.php',
            data:'id='+ID,
            success:function(html){
                $('#show_more_main'+ID).remove();
                $('.postList').append(html);
            }
        });
    });
});

</script>
    
</head>
<body>
<div>
<?php
   
   include "assets/header.php"

?>
</div>
<div  class="contentss">
   
      

 <div style="max-width: 80% ; min-width: 80% ;"  class="posts" >
 <h1>Latest Post</h1>
  <div style="display: flex;
        flex-direction:row;  flex-wrap: wrap; "   class="postList">
    <?php
    // Include the database configuration file
    include 'servers.php';
    
    // Get records from the database
    $query = $db->query("SELECT * FROM images ORDER BY id DESC LIMIT 6");                                
    
    if($query->num_rows > 0){ 
        while($row = $query->fetch_assoc()){ 
            $postID = $row['id'];
    ?>
   
   <a  href="readmore.php?id=<?php echo $row['id']; ?>">  
    <div class="card" style="width: 18rem; margin:7px;">
     <img  class="card-img-top" src="<?php echo " ../images/".$row['image']." "; ?>" alt="Card image cap">

     <div class="card-body">
      <h2 class="title"  ><u><?php echo $row['title']; ?></u></h2>
      <p class="bg"><i class="fas fa-tags"></i> <b><?php echo $row['categoryname']; ?></b></p>
     </div>
    </div>
  </a>



    <?php } ?>
 </div>
    <div class="btn btn-outline-dark" id="show_more_main<?php echo $postID; ?>">
        <span id="<?php echo $postID; ?>" class="show_more" title="Load more posts">+ more</span>
        <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
    </div>
    <?php } ?>


 </div> 



   <div class="advert">
     <p>ADVERTISE HERE!!</p>



     
   </div>

</div>
<footer>

<?php
   
   include "assets/footer.php"

?>

</footer>
</body>
</html>