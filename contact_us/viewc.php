<?php
        include_once 'header2.php';
    ?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Details</title>
    <style>
        /* Reset default browser styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #333;
            width: 50%;
            height: 100px;
            text-align: center;
            margin: 20px auto;
            border-radius: 8px;
            font-size: 50px;
            line-height: 100px;
            margin-top: 100px;
        }

        table {
            width: 70%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #111;
            border: 1px solid #333;
            border-radius: 8px;
        }

        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #222;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        table a {
            display: inline-block;
            padding: 8px 16px;
            margin: 5px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        table a:hover   {
            background-color: #0056b3;
        }

         h1 a{
            display: flexbox;
            padding: 0px ;
            margin-left: 300px;
            width: 100px;
            height: 80px;
            font-size: 30px;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

          h1 a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Contact Details<a href="./contactUs.php">Add</a></h1> 
    
    
    <table>
        <tr>
            
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date</th>
            <th>Message</th>
            <th>Actions</th>
        </tr>
        <?php
        // Include your database connection script (e.g., dbh.php)
        include '../dbh.php';

        // Fetch data from the database
        $query = "SELECT * FROM contact";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['date'] . '</td>';
            echo '<td>' . $row['message'] . '</td>';
            echo '<td>
                    <a href="updatec.php?id=' . $row['id'] . '">Update</a> |
                    <a href="deletec.php?id=' . $row['id'] . '">Delete</a>
                  </td>';
            echo '</tr>';
        }
        ?>
    </table>
</body>
<?php
        include_once 'footer.php';
    ?>
</html>
