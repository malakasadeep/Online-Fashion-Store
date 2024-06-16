<?php
        include_once 'header2.php';
    ?>

<?php
session_start(); // Make sure to start the session
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}


include '../dbh.php';

if (isset($_SESSION['user_id'])) {
    // Retrieve user details from the database based on the user's ID
    $userId = $_SESSION['user_id'];
    $query = "SELECT * FROM `user` WHERE id = $userId";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        // Now you can access user details like $user['fmname'], $user['lname'], etc.
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #222;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        .container {
            max-width: 1200px;
            margin: 100px auto;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .detailscon {
            background-color: #333;
            padding: 20px;
            border-radius: 8px;
            width: 45%;
        }

        .detailscon h1 {
            font-size: 32px;
            color: #fff;
            margin-bottom: 10px;
        }

        .detailscon p {
            font-size: 18px;
            color: #ccc;
            margin-bottom: 10px;
        }

        .btn-container {
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn.btn-delete {
            background-color: red;
        }

        .imgcon {
            width: 20%;
            height: 20%;
        }

        .imgcon img {
            
            border-radius: 8px;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="detailscon">
            <?php if (isset($user)) : ?>
                <h1>Welcome,<br> <?php echo $user['fname']; ?> <?php echo $user['lname']; ?></h1>
                <p>Email: <?php echo $user['email']; ?></p>
                <p>Phone: <?php echo $user['phone']; ?></p>
                <p>Password: <?php echo $user['password']; ?></p>
                <!-- Add more details here as needed -->
            <?php else : ?>
                <p>User not found or not logged in.</p>
            <?php endif; ?>
            <a href="logout.php">Logout</a><br><br>
            <div class="btn-container">
                <a class="btn" href="update.php">Edit Profile</a><br><br><br>
                <form method="post" action="delete.php">
                    <button class="btn btn-delete" type="submit" name="delete">Delete Profile</button>
                </form>
            </div>
        </div>
        <div class="imgcon">
            <img src="pro.png" alt="" height="600px">
        </div>
    </div>
    <?php
        include_once 'footer.php';
    ?>
</body>
</html>
