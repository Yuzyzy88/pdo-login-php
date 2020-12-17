<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <title>Car Shoope</title>
    <style type="text/css">
        * {
            font-family: "Trebuchet MS";
        }

        h1 {
            text-transform: uppercase;
            color: salmon;
        }

        table {
            border: solid 1px #DDEEEE;
            border-collapse: collapse;
            border-spacing: 0;
            width: 70%;
            margin: 10px auto 10px auto;
        }

        table thead th {
            background-color: #DDEFEF;
            border: solid 1px #DDEEEE;
            color: #336B6B;
            padding: 10px;
            text-align: left;
            text-shadow: 1px 1px 1px #fff;
            text-decoration: none;
        }

        table tbody td {
            border: solid 1px #DDEEEE;
            color: #333;
            padding: 10px;
            text-shadow: 1px 1px 1px #fff;
        }

        a {
            background-color: salmon;
            color: #fff;
            padding: 10px;
            text-decoration: none;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <?php
    require_once('functions.php');

    checkLogin();

    include('dbconn.php');

    // Check is user is logged 
    if (!isset($_SESSION['username'])) {
        header('location:login.php');
        exit();
    }

    //$query = "SELECT * FROM car";

    // if (isset($_GET['search'])) {
    //     $query .= " WHERE name  LIKE :search";
    // }
    // $get = $conn->prepare($query);

    // if (isset($_GET['search'])) {
    //     $search = ('%' . $_GET['search'] . '%');
    //     $get->bindParam(':search', $search, PDO::PARAM_STR);
    // }
    // echo $get->queryString;
    // $get->execute();

    // $car = $get->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <!-- Navbar  -->
    <nav class="navbar navbar-dark bg-dark justify-content-between">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <button class='btn btn-outline-light' type='submit' value='Update'><a href="add.php" style="background-color:#343a40"> Add</a></button>
                <button method="GET" class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </div>
            <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
        </div>

    </nav>


    <table>
        <thead>
            <tr>
                <th>Picture</th>
                <th>Name</th>
                <th>Year</th>
                <th>Brand</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // run a query to display all data sorted by nim
            $query = $conn->prepare('SELECT * FROM car ORDER BY id ASC');
            $query->execute();


            //create loops for table elements from data
            //$no = 1; //variabel for make serial number have to use ID instead
            // The query results will be stored in the $data variable in the form of an array
            // then printed with a while loop

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <td style="text-align: center;"><img src="pic/<?php echo $row['picture']; ?>" style="width: 120px;"></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['year']; ?></td>
                    <td><?php echo $row['brand']; ?></td>
                    <td><?php echo $row['stock']; ?></td>
                    <td>Rp <?php echo $row['price']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                        <a href="deleted.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure want to delete this items?')">Delete</a>
                    </td>
                </tr>

            <?php
               
            }
            ?>
        </tbody>
    </table>
</body>

</html>