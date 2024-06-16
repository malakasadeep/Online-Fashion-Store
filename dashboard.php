<?php
        include_once 'header.php';
    ?>

<?php
session_start(); // Make sure to start the session
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Street Fashion</title>
    <style>
        /* Reset CSS */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #222;
    color: #fff;
}

.wrapper {
    display: flex;
}

.sidebar {
    margin-top: 90px;
    margin-bottom: 10px;
    margin-left: 100px;
    width: 100%; /* Adjust the width as needed */
    max-width: 500px; /* Limiting the maximum width */
    background-color: #333;
    padding-top: 20px;
    display: grid;
    border-radius: 30px;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); /* Two columns layout */
    grid-gap: 50px; /* Gap between cards */
}

.sidebar-item {
    /* Remove margin-bottom to prevent extra space */
    margin-bottom: 0;
}


.profile {
    text-align: center;
    margin-bottom: 20px;
}

.profile img {
    width: 100px;
    border-radius: 50%;
}

.profile h3 {
    margin-top: 10px;
    color: #fff;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    margin-bottom: 10px;
}

a {
    text-decoration: none;
    color: #fff;
    display: block;
    padding: 10px;
    transition: background-color 0.3s ease;
}

a:hover {
    background-color: #444;
}

.active a {
    background-color: #555;
}

.icon {
    margin-right: 10px;
}

.item {
    vertical-align: middle;
}

.content {
    margin-left: 250px;
    padding: 20px;
}

.card {
    background-color: #444;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    width: 400px;
}

.card img {
    width: 100%;
    border-radius: 10px;
}

.card-content {
    margin-top: 10px;
}

.card-content h3 {
    margin-bottom: 10px;
    color: #fff;
}

.card-content p {
    color: #aaa;
}

.sidebar-menu {
    list-style-type: none;
    padding: 0;
}

.sidebar-item {
    margin-bottom: 10px;
}

.card {
    background-color: #444;
    padding: 20px;
    border-radius: 10px;
    width: 200px;
    height: 150px;
    margin: 50px 10px 10px 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.card:hover {
    transform: scale(1.05);
}

.card-link {
    text-decoration: none;
    color: inherit;
}

.card-link:hover {
    color: inherit;
}

.icon {
    margin-right: 10px;
}

.card-content {
    display: flex;
    align-items: center;
}

.card-content h3 {
    margin: 0;
    color: #fff;
}

/* Additional styles for the image */
.image-container {
            flex: 1; /* Make the image container take up remaining space */
            display: flex;
            justify-content: center; /* Center the image horizontally */
            align-items: center; /* Center the image vertically */
        }

        .image-container img {
            max-width: 75%; /* Ensure the image doesn't exceed the container width */
            max-height: 75%; /* Ensure the image doesn't exceed the container height */
        }

    </style>
</head>

<body>

<div class="wrapper">
    <div class="sidebar">
        <div>
            <ul class="sidebar-menu">
            <li class="sidebar-item">
                <div class="card">
                    <a href="#" class="card-link">
                        <span class="icon"></span>
                        <div class="card-content">
                            <h3>Home</h3>
                        </div>
                    </a>
                </div>
            </li>

            <li class="sidebar-item">
                <div class="card">
                    <a href="add_item/add_items.php" class="card-link">
                        <span class="icon"></span>
                        <div class="card-content">
                            <h3>Add Items</h3>
                        </div>
                    </a>
                </div>
            </li>

            <li class="sidebar-item">
                <div class="card">
                    <a href="add_item/items.php" class="card-link">
                        <span class="icon"></span>
                        <div class="card-content">
                            <h3>View Items</h3>
                        </div>
                    </a>
                </div>
            </li>

            <li class="sidebar-item">
                <div class="card">
                    <a href="./payment/viewcards.php" class="card-link">
                        <span class="icon"></span>
                        <div class="card-content">
                            <h3>Add Payment</h3>
                        </div>
                    </a>
                </div>
            </li>
            </ul>
        </div>
        <div>
<ul>
            <li class="sidebar-item">
                <div class="card">
                    <a href="./feedback/viewf.php" class="card-link">
                        <span class="icon"></span>
                        <div class="card-content">
                            <h3>Add Feedback</h3>
                        </div>
                    </a>
                </div>
            </li>

            <li class="sidebar-item">
                <div class="card">
                    <a href="./contact_us/viewc.php" class="card-link">
                        <span class="icon"></span>
                        <div class="card-content">
                            <h3>Contact Us</h3>
                        </div>
                    </a>
                </div>
            </li>

            <li class="sidebar-item">
                <div class="card">
                    <a href="./profile/view.php" class="card-link">
                        <span class="icon"></span>
                        <div class="card-content">
                            <h3>My Profile</h3>
                        </div>
                    </a>
                </div>
            </li>
                <li class="sidebar-item">
                <div class="card">
                    <a href="logout.php" class="card-link">
                        <span class="icon"></span>
                        <div class="card-content">
                            <h3>Log Out</h3>
                        </div>
                    </a>
                </div>
            </li>
        </ul>
        </div>
    </div>
    <div class="image-container">
        <!-- Add your image here -->
        <img src="./image/qqq.png" alt="Image">
    </div>
</div>

<?php
        include_once 'footer.php';
    ?>
</body>

</html>