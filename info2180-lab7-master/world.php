<?php
$host = getenv('IP');
$username = 'lab7_user';
$password = '@Poogiebear123';
$dbname = 'world';
$all = $_GET['all']; //accept GET request variables (NUMBER 2)
$country = $_GET['country']; //obtaining value of GET request (NUMBER 2)

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


if (isset($country)){
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
  $results = $stmt->fetchALL(PDO::FETCH_ASSOC); 
  
}
else{
  echo '<ul>';
  foreach ($results as $row){
    echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
  }
  echo '</ul>';
}
?>
<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>

<!--- Exercise 4 Not working
<table>
  <tr>
    <th>Name</th>
    <th>Continent</th>
    <th>Independence</th>
    <th>Head of State</th>
  </tr>
  START PHP
      $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
      $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%','%$continent%', '%$independence_year%', '%$head_of_state%'");
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["country"]. "</td><td>" . $row["continent"] . "</td><td>". $row["independence_year"]. "</td><td>". $row["head_of_state"]. "</td></tr>";
        }
        echo "</table>";
      }
      $conn->close();
    END PHP
    </table>
--->