
<form  method="post">
<label for="search">search</label>
<input type="text" name="search" >
<input type="submit" value="submit">


</form>
<?php
    $db = new PDO("mysql:host=localhost;dbname=mjanjamedia",'root','');
    

if(isset($_POST["submit"])){
    $str= $_POST["search"];
    $sth = $db->prepare("SELECT *FROM 'images' WHERE 'title ='$str'");
    
    $sth->setFetchMode(PDO:: FETCH_OBJ);
    $sth-> execute();
    if ($row= $sth->fetch()) {
        ?>
        <br><br><br>
        <table>
        <tr>
        <th>NAME</th>
        <th>DESCRIPTION</th>
        
        </tr>
        <tr>
        <td><?php echo $row->title; ?></td>
        <td><?php echo $row->image_text; ?></td>
        </tr>
        </table>
        <?php 
    }
   
    else {
        echo "search does not exist ";
    }
    
}




?>