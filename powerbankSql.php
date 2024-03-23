<?php
// TODO Use database_local.php OR database_njit.php
require_once('database_local.php');

$query = 'SELECT *
          FROM powerbankcategories
          ORDER BY powerbankCategoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
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
        <h1>Add Product</h1>
        <form action="add_product.php" method="post"
              id="add_product_form">

            <label>Category:</label>
            <select id="choose" name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['powerBankCategoryID']; ?>">
                    <?php echo $category['powerBankCategoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            <label>Code:</label>
            <input type="text" name="code"><br>

            <label>Name:</label>
            <input type="text" name="name"><br>

            <label>Description:</label>
            <input type="text" name="desc"><br>

            <label>List Price:</label>
            <input type="text" name="price"><br>

            <input type="submit" value="Add Product"><br>
        </form>
        <p><a href="powerbankproducts.php">View Product List</a></p>
        </main>
        <hr>
        <hr>
        <footer>Michael Anthony Rodriguez, Feb 16, 2024, IT-202-006, mr94@njit.edu</footer>
        <hr>
    </body>
</html>