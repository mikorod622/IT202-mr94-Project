<?php
// TODO use database_local.php OR database_njit.php
require_once('database_local.php');
$db = getDB();
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
                <p>
                    <a href="logout.php">Logout</a>
                </p>
                <?php } else { ?>
                <p>
                    <a href="login.php">Login</a>
                </p>
                <?php } ?>              
            </nav>
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
        <th>Code</th>
        <th>Name</th>
        <th>Description</th>
        <th>Mah</th>
        <th>Price</th>
      </tr>

      <?php foreach ($products as $product) : ?>
      <tr>
      <td><form class="link" action='product_details.php' method="post">
        <input class="link" type="submit" id="code" value="<?php echo $product['powerBankCode']; ?>"name="<?php echo $product['powerBankCode']; ?>">
        <input type="hidden" name="powerBankID" value="<?php echo $product['powerBankID']; ?>" />
        <input type="hidden" name="powerBankCode" value="<?php echo $product['powerBankCode']; ?>" />
        <input type="hidden" name="powerBankCategoryID" value="<?php echo $category['powerBankCategoryName']; ?>" />
        <input type="hidden" name="powerBankName" value="<?php echo $product['powerBankName']; ?>" />
        <input type="hidden" name="description" value="<?php echo $product['description']; ?>" />
        <input type="hidden" name="mah" value="<?php echo $product['mah']; ?>" />
        <input type="hidden" name="price" value="<?php echo $product['price']; ?>" />
        </form></td>
        <td><?php echo $product['powerBankName']; ?></td>
        <td><?php echo $product['description']; ?></td>
        <td><?php echo $product['mah']; ?></td>
        <td><?php echo $product['price']; ?></td>
        <td>
          <form action='delete_product.php' method="post">
            <input type="hidden" name="product_id"
              value="<?php echo $product['powerBankID']; ?>" />
            <input type="hidden" name="category_id"
              value="<?php echo $product['powerBankCategoryID']; ?>" />
            <?php 
                  if (isset($_SESSION['is_valid_admin'])) { 
            ?>
            <p>
                <input onclick="const confirmDelete = confirm('Are you sure?'); if (confirmDelete == false) { action='powerbankproducts.php';}" type="submit" value="Delete" />
            </p>
            <?php }?>
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