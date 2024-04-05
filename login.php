<?php 
if (!isset($login_message)) {
  $login_message = 'You must login to view this page.';
}
?>
<!DOCTYPE html>
<html>
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
        <h1>Login</h1>
          <form action="authenticate.php" method="post">
            <label>Email:</label>
            <input type="text" name="email" value="">
            <br>
            <label>Password:</label>
            <input type="password" name="password" value="">
            <br>
            <input type="submit" value="Login">
          </form>
          <p><?php echo $login_message; ?></p>
        </main>
        <hr>
        <hr>
        <footer>Michael Anthony Rodriguez, Feb 16, 2024, IT-202-006, mr94@njit.edu</footer>
        <hr>
    </body>
</html>