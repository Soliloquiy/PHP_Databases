<?php
// 1. Database credentials
$host = "localhost";
$db_name = "test2";
$username = "user";
$password = "password";
  
// 2. Connect to database
try {
  $con = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
  //SET ERROR HANDLING
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // 3. Prepare query
  $query = "CREATE TABLE myGuests (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
  // 4. Execute query using exec() because no results are returned
  $con->exec("DROP TABLE IF EXISTS myGuests;");
  echo "TABLE DROPPED<br>";
  $con->exec($query);
  echo "Table Successfully Created";

  //DISPLAY ERROR MESSAGE
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}

$con = null;

?>