<?php


if (isset($_POST['web_name']) && isset($_POST['tagline'])) {
    include 'servers.php';
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    $web_name = validate($_POST['web_name']);
    $tagline = validate($_POST['tagline']);
    $about_us = validate($_POST['about_us']);
    $email = validate($_POST['email']);

   
    

    if (empty($web_name) || empty($tagline) ) {
       header("Location: postaboutus.php");
    }else {
        $sql = "INSERT INTO titles( web_name, email, tagline, about_us) VALUES('$web_name', '$email', '$tagline', '$about_us')";
        $res = mysqli_query($db, $sql);
        if ($res){
            header ("location: editweb.php");
            
            
        }
        else {
            echo "Not Successfuly Sent Contact Admin!!";
        }
    }
    

}else{
    header ("location: editweb.php");
}
?>