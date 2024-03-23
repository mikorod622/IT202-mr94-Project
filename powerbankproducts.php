<?php
// TODO use database_local.php OR database_njit.php
require_once('database_local.php');

// Get category ID
$category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
if ($category_id == NULL || $category_id == FALSE) {
  $category_id = 1;
}

// Get name for selected category
$queryCategory = 'SELECT * FROM powerBankCategories
          WHERE powerBankCategoryID = :category_id';
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$category_name = $category['powerBankCategoryName'];
$statement1->closeCursor();

// Get all categories
$queryAllCategories = 'SELECT * FROM powerBankCategories
             ORDER BY powerBankCategoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get products for selected category
$queryProducts = 'SELECT * FROM powerBank
          WHERE powerBankcategoryID = :category_id
          ORDER BY powerBankID';
$statement3 = $db->prepare($queryProducts);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$products = $statement3->fetchAll();
// DEBUGGING ONLY
// echo "<pre>";
// print_r($products);
// echo "</pre>";
// DEBUGGING ONLY
$statement3->closeCursor();
?>
<!DOCTYPE html>
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
        <h1>Product List</h1>
  <aside>
    <!-- display a list of categories -->
    <h2>Categories</h2>
    <nav>
    <ul>
      <?php foreach ($categories as $category) : ?>
        <a href="?category_id=<?php 
            echo $category['powerBankCategoryID']; 
            ?>">
          <?php echo $category['powerBankCategoryName']; ?></a>
          <hr>
      <?php endforeach; ?>
    </ul>
    </nav>       
  </aside>

  <section>
    <!-- display a table of products -->
    <h2><?php echo $category_name; ?></h2>
    <table>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Mah</th>
        <th>Price</th>
      </tr>

      <?php foreach ($products as $product) : ?>
      <tr>
        <td><?php echo $product['powerBankName']; ?></td>
        <td><?php echo $product['description']; ?></td>
        <td><?php echo $product['mah']; ?></td>
        <td><?php echo $product['price']; ?></td>
        <td>
          <form action="delete_product.php" method="post">
            <input type="hidden" name="product_id"
              value="<?php echo $product['powerBankID']; ?>" />
            <input type="hidden" name="category_id"
              value="<?php echo $product['powerBankCategoryID']; ?>" />
            <input type="submit" value="Delete" />
          </form>
        </td>
      </tr>
      <?php endforeach; ?>      
    </table>
  </section>
        </main>
        <hr>
        <hr>
        <footer>Michael Anthony Rodriguez, Feb 16, 2024, IT-202-006, mr94@njit.edu</footer>
        <hr>
    </body>
</html>