<?php
        include_once 'header2.php';
    ?>
<?php
session_start();
include '../dbh.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}


if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    
    if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['phone']) && isset($_POST['email'])) {
        // Sanitize and validate user inputs
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // Update user details in the database
        $query = "UPDATE `user` SET fname = '$fname', lname = '$lname', phone = '$phone', email = '$email', password = '$password' WHERE id = $userId";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo '<script type="text/javascript">
        window.onload = function () { alert("Account Updated !"); 
            window.location.href = "view.php";}
        </script>'; // Redirect back to the dashboard after successful update
            exit;
        }
    }
}
?>

<?php
        
        include '../dbh.php';

        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];

            // Retrieve user details from the database
            $query = "SELECT * FROM `user` WHERE id = $userId";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);
            }
        }
        ?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" type="text/css" href="dashboard-style.css"> <!-- You can reuse the CSS from the dashboard -->
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    position: relative;
    top: 100px;
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    margin-bottom: 200px;
    z-index: 0;
}

h1 {
    font-size: 28px;
    color: #333;
    text-align: center;
    margin-bottom: 20px;
}

form {
    text-align: center;
}

label {
    display: block;
    font-size: 18px;
    margin-top: 20px;
    color: #333;
}

input {
    width: 90%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

button {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    margin-top: 20px;
    cursor: pointer;
    font-size: 18px;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

/* Styling for individual form fields */
#fname {
    background-color: #f9f9f9;
}

#lname {
    background-color: #f9f9f9;
}

#phone {
    background-color: #f9f9f9;
}

#email {
    background-color: #f9f9f9;
}

#fname:focus, #lname:focus, #phone:focus, #email:focus {
    background-color: #fff;
    border: 1px solid #007bff;
    outline: none;
}

/* Optional: Add a background image or texture */
body {
    background-image: url('./2148663109.jpg');
    background-size: cover;
    background-repeat: no-repeat;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Your Profile</h1>

        <!-- Add a form to edit user details -->
        <form method="post" action="update.php">
            <!-- Input fields for editing user details with values from the database -->
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" value="<?php echo $user['fname']; ?>" required>

            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" value="<?php echo $user['lname']; ?>" required>

            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" value="<?php echo $user['phone']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>

            <label for="email">Password:</label>
            <input type="pass" id="email" name="password" value="<?php echo $user['password']; ?>" required>

            <button type="submit" class="btn">Save Changes</button>
        </form>
    </div>
    <?php
        include_once 'footer.php';
    ?>
</body>
</html>
