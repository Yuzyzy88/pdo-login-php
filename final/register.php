<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/register.css">
    <title>Register</title>
    <style>
        body {
            /* background: #e1ebec; */
            background: linear-gradient(to bottom,
                    rgb(158, 173, 174) 50%,
                    rgb(6, 6, 6) 100%,
                    rgba(125, 185, 232, 1) 100%);
            font-family: "Poppins", sans-serif;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="row my-5">
            <div class="col-md-5 text-left text-white lcol" style="background: url(pic/background.jpg)">
                <div class="greeting">
                    <h3>Welcome to <span class="txt">stoke</span></h3>
                </div>
                <h6 class="mt-3">let's light some fire and get the show on the road...</h6>
                <div class="footer">
                    <div class=" d-flex flex-row justify-content-between">
                        <span>Privacy Policy &copy 2020 Stoke</span>
                    </div>
                </div>
            </div>

            <div class="col-md-6 rcol">

                <form class="sign-up" method="POST" action="#">
                    <h2 class="heading mb-4">Sign up</h2>
                    <div class="form-group fone mt-2"> <i class="fas fa-user"></i><input name="name" type="text" required="required" class="form-control" placeholder="Fullname"> </div>
                    <div class="form-group fone mt-2"> <i class="fas fa-envelope"></i><input name="username" type="text" required="required" class="form-control" placeholder="Username"> </div>
                    <div class="form-group fone mt-2"> <i class="fas fa-lock"></i><input name="password" type="password" required="required" class="form-control" placeholder="Password">
                        <div class="image"><i class="fas fa-eye"></i></div>
                    </div>
                    <input type="checkbox" class="form-check-input ml-0" id="exampleCheck1"> <label class="form-check-label ml-3" for="exampleCheck1">I agree to Stoke <u>Terms</u> and <u>Privacy Policy</u></label>
                    <button name="submit" type="submit" class="mt-5 btn-success">Get started now</button>
                </form>

                <p class="exist mt-4">Existing user? <span><a href="login.php">Log in</a></span></p>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        require_once('dbconn.php');
        // get value from input
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // insert data to database
        $insert = $conn->prepare("INSERT INTO user (name, username, password) VALUES (:name, :username, :password)");
        $insert->bindParam(':name', $name, PDO::PARAM_STR);
        $insert->bindParam(':username', $username, PDO::PARAM_STR);
        $insert->bindParam(':password', $password, PDO::PARAM_STR);
        $insert->execute();
        
    }
    ?>
</body>

</html>