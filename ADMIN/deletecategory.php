<?php

include "categoryserver.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$del = mysqli_query($db,"delete from categories where id = '$id'"); // delete query



if($del)
{
    mysqli_close($db); // Close connection
    header("location:addcategory.php"); // redirects to all records page
    $_SESSION['deleted'] = "category deleted successfuly";
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}

?>