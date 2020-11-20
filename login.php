<?php
$message = "";
// Check if the username and password is set
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Import datbase connection
    require_once('dbcon.php');
    // Look for user in database
    $username = $_POST['username'];
    $password = $_POST['password'];
    $records  =  $conn->prepare('SELECT username,password  FROM tbl_user WHERE username = :username');
    $records->bindParam(':username', $username);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    // Check if the password matches 
    if (
        count($results) > 0 &&
        password_verify($password, $results['password'])
    ) {
        // Start the session and set the username 
        session_start();
        $_SESSION['username'] = $results['username'];
        header('location:home.php');
        exit;
    } else {
        $message = "Username and Password are not found<br>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
<?php
    echo $message;
?>
</body>

</html>