<?php

    #1. connect to database
    #2. check connection
    include('config/db_connect.php');

    $email = $title = $ingredients = '';
    $error = array('email'=>'', 'title'=>'', 'ingredients'=>'');
    # 1. Check if data has been received by the database

    // isset() - checks if a certain value has been set
    if(isset($_POST['submit'])){
       
        // Check if email is provided
        if(empty($_POST['email'])){
            $error['email'] = '*An email is required <br />';
        } else {
            // !-> htmlspecialchars() prevents cross-site scripts to be accepted 
            // to prevent malicious attacks

            // check if e-mail address is well-formed
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error['email'] = '*Email must be a valid email address <br />';
            }
        }

        // Check if title is provided
        if(empty($_POST['title'])){
            $error['title'] = '*A title is required <br />';
        } else {
            // !-> htmlspecialchars() prevents cross-site scripts to be accepted 
            // to prevent malicious attacks
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
                $error['title'] = '*Title must be letters and spaces only <br />';
            } // Checks if input contains any upper,lower or escape character 
        }


        // Check if ingredients is provided
        if(empty($_POST['ingredients'])){
            $error['ingredients'] = '*An ingredient is required <br />';
        } else {
            // !-> htmlspecialchars() prevents cross-site scripts to be accepted 
            // to prevent malicious attacks
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
                $error['ingredients'] = '*Ingredients must be a comma seperated list <br />';
            } // Checks if input contains any upper,lower and seperated by comma
        }

        # 2. Redirect user if form is validated successfully.

        // The array_filter() function passes each value of the input array to the callback function. 
        // If the callback function returns true, the current value from input is returned into the result array. 
        // Array keys are preserved.
        // -> true if there are errors, false if there are no errors.
        if(array_filter($error)){
            // echo 'errors in the form!'; 
        }else {
            // echo 'form is valid.';
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

            // Create sql table
            $sql = "INSERT INTO pizzas(title,email,ingredients) 
                    VALUES('$title', '$email', '$ingredients')";

            if(mysqli_query($conn, $sql)){
                // success
                header('Location: index.php');
            } else {
                // error
                echo('query error: ' . mysqli_connect_error($conn));
            }
            
        }

    } // end of POST check 

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

    <section class="container grey-text">
        <h4 class="center">Add a Pizza</h4>
        <form class="white" action="add.php" method="POST">
            <label>Your Email:</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <div class="red-text"><?php echo $error['email']; ?></div>
            
            <label>Pizza Title:</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>">
            <div class="red-text"><?php echo $error['title']; ?></div>
            
            <label>Ingredients (comma seperated):</label>
            <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients); ?>">
            <div class="red-text"><?php echo $error['ingredients']; ?></div>
           
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0"> 
            </div>
    </section>
    <?php include('templates/footer.php'); ?>
    
</html>
