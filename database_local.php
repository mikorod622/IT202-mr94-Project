<?php
  // MODIFY LINE 3
  function getDB() {
    // Chapter 4 Slide 24
    $dsn = 'mysql:host=us-east-1.rds.amazonaws.com;port=3306;dbname=heroku_wckauxxx5t8yb9p5';
    $username = 'wj5myz4787qfnjp9';
    $password = 'g07pg3to9f6hbx46';

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