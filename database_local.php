<?php
  // MODIFY LINE 3
  function getDB() {
    // Chapter 4 Slide 24
    $dsn = 'mysql:host=us-cluster-east-01.k8s.cleardb.net;port=3306;dbname=heroku_8bd50de2c212c9a';
    $username = 'baeeaebcd79dab';
    $password = 'e658e786';

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