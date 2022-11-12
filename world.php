<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
// $stmt = $conn->query("SELECT * FROM countries");
// $results = $stmt->fetchAll(PDO::FETCH_ASSOC);



$country = $_GET['country']; //get user's entry of country
$user_Input = htmlspecialchars($country, ENT_COMPAT); //sanitizing the input


$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($results as $row){
  echo "<ul>";
  echo "<li>Name: ".$row['name'];
  echo " ";
  echo "Continent: ".$row["continent"];
  echo " ";
  echo "Region: ".$row["independence_year"];
  echo " ";
  echo "Head of State: ".$row["head_of_state"];
  echo "</li>";
  echo "<br>";
  echo "</ul>";
}

?>