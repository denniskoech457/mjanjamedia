



<?php
  // Create database connection
  $db = mysqli_connect("sql302.epizy.com", "sql4416754epiz_28752414", "z64XcPjcQIer", "epiz_28752414_mjanjamedia");
  $errors = array(); 
  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['add']) & isset($_POST['categoryname'])) {
  	
    $categoryname = $_POST["categoryname"];
            // first check the database to make sure 
            // a user does not already exist with the same username and/or email
            $user_check_query = "SELECT * FROM categories WHERE categoryname='$categoryname'  LIMIT 1";
            $result = mysqli_query($db, $user_check_query);
            $user = mysqli_fetch_assoc($result);
            if ($user) { // if user exists
                if ($user['categoryname'] === $categoryname) {
                array_push($errors, "category already exists");
                }

                        }
            // Finally, register user if there are no errors in the form
            if (count($errors) == 0) {
                $query = "INSERT INTO categories (categoryname) VALUES ('$categoryname')";
                
                mysqli_query($db, $query);
                
                $_SESSION['added'] = "category added successfully";
            
                header('location: addcategory.php');
            }



  	
      }
  $result = mysqli_query($db, "SELECT * FROM categories");
  
 






?>