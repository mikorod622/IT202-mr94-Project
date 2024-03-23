<?php
  // DEBUGGING ONLY
  // echo "<pre>";
  // print_r($_POST);
  // echo "</pre>";
  // DEBUGGING ONLY

// Get the product data
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$desc = filter_input(INPUT_POST, 'desc');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);


// Validate inputs
if ($category_id == NULL || $category_id == FALSE)
{
  $error = "Invalid category. Check all fields and try again.";
  echo "$error <br>";
}
elseif ($code == NULL)
{
  $error = "Invalid code. Check all fields and try again.";
  echo "$error <br>";
}
elseif ($name == NULL)
{
  $error = "Invalid name. Check all fields and try again.";
  echo "$error <br>";
}
elseif ($desc == NULL)
{
  $error = "Invalid description. Check all fields and try again.";
  echo "$error <br>";
}
elseif ($price == NULL || $price == FALSE)
{
    $error = "Invalid price. Check all fields and try again.";
    echo "$error <br>";
} else {
    // Change to database_local.php or database_njit.php
    require_once('database_local.php');
    // Add the product to the database  
    $queryProducts = 'SELECT * FROM powerBank
          WHERE powerBankcategoryID = :category_id
          ORDER BY powerBankID';
    $statement3 = $db->prepare($queryProducts);
    $statement3->bindValue(':category_id', $category_id);
    $statement3->execute();
    $products = $statement3->fetchAll();
    $statement3->closeCursor();
    foreach ($products as $product){
      if ($code == $product['powerBankCode']){
        $error = "Duplicate code.";
        echo "$error <br>";
        header("Location:duplicate.php");
        exit();
      }
    }

    $query = 'INSERT INTO powerbank 
                  (`powerBankCategoryID`, `powerBankCode`, `powerBankName`, `description`, `price`, `dateCreated`)
              VALUES
                 (:category_id, :code, :name, :desc, :price, NOW())'; 
    $statement = $db->prepare($query);
    
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':desc', $desc);
    $statement->bindValue(':price', $price);
    $success = $statement->execute();
    $statement->closeCursor();

    echo "<p>Added Successfully</p>";

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
