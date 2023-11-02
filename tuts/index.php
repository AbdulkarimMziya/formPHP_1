<!-- <?php

    # Data Types
    $stringOne = 'my email is ';
    $stringTwo = 'abc123@gmail.com';
    
    // String concatination
    // echo $stringOne.$stringTwo; 
    $name = 'Joe';
    // echo 'My name is '. $name;
?> -->

<?php
    #1. How to connect to the Database

    // connect to database
    $conn = mysqli_connect('localhost','abdul','test1234','ninja_pizza');  // ('host', 'username', 'password','DB_name')

    // check connection
    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php include('templates/header.php'); ?>
    <?php include('templates/footer.php'); ?>
    

</html>