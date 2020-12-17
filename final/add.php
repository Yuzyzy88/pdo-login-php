<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/add.css">
    <title>Add</title>
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

    <div class="container box" style="top: 1%; padding:20px;">
        <form method="POST" action="#" enctype="multipart/form-data">
            <h1>Add Product</h1>
            <label class="text-muted">Name</label>
            <input type="text" name="car_name" value="" autofocus="" required>

            <label class="text-muted">Year</label>
            <input type="text" name="year" value="" required>

            <label class="text-muted">Brand</label>
            <input type="text" name="brand" value="" required>

            <label class="text-muted">Stock</label>
            <input type="text" name="stock" value="" required>

            <label class="text-muted">Price</label>
            <input type="text" name="price" value="" required>

            <label class="text-muted">Picture</label>
            <input type="file" name="picture" required>

            <button type="submit" name="submit" class="mt-5 btn-success">Add</button>
            <p class="text mt-4">previous page?<span><a href="home.php"> Back</a></span></p>
        </form>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        include('dbconn.php');
        // get value from input
        $car_name = $_POST['car_name'];
        $year = $_POST['year'];
        $brand = $_POST['brand'];
        $stock = $_POST['stock'];
        $price = $_POST['price'];
        $picture = $_FILES['picture']['name'];
not yet
        // first check if there is a product image 
        if ($picture != "") {
            $allow_pic = array('png', 'jpg');  // uploadable image file extension
            $x = explode('.', $picture); // separates filenames with uploaded extensions
            $extension = strtolower(end($x));
            $file_tmp = $_FILES['picture']['tmp_name'];
            $random_number = rand(1, 999);
            $new_pic_name = $random_number . '_' . $picture; // combines random numbers with actual file names

            if (in_array($extension, $allow_pic) === true) {
                move_uploaded_file($file_tmp, 'pic/' . $new_pic_name); // move the image file to the image folder
                // run an INSERT query to add data to the database make sure it is in order (id is not necessary because it is created automatically)
                $query = $conn->prepare("INSERT INTO car (picture, name, year, brand, stock, price) VALUES (:picture, :name, :year, :brand, :stock, :price)");
                $res = $query->execute([
                    'picture' =>  $new_pic_name,
                    'name' => $car_name,
                    'year' => $year,
                    'brand' => $brand,
                    'stock' => $stock,
                    'price' => $price,
                ]);
                echo "<script>alert('Adding success.');window.location='home.php';</script>";
            } else {
                echo "<script>alert('Extension jpg and png only.');window.location='add.php';</script>";
            }
        } else {
            $query = $conn->prepare("INSERT INTO car (picture, name, year, brand, stock, price) VALUES (null, '$car_name', '$year', '$brand', '$stock', '$price')");
            $query->execute(PDO::FETCH_ASSOC);
            echo "<script>alert('Data added');window.location='index.php';</script>";
        }
    }

    ?>

</body>

</html>