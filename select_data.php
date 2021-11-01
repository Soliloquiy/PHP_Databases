<?php
//Step 1. Database credentials
$host = "localhost";
$db_name = "test2";
$username = "user";
$password = "password";

try {
  $con = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
  //SET ERROR HANDLING
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  //Step 3. Prepare query and bind parameters
  $query = "SELECT * FROM myGuests";
  $stmt = $con->prepare($query);
  $stmt->execute();

  //Step 4. Iterate through query results
  //Each time fetch is called, 
  //the pointer is moved to next item in returned results

  // $row = $stmt->fetch(PDO::FETCH_ASSOC);
  // echo "here";
  // echo var_dump($row);
  // $row = $stmt->fetch(PDO::FETCH_ASSOC);
  // echo "here";
  // echo var_dump($row);

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "First Name: " . $row['firstname'] . "<br>";
    echo "Last Name: " . $row['lastname'] . "<br>";
    echo "Email: " . $row['email'] . "<br>";
  }
  
    //DISPLAY ERROR MESSAGE
  } catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }
  
  $con = null;


?>