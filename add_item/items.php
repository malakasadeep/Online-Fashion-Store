<?php
        include_once 'header2.php';
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Item List</title>
    <style>
        /* Reset default browser styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            background-image: url('./itembg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s;
            width: 300px;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .card-body {
            padding: 20px;
        }

        .card-body img {
            display: block;
            max-width: 100%;
            height: auto;
            margin: 0 auto 20px;
            border-radius: 5px;
        }

        .card-body h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .card-body p {
            font-size: 18px;
            color: #666;
            margin-bottom: 10px;
        }

        .card-footer {
            padding: 10px;
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            margin: 5px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn.delete {
            background-color: red;
        }
    </style>
</head>
<body>
    <a href="../dashboard.php" class="btn">Home</a>
    <h1 style="text-align: center;">Item List</h1>
    <div class="container">
        <?php
            // Replace with your database connection script
            include '../dbh.php';

            // Fetch items from the database
            $query = "SELECT * FROM item";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="card">';
                echo '<div class="card-header">' . $row['code'] . '</div>';
                echo '<div class="card-body">';
                echo '<img src="' . $row['img'] . '" alt="Item Image">';
                echo '<h3>' . $row['name'] . '</h3>';
                echo '<p>$' . $row['price'] . '</p>';
                echo '<p>' . $row['discription'] . '</p>';
                echo '</div>';
                echo '<div class="card-footer">';
                echo '<a href="update.php?id=' . $row['itemId'] . '" class="btn">Update</a>';
                echo '<a href="delete.php?id=' . $row['itemId'] . '" class="btn delete">Delete</a>';
                echo '</div>';
                echo '</div>';
            }

            mysqli_close($conn);
        ?>
    </div>
    <?php
        include_once 'footer.php';
    ?>
</body>
</html>
