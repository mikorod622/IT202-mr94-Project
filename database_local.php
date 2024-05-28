<?php
  // MODIFY LINE 3
  function getDB() {
    // Chapter 4 Slide 24
    $dsn = 'mysql:host=localhost;port=3306;dbname=mr94';
    $username = 'root';
    $password = '';

    try {
      $db = new PDO($dsn, $username, $password);
    } catch(PDOException $ex) {
      $error_message = $ex->getMessage();
      include('database_error.php');
      exit();
    }
  // MODIFY LINE 18 and 19
  return $db;
  }
?>