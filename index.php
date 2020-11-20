<?php

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
</head>

<body>
    <center>
        <form method="post" action="login.php">
            <h3>Log In</h3>
            Username: <input type="text" name="username" value="" placeholder="username" required> <br><br>
            Password: <input name="password" type="password" value="" placeholder="Password" required> <br><br>
            <button type="submit" name="login">Log In</button>
        </form><br>
        <hr>
        <form method="post" action="register.php">
            <h3>Register</h3>
            <label for="username">Username</label>
            <input class="long" name="username" required="required" type="text" placeholder="Username" />
            <br><br>
            <label for="password">Password</label>
            <input name="password" required="required" type="password" placeholder="Password" />
            <br><br>
            <label for="email">Email</label>
            <input name="email" required="required" type="email" placeholder="Email" />
            <br><br>
            <label for="name">Name</label>
            <input name="name" required="required" type="text" placeholder="Name" />
            <br><br>
            <button type="submit" name="signup">Sign Up</button>
        </form>
    </center>
</body>

</html>