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
            <hr>
            <p id="title">To Address:</p>
            <form action="powerbankship.php" method="post">
                <label>First Name:</label>
                <input type="text" name="first_name" />
                <br>
                <label>Last Name:</label>
                <input type="text" name="last_name" />
                <br>
                <label>Street Address:</label>
                <input type="text" name="street" />
                <br>
                <label>City:</label>
                <input type="text" name="city" />
                <br>
                <label>State:</label>
                <input type="text" name="state" />
                <br>
                <label>Zip Code:</label>
                <input type="text" name="zip" />
                <br>
                <br>
                <label>Order Number:</label>
                <input type="text" name="order" />
                <br>
                <label>Package Dimensions:</label>
                <input type="text" name="dimensions" />
                <br>
                <label>Total Value:</label>
                <input type="text" name="value" />
                <br>
                <input id="submit" type="submit" value="Get Label"/>
              </form>
            <hr>
        </main>
        <footer>Michael Anthony Rodriguez, Feb 16, 2024, IT-202-006, mr94@njit.edu</footer>
        <hr>
    </body>
</html>