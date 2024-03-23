<?php
  // Slide 24
  $dsn = 'mysql:host=localhost;port=3306;dbname=mr94';
  $username = 'root';
  $password = '';

  try {
    $db = new PDO($dsn, $username, $password);
    echo '<p>You are connected to the local database!</p>';
  } catch(PDOException $ex) {
    $error_message = $ex->getMessage();
    include('database_error.php');
    exit();
  }
?>