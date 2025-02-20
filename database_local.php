<?php
  // MODIFY LINE 3
  function getDB() {
    // Updated database connection details
    $dsn = 'mysql://wj5myz4787qfnjp9:g07pg3to9f6hbx46@l3855uft9zao23e2.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/wckauxxx5t8yb9p5';
    $username = 'wj5myz4787qfnjp9';
    $password = 'g07pg3to9f6hbx46';

    try {
      $db = new PDO($dsn, $username, $password);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $ex) {
      $error_message = $ex->getMessage();
      include('database_error.php');
      exit();
    }
    // MODIFY LINE 18 and 19
    return $db;
  }
?>
