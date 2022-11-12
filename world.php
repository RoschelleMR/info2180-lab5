<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
// $stmt = $conn->query("SELECT * FROM countries");
// $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


$user_Input = $_GET['country']; //get user's entry of country
$country = htmlspecialchars($user_Input); //sanitizing the input
$lookup = $_GET["lookup"];



if ($lookup === "countries"){
  
  echo country_table($conn, $country);
}

else if ($lookup === "cities"){
  echo city_table($conn,$country);
}





function country_table($conn, $country){
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo "<table>";
  echo "<tr>";
  echo "<th>Name</th>";
  echo "<th>Continent</th>";
  echo "<th>Independence</th>";
  echo "<th>Head of State</th>";
  echo "</tr>";

  foreach($results as $row){
    echo "<tr>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row["continent"]."</td>";
    echo "<td>".$row["independence_year"]."</td>";
    echo "<td>".$row["head_of_state"]."</td>";
    echo "</tr>";
  }

  echo "</table>";
}

function city_table($conn, $country){
  $stmt = $conn->prepare("SELECT cities.name, cities.district, cities.population FROM cities INNER JOIN countries ON countries.code = cities.country_code WHERE countries.name = :country");
  $stmt->bindParam(':country',$country,PDO::PARAM_STR);
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if (count($results)>0){
    echo "<table>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>District</th>";
    echo "<th>Population</th>";
    echo "</tr>";
    
    foreach($results as $row){
      echo "<tr>";
      echo "<td>".$row['name']."</td>";
      echo "<td>".$row["district"]."</td>";
      echo "<td>".$row["population"]."</td>";
      echo "</tr>";
    }

    echo "</table>";
  }
  else{
    echo "$country is not a country";
  }
 
}

?>