<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
// $stmt = $conn->query("SELECT * FROM countries");

// $results = $stmt->fetchAll(PDO::FETCH_ASSOC);



$country = $_GET['country'];
$user_Input = htmlspecialchars($country, ENT_COMPAT); //sanitizing the input


$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($results as $row){
  echo "Name: ".$row['name'];
  echo " ";
  echo "Continent: ".$row["continent"];
  echo " ";
  echo "Region: ".$row["region"];
  echo " ";
  echo "<br>";

  
}

?>