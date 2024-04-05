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
            <hr>
            <p id="title">What do we do?</p>
            <p id="textbox">We are a proud seller of many types of Power Banks. Our end goal is to deliver a professional experience for all seeking portable power. From solar powered to wireless charging, we have everything you'll need. Our banks also come in different sizes and capacities.</p>
            <hr>
            <p id="title">High-Capacity Power Bank</p>
            <figure id="product"><img src="images/big.png" alt="High-Capacity Power Bank"><figcaption>This is our high-capacity power bank</figcaption></figure>
            <hr>
            <hr>
            <p id="title">Solar-Powered Charger</p>
            <figure id="product"><img src="images/solar.png" alt="Solar-Powered Charger"><figcaption>This is our solar-powered charger</figcaption></figure>
            <hr>
            <hr>
            <p id="title">Slim Portable Charger</p>
            <figure id="product"><img src="images/slim.png" alt="Slim Portable Charger"><figcaption>This is our Slim Portable Charger</figcaption></figure>
            <hr>
            <hr>
            <p id="title">Fast Charging Power Bank</p>
            <figure id="product"><img src="images/fast.png" alt="Fast Charging Power Bank"><figcaption>This is our Fast Charging Power Bank</figcaption></figure>
            <hr>
            <hr>
            <p id="title">Wireless Charging Power Bank</p>
            <figure id="product"><img src="images/wireless.png" alt="Wireless Charging Power Bank"><figcaption>This is our Wireless Charging Power Bank</figcaption></figure>
            <hr>
            <hr>
        </main>
        <footer>Michael Anthony Rodriguez, Feb 16, 2024, IT-202-006, mr94@njit.edu</footer>
        <hr>
    </body>
</html>