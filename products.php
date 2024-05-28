<?php
  include('powerBank.php');
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
          <?php foreach ($powerBank as $bank) { ?>
          <tr>
            <hr>
            <?php if ($bank['powerBankID']==1){ echo "Capacity";}
            elseif($bank['powerBankID']==5){echo 'Solar';}
            elseif($bank['powerBankID']==9){echo 'Slim';}
            elseif($bank['powerBankID']==13){echo 'Fast';}
            elseif($bank['powerBankID']==17){echo 'wireless';}?>
            <figure><p><?php echo $bank['powerBankName']; ?></p></figure>
            <figure><picture><?php echo $bank['description']; ?></p></figure>
            <figure><p><?php echo $bank['mah']; ?>mah</p></figure>
            <figure><p>$<?php echo $bank['price']; ?></p></figure>
            <hr>
          </tr>
          <?php } ?>
        </main>
        <footer>Michael Anthony Rodriguez, Feb 16, 2024, IT-202-006, mr94@njit.edu</footer>
        <hr>
    </body>
</html>