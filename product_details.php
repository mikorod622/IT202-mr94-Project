<?php
$code = filter_input(INPUT_POST, 'powerBankCode');
$ID = filter_input(INPUT_POST, 'powerBankID');
$categoryID = filter_input(INPUT_POST, 'powerBankCategoryID');
$name = filter_input(INPUT_POST, 'powerBankName');
$desc = filter_input(INPUT_POST, 'description');
$mah = filter_input(INPUT_POST, 'mah');
$price = filter_input(INPUT_POST, 'price');

?>

<html>
    <head>
        <title>Portable Power Banks</title>
        <link rel="stylesheet" href="style.css" href="?product_id=<?php $code?>"/>
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
        <img src="images/<?php echo $code; ?>.png" alt="error finding image" id="img1">
        <img src="images/<?php echo $code; ?>.png" alt="error finding image" id="img2">
        <hr>
        <hr>
        <?php echo $categoryID; ?>
        <hr>
        <?php echo $name; ?>
        <hr>
        <?php echo $desc; ?>
        <hr>
        <?php echo $mah; ?>
        <?php echo "mah"; ?>
        <hr>
        <?php echo "$"; ?>
        <?php echo $price; ?>

        <p><a href="powerbankproducts.php">View Product List</a></p>

        </main>
        <hr>
        <hr>
        <footer>Michael Anthony Rodriguez, Feb 16, 2024, IT-202-006, mr94@njit.edu</footer>
        <hr>
    </body>
</html>