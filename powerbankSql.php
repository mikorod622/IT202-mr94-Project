<?php
// TODO Use database_local.php OR database_njit.php
require_once('database_local.php');
$db = getDB();
$query = 'SELECT *
          FROM powerBankCategories
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
            <nav class="menu">
                <a href="powerbankhome.php">Home</a>
                <a href="powerbankproducts.php">Products</a>
                <?php 
                    if (isset($_SESSION['is_valid_admin'])==false){
                        session_start();
                    }
                    if (isset($_SESSION['is_valid_admin'])) { 
                ?>
                
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
            <input type="text" name="code" id="code" required><br>

            <label>Name:</label>
            <input type="text" name="name" id="name" required><br>

            <label>Description:</label>
            <input type="text" name="desc" id="desc" required><br>

            <label>Mah:</label>
            <input type="text" name="mah" id="mah" required><br>

            <label>List Price:</label>
            <input type="text" name="price" id="price" required><br>

            <input onclick="validate" type="submit" id="submit_button" value="Add Product"><br>
            <input type="reset" value="Reset">
        </form>
        <p><a href="powerbankproducts.php">View Product List</a></p>
        </main>
        <script>
            const validate = (event) => {
                const code_element = document.querySelector("#code");
                const code_value = code_element.value;
                const code = parseInt(code_value);
                const name_element = document.querySelector("#name");
                const name_value = name_element.value;
                const name = parseInt(name_value);
                const desc_element = document.querySelector("#desc");
                const desc_value = desc_element.value;
                const desc = parseInt(desc_value);
                const mah_element = document.querySelector("#mah");
                const mah_value = mah_element.value;
                const mah = parseInt(mah_value);
                const price_element = document.querySelector("#price");
                const price_value = price_element.value;
                const price = parseInt(price_value);
                if ( code_value === null || code_value === "") {
                    // notify user of error
                    alert("Code is invalid.");
                    // don't allow form to be submitted
                    event.preventDefault();
                }
                else if (code_value.toString().length < 4) {
                    alert("Code must be more than 4 characters long");
                    event.preventDefault();
                }
                else if (code_value.toString().length > 10) {
                    alert("Code must not be more than 10 characters long");
                    event.preventDefault();
                }
                else if ( name_value === null || name_value === "") {
                    // notify user of error
                    alert("Name is invalid.");
                    // don't allow form to be submitted
                    event.preventDefault();
                }
                else if (name_value.toString().length < 10) {
                    alert("Name must be more than 10 characters long");
                    event.preventDefault();
                }
                else if (name_value.toString().length > 100) {
                    alert("Name must not be more than 100 characters long");
                    event.preventDefault();
                }
                else if ( desc_value === null || desc_value === "") {
                    // notify user of error
                    alert("Description is invalid.");
                    // don't allow form to be submitted
                    event.preventDefault();
                }
                else if (desc_value.toString().length < 10) {
                    alert("Description must be more than 10 characters long");
                    event.preventDefault();
                }
                else if (desc_value.toString().length > 255) {
                    alert("Description must not be more than 255 characters long");
                    event.preventDefault();
                }
                else if ( mah_value === null || mah_value === "") {
                    // notify user of error
                    alert("Mah is invalid.");
                    // don't allow form to be submitted
                    event.preventDefault();
                }
                else if ( price_value === null || price_value === "") {
                    // notify user of error
                    alert("Price is invalid.");
                    // don't allow form to be submitted
                    event.preventDefault();
                }
                else if ( price_value <=0) {
                    // notify user of error
                    alert("Price is too low.");
                    // don't allow form to be submitted
                    event.preventDefault();
                }
                else if ( price_value > 100000) {
                    // notify user of error
                    alert("Price is too high.");
                    // don't allow form to be submitted
                    event.preventDefault();
                }
            }

            // when document has finished loading, call
            // anonymous arrow function
            document.addEventListener(
                "DOMContentLoaded",
                () => {
                    const submit_button_element = document.querySelector("#submit_button");
                    submit_button_element.addEventListener(
                        "click",
                        validate
                    );
                }
            );
        </script>
        <hr>
        <hr>
        <footer>Michael Anthony Rodriguez, Feb 16, 2024, IT-202-006, mr94@njit.edu</footer>
        <hr>
    </body>
</html>