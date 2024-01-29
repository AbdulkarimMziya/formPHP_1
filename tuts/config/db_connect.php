<?php 

 #1. connect to database
    $conn = mysqli_connect('localhost','root','','ninja_pizza');  // ('host', 'username', 'password','DB_name')

    #2. check connection
    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }



?> 
