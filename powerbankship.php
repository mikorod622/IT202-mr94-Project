<?php
  $first_name = filter_input(INPUT_POST, 'first_name');
  $last_name = filter_input(INPUT_POST, 'last_name');
  $street = filter_input(INPUT_POST, 'street');
  $city = filter_input(INPUT_POST, 'city');
  $state = filter_input(INPUT_POST, 'state');
  $zip = filter_input(INPUT_POST, 'zip');
  $order = filter_input(INPUT_POST, 'order');
  $dimensions = filter_input(INPUT_POST, 'dimensions');
  $value = filter_input(INPUT_POST, 'value');

  if ($value > 1000) {
    echo "error! value of package to high! ";
  }
  if ($dimensions > 36) {
    echo "error! size of package too big! ";
  }
  if ($zip > 89049 || $zip < 00501) {
    echo "error! invalid zip code! ";
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
                <a href="powerbankship.html">Shipping</a>
            </ul>
        </header>
        <!-- main elements -->
        <main>
            <hr>
            <p id="title">To Address:</p>
            <div id="labeled" action="powerbankship.php" method="post">
                <span><?php echo htmlspecialchars($first_name); ?></span>
                <br>
                <span><?php echo htmlspecialchars($last_name); ?></span>
                <br>
                <span><?php echo htmlspecialchars($street); ?></span>
                <br>
                <span><?php echo htmlspecialchars($city); ?></span>
                <br>
                <span><?php echo htmlspecialchars($state); ?></span>
                <br>
                <span><?php echo htmlspecialchars($zip); ?></span>
                <br>
                <br>
                <label>Shipped by USPS</label>
                <br>
                <label>priority shipping</label>
                <br>
                <label>Tracking Number: 9735687634</label>
                <img id="shipped" src="images/label.png">
                <br>
                <label>Package Dimensions:</label>
                <span><?php echo htmlspecialchars($dimensions); ?></span><label>lb</label>
                <br>
                <label>Total Value: $</label>
                <span><?php echo htmlspecialchars($value); ?></span>
                <br>
                <label>Order Number:</label>
                <br>
                <span><?php echo htmlspecialchars($order); ?></span>
                <label>Ship Date: October 30th 2024</label>
              </div>
            <hr>
        </main>
        <footer>Michael Anthony Rodriguez, Feb 16, 2024, IT-202-006, mr94@njit.edu</footer>
        <hr>
    </body>
</html>