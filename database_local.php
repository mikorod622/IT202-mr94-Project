<?php
  // MODIFY LINE 3
  function getDB() {
    // Updated database connection details
    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);
    
    $hostname = $dbparts['l3855uft9zao23e2.cbetxkdyhwsb.us-east-1.rds.amazonaws.com'];
    $username = $dbparts['wj5myz4787qfnjp9'];
    $password = $dbparts['g07pg3to9f6hbx46'];
    $database = ltrim($dbparts['wckauxxx5t8yb9p5'],'/');

    try {
      $db = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
      // set the PDO error mode to exception
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";
      }
    catch(PDOException $ex)
      {
        $error_message = $ex->getMessage();
        include('database_error.php');
        exit();
      }
    // MODIFY LINE 18 and 19
    return $db;
  }

?>
