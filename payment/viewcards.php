<?php
        include_once 'header2.php';
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Card Details</title>
    <style>
        /* Reset default browser styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #333; /* Dark background color */
            color: #fff; /* White text */
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #555; /* Dark orange background */
            width: 50%;
            height: 100px;
            text-align: center;
            margin: 20px 0;
            color: #fff;
            margin-left: 350px;
            border-radius: 8px;
            font-size: 50px;
            margin-top: 100px;
        }

        table {
            width: 70%;
            border-collapse: collapse;
            margin: 20px 0;
            margin-left: 200px;
            background-color: #444; /* Dark gray background for table */
            color: #fff; /* White text */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #555; /* Darker gray for even rows */
        }

        th {
            background-color: #666; /* Dark gray background for table headers */
            color: #fff;
        }

        table a {
            display: inline-block;
            padding: 8px 16px;
            margin: 5px;
            background-color: #ff0000; /* Red background for links */
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        table a:hover {
            text-decoration: underline;
        }
        h1 a{
            display: flexbox;
            padding: 0px ;
            margin-left: 400px;
            width: 100px;
            height: 80px;
            padding: 10px;
            font-size: 30px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

          h1 a:hover {
            background-color: #0056b3;
        }

        /* Optional: Add a background image or texture */
        body {
            background-image: url('./2148665581.jpg') !important;
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
    <h1>Card Details <a href="./addcard.php">Add</a></h1>
    
    <table>
        <tr>
            <th>Card No</th>
            <th>Card Holder</th>
            <th>Exp Date</th>
            <th>CVV</th>
            <th>Actions</th>
        </tr>
        <?php
        // Include your database connection script (e.g., dbh.php)
        include '../dbh.php';

        // Fetch data from the database
        $query = "SELECT * FROM carddetails";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['cardno'] . '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['year'] . ' / ' . $row['month'] . '</td>';
            echo '<td>' . $row['cvv'] . '</td>';
            echo '<td>
                    <a href="updatecard.php?id=' . $row['id'] . '">Update</a> |
                    <a href="deletecard.php?id=' . $row['id'] . '">Delete</a>
                  </td>';
            echo '</tr>';
        }
        ?>
    </table>
    <?php
        include_once 'footer.php';
    ?>
</body>
</html>
