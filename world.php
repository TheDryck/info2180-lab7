<?php
$host = getenv('IP');
$username = 'lab7_user';
$password = 'P@$$w0rD';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET)){
    if(!empty($_GET['country'])){
        $country = filter_var($_GET['country'], FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES);
        $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%';");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        ?>
        <table>
            <thead>
                <tr>
                    <th>Country Name</th>
                    <th>Continent</th>
                    <th>Independence Year</th>
                    <th>Head of State</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($results as $row): ?>
                    <tr>
                        <td><?= $row['name']?></td>
                        <td><?= $row['continent']?></td>
                        <td><?= $row['independence_year']?></td>
                        <td><?= $row['head_of_state']?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php
    } else {
        $stmt = $conn->query("SELECT * FROM countries;");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        ?>
        <table>
            <thead>
                <tr>
                    <th>Country Name</th>
                    <th>Continent</th>
                    <th>Independence Year</th>
                    <th>Head of State</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($results as $row): ?>
                    <tr>
                        <td><?= $row['name']?></td>
                        <td><?= $row['continent']?></td>
                        <td><?= $row['independence_year']?></td>
                        <td><?= $row['head_of_state']?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php
    }
}