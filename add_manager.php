<?php
  // DEBUGGING ONLY
  // echo "<pre>";
  // print_r($_POST);
  // echo "</pre>";
  // DEBUGGING ONLY

// Get the product data
$first = filter_input(INPUT_POST, 'first');
$last = filter_input(INPUT_POST, 'last');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');


// Validate inputs
function addpowerBankmanager($first, $last, $email, $password) {
  
  if ($first == NULL)
  {
    $error = "Invalid first name. Check all fields and try again.";
    echo "$error <br>";
  }
  elseif ($last == NULL)
  {
    $error = "Invalid last name. Check all fields and try again.";
    echo "$error <br>";
  }
  elseif ($email == NULL)
  {
    $error = "Invalid last name. Check all fields and try again.";
    echo "$error <br>";
  }
  require_once('database_local.php');
  $db = getDB();
  $hash = password_hash($password, PASSWORD_DEFAULT);
  $query = 'INSERT INTO powerBankManagers (firstName, lastName, emailAddress, password, dateCreated)
            VALUES (:first, :last, :email, :password, NOW())';
  $statement = $db->prepare($query);
  $statement->bindValue(':first', $first);
  $statement->bindValue(':last', $last);
  $statement->bindValue(':email', $email);
  $statement->bindValue(':password', $hash);
  $statement->execute();
  $statement->closeCursor();

  echo "<p>Added Successfully</p>";
}
addpowerBankmanager($first, $last, $email, $password);
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
            <nav class="menu">
                <a href="powerbankhome.php">Home</a>
                <a href="powerbankproducts.php">Products</a>
                <?php 
                    if (isset($_SESSION['is_valid_admin'])==false){
                        session_start();
                    }
                    if (isset($_SESSION['is_valid_admin'])) { 
                ?>
                <a href="powerbankshipper.php">Shipping</a>
                <a href="powerbankSql.php">Create</a>
                <a href="logout.php">Logout</a>
                <p><a>
                    <?php
                        require_once('userData.php');
                        userData();
                    ?>
                </a></p>
                <?php } else { ?>
                <a href="login.php">Login</a>
                <?php } ?>              
            </nav>
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
