<?php
  // Slide 37
  // use database_local.php OR database_njit.php
  require_once('database_local.php');

  $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
  $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

  if($product_id != FALSE && $category_id != FALSE) {
    $query = 'DELETE FROM powerBank WHERE powerBankID = :product_id';
    // 4 step: prepare, bindValue, execute, closeCursor
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $success = $statement->execute();
    $statement->closeCursor();
    if ($success == 1){
      echo "<p>Deleted Successfully</p>";
    }
    else{
      echo "<p>Delete Error</p>";
    }
    
  }
?>
<html>
    <head>
        <title>Portable Power Banks</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <!-- header -->
        <header>
            <img id="logo" src="images/logo.png"><h3>Portable Power Bank Central</h3>
            <ul class="menu">
                <a href="powerbankhome.html">Home</a>
                <a href="powerbankproducts.php">Products</a>
                <a href="powerbankship.html">Shipping</a>
                <a href="powerbankSql.php">Create</a>
            </ul>
        </header>
        <!-- main elements -->
        <main>
        <p><a href="powerbankproducts.php">View Product List</a></p>
        </main>
        <hr>
        <hr>
        <footer>Michael Anthony Rodriguez, Feb 16, 2024, IT-202-006, mr94@njit.edu</footer>
        <hr>
    </body>
</html>