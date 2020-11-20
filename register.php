<?php

require_once('dbcon.php');
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$email = $_POST['email'];
$name = $_POST['name'];
$insert = $conn->prepare("INSERT INTO tbl_user (email, name, username, password) VAlUES (:email, :name, :username, :password)");
$insert->bindParam(':email', $email, PDO::PARAM_STR);
$insert->bindParam(':name', $name, PDO::PARAM_STR);
$insert->bindParam(':username', $username, PDO::PARAM_STR);
$insert->bindParam(':password', $password, PDO::PARAM_STR);
$insert->execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>
    <script>
        alert('Registered Successfully! You may now Log In!');
        window.location = 'index.php';
    </script>
</body>

</html>