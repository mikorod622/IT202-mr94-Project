<?php
function getDB() {
    // Corrected database connection details
    $host = 'l3855uft9zao23e2.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
    $dbname = 'wckauxxx5t8yb9p5';
    $username = 'wj5myz4787qfnjp9';
    $password = 'g07pg3to9f6hbx46';
    $port = 3306; // Explicitly define the port


    $dsn = "mysql:host=$host;port=$port;dbname=$dbname"; // Correct DSN format

    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $ex) {
        $error_message = $ex->getMessage();
        include('database_error.php');
        exit();
    }
    return $db;
}
?>