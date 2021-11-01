<?php
//Step 1. Database credentials
$host = "localhost";
$db_name = "test2";
$username = "root";
$password = "password";

//Step 2. Connect to database
$con = new PDO("mysql:host={$host};dbname={"$db_name"}", $username, $password);

//Step 3. Prepare query
$query = "INSERT INTO test2 (firstname, lastname, email)
VALUES (:firstname, :lastname, :email)"

?>