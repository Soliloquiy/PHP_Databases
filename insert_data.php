<?php
//Step 1. Database credentials
$host = "localhost";
$db_name = "test2";
$username = "user";
$password = "password";

//Step 2. Connect to database

try {
$con = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
//SET ERROR HANDLING
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Step 3. Prepare query and bind parameters
//Binding paramaters is used to 
//a: Prevent SQL Injection
//b: Create multiple insertions using same query
$query = "INSERT INTO myGuests (firstname, lastname, email)
VALUES (:firstname, :lastname, :email)";

$stmt = $con->prepare($query);
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':email', $email);

//Step 4. Insert rows
$firstname = "Joseph";
$lastname = "Hoover";
$email = "joseph@example.com";
$stmt->execute();

$firstname = "Mary";
$lastname = "Moe";
$email = "mary@example.com";
$stmt->execute();

$firstname = "Julie";
$lastname = "Dooley";
$email = "julie@example.com";
$stmt->execute();

echo "Data Inserted";

  //DISPLAY ERROR MESSAGE
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}

$con = null;


?>