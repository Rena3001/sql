<?php
$dbname = "todo";
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
try {
    $db = beginTransaction();
    $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
} catch (PDOException $e) {
    echo $e->getMessage();
}

$name = $_GET['name'];
$query = 'SELECT * FROM `items` WHERE `name`="' . $name . '"';
$stmt = $db->query($query);
$stmt = $db->prepare($query);
$stmt->execute(["name"]);
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($items);
?>