<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food_ordering";
$conn = new PDO(
    "mysql:host=$servername;dbname=$dbname",
    $username,
    $password
);

?>