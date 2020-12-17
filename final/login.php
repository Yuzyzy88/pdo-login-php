<?php
$message = "";
// check if the username and password is set
if (isset($_POST['submit'])) {
    // import database connection
    require_once('dbconn.php');
    // look for user in database
    $username = $_POST['username'];
    $password = $_POST['password'];
    $records  =  $conn->prepare('SELECT username, password FROM user WHERE username = :username');
    $records->bindParam(':username', $username);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    // check if the password mathces
    if (
        $results &&
        count($results) > 0 && // Check if more than 1 rows are returned
        password_verify($password, $results['password']) # MISTAKE HERE this is falce
    ) {
        // start the session and set the username
        session_start();
        $_SESSION['username'] = $results['username'];
        header('location:home.php');
        echo "DONE";
        exit;
    } else {
        $message = "Username and password are not found";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: url('pic/background.jpg');
        }
    </style>
</head>

<body>

    <div class="container box">
        <form method="POST" action="login.php">
            <h1>Login</h1>
            <p class="text-muted"> Please enter your login and password!</p>
            <input type="text" name="username" placeholder="Username" value="" required>
            <input type="password" name="password" placeholder="Password" value="" required>
            <input type="submit" name="submit" value="Login">
            <p class="text mt-4">Don't have account?<span><a href="register.php"> Register</a></span></p>
            <?php
            echo $message;
            ?>
        </form>

    </div>
</body>

</html>