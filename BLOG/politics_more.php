





<?php
if(!empty($_POST["id"])){

    // Include the database configuration file
    include 'servers.php';
    
    // Count all records except already displayed
    $query = $db->query("SELECT COUNT(*) as num_rows FROM images WHERE id < ".$_POST['id']." ORDER BY id DESC");
    $row = $query->fetch_assoc();
    $totalRowCount = $row['num_rows'];
    
    $showLimit = 11;
    
    // Get records from the database
    $query = $db->query("SELECT * FROM images WHERE id < ".$_POST['id']." ORDER BY id DESC LIMIT $showLimit");

    if($query->num_rows > 0){ 
        while($row = $query->fetch_assoc()){
            $postID = $row['id'];
    ?>
<a href="readmore.php?id=<?php echo $row['id']; ?>">
<div class="card" style="width: 18rem; margin:7px;">
   <img class="card-img-top" src="<?php echo " ../images/".$row['image']." "; ?>" alt="<?php echo $row['title']; ?>">

  <div class="card-body">
    <h2  class="title"><u><?php echo $row['title']; ?></u></h2>
    <p class="bg"><i class="fas fa-calendar-alt"></i><u><?php echo substr($row['time'],0,10); ?></u></p> 
    
  </div>
</div>
</a>
        
    <?php } ?>
    <?php if($totalRowCount > $showLimit){ ?>
        
        <div  id="show_more_main<?php echo $postID; ?>">
            <span id="<?php echo $postID; ?>" class="show_more" title="Load more posts">+ more</span>
            <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
        </div>
    <?php } ?>

<?php
    }
}
?>




