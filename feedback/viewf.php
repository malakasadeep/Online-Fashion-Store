<?php
        include_once 'header2.php';
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Feedback Details</title>
    <style>
        /* Reset default browser styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

       .container body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

       .container h1 {
            background-color: #333;
            width: 70%;
            height: 100px;
            text-align: center;
            margin: 20px auto;
            color: white;
            border-radius: 8px;
            font-size: 50px;
        }

        .container {

            width: 70%;
            margin: 100px auto;
            margin-bottom: 400PX;
            background-color: rgba(255, 255, 255, 0.4); /* Transparent white background */
            padding: 20px;
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #333;
            color: #fff;
        }

      .container  a {
            text-decoration: none;
            color: #007bff;
        }

       .container a {
            display: inline-block;
            padding: 8px 16px;
            margin: 5px;
            background-color: red;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

       .container a:hover {
            text-decoration: underline;
        }

        /* Optional: Add a background image or texture */
        body {
            background-image: url('./24508.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        h1 a{
            display: flexbox;
            padding: 0px ;
            margin-left: 100px;
            width: 100px;
            height: 50px;
            font-size: 30px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            padding: 10px;
        }

          h1 a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    
    
    <div class="container">
    <h1>Feedback Details <a href="./add.php">Add</a></h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Feedback Type</th>
                <th>Comment</th>
                <th>Actions</th>
            </tr>
            <?php
            // Include your database connection script (e.g., dbh.php)
            include '../dbh.php';

            // Fetch data from the database
            $query = "SELECT * FROM feedback";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['type'] . '</td>';
                echo '<td>' . $row['comment'] . '</td>';
                echo '<td>
                        <a href="updatef.php?id=' . $row['id'] . '">Update</a> |
                        <a href="delete.php?id=' . $row['id'] . '">Delete</a>
                    </td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>
</body>
<?php
        include_once 'footer.php';
    ?>
</html>
