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
    /***** How to connect to the Database *****/

    #1. connect to database
    $conn = mysqli_connect('localhost','root','','ninja_pizza');  // ('host', 'username', 'password','DB_name')

    #2. check connection
    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }

    #3. Write query for all pizzas
    $sql = 'SELECT title,ingredients,id FROM pizzas ORDER BY created_at';

    #4. Make query & get result
    $result = mysqli_query($conn, $sql);

    #5. Fetch the resulting rows as an array
    // Fetch all rows as associative arrays
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);


    // free result from memory
    mysqli_free_result($result);

    // close connection
    // mysql_close($conn);

    // print_r($pizzas);


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

        <h4 class="center grey-text">Pizzas!</h4>

        <div class="container">
            <div class="row">

                <?php foreach ($pizzas as $pizza) : ?>

                    <div class="col s6 md3">
                        <div class="card z-depth-0">
                            <div class="card-content center">
                                <h6> <?php echo htmlspecialchars($pizza['title']); ?> </h6>
                                <div>
                                    <ul>
                                        <?php foreach (explode(',', $pizza['ingredients']) as $ingredient) { ?>
                                            <li> <?php echo htmlspecialchars($ingredient); ?> </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>            
                             <!-- ********** Getting a Single Record ********** -->
                            
                            <!-- To have acces to a individual record, since we are in a loop we can send the data of that indivdual pizza
                                 1. Use a query string to get the id
                                 2. then check/verify Get request in detail.php file.
                             -->
                            <div class="card-action right-align">
                                <a class="brand-text" href="details.php?id=<?php echo $pizza['id'] ?>">more info</a>
                            </div>
                        </div> 
                    </div>

                <?php endforeach; ?>
                
            </div>
        </div>
    <?php include('templates/footer.php'); ?>
    

</html>
