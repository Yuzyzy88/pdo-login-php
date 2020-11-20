
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user";
$conn  =  new PDO(
    "mysql:host=$servername;dbname=$dbname",
    $username,
    $password
);
