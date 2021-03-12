<?php 
    echo 'Hello World!'.PHP_EOL; 
    // phpinfo();

    $hostname = "localdb";
    $dbname = "testdb";
    $username = "root";
    $password = "root";

    try {
    $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Database Connected successfully";
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }
?> 


