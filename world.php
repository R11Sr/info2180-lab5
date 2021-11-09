<?php 
  $country = filter_var($_GET['country'], FILTER_SANITIZE_STRING);
  $cities = filter_var($_GET['context'], FILTER_SANITIZE_STRING);

?>



<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query(" SELECT DISTINCT cities.name as city_name, cities.country_code, cities.district,
cities.population,countries.name as country_name, countries.continent,countries.independence_year,countries.head_of_state FROM cities join countries on
cities.country_code = countries.code WHERE countries.name LIKE '%$country%';");

$country_only = $conn->query("SELECT * FROM countries WHERE countries.name LIKE '%$country%';");

$only_country_results = $country_only->fetchAll(PDO::FETCH_ASSOC);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php if(empty($cities)): ?>
  <?=$cities?>
  <table  class="styled-table">
    <tr>
      <th>Country Name</th>
      <th>Continent</th>
      <th>Independence Year</th>
      <th>Head of State</th>
    </tr>

    <?php foreach ($only_country_results as $row): ?>
      <tr>
        <td><?=$row['name']?></td>
        <td><?=$row['continent']?></td>
        <td><?=$row['independence_year']?></td>
        <td><?=$row['head_of_state']?></td>
      </tr>

    <?php endforeach; ?>
  </table>

<?php else: ?>
  <table   class="styled-table">
    <tr>
      <th>Name</th>
      <th>District</th>
      <th>Population</th>
    </tr>

    <?php foreach ($results as $row): ?>
      <tr>
        <td><?=$row['city_name']?></td>
        <td><?=$row['district']?></td>
        <td><?=$row['population']?></td>

      </tr>

    <?php endforeach; ?>
  </table>

<?php endif;?>
