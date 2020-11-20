<?php
include('dbcon.php');
session_start();
if (!isset($_SESSION['username'])) {
    header('location:index.php');
    exit();
}
$session_id = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <center>
        <h1> WELCOME, <?php echo $session_id ?></h1> <br>
        <hr><br>
        <a href="logout.php"><button type="submit">Log Out</button></a>
    </center>
</body>

</html>