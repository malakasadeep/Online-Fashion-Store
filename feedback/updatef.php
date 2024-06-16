<?php
        include_once 'header2.php';
    ?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Feedback</title>
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
}

h1 {
    text-align: center;
    margin: 20px 0;
    color: #fff;
    margin-top: 100PX;
}

form {
    width: 70%;
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 100PX;
}

.form-group {
    margin: 10px 0;
}

label {
    display: block;
    font-weight: bold;
    color: #333;
}

input[type="text"],
input[type="email"],
select,
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
}

textarea {
    resize: vertical;
}

button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

/* Optional: Add a background image or texture */
body {
    background-image: url('./2148663125.jpg');
    background-size: cover;
    background-repeat: no-repeat;
}

    </style>
</head>
<body>
    <h1>Update Feedback</h1>

    <?php
    // Include your database connection script (e.g., dbh.php)
    include '../dbh.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        $id = $_GET['id'];

        // Fetch the specific feedback entry from the database
        $query = "SELECT * FROM feedback WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            echo '<form action="updatef.php" method="post">
                <input type="hidden" name="feedback_id" value="' . $row['id'] . '">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="' . $row['name'] . '" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="' . $row['email'] . '" required>
                </div>

                <div class="form-group">
                    <label for="feedback_type">Feedback Type:</label>
                    <select id="feedback_type" name="feedback_type" required>
                        <option selected >' . $row['type'] . '</option>
                        <option value="compliment">Compliment</option>
                        <option value="suggestion">Suggestion</option>
                        <option value="complaint">Complaint</option>
                        <option value="question">Question</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="comments">Comments:</label>
                    <textarea id="comments" name="comments" rows="4" required>' . $row['comment'] . '</textarea>
                </div>

                <button type="submit" name ="submit">Update Feedback</button>
            </form>';
        } else {
            echo 'Feedback entry not found.';
        }
    }
    ?>

<?php
        include_once 'footer.php';
    ?>
</body>
</html>

<?php
include '../dbh.php';
if (isset($_POST['submit'])) {
    $id = $_POST['feedback_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $type = $_POST['feedback_type'];
    $comm = $_POST['comments'];
    

    $sql = "UPDATE feedback SET name='$name', email='$email', type='$type', comment='$comm' WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script type="text/javascript">
        window.onload = function () { alert("Data Updated !"); 
            window.location.href = "viewf.php";}
        </script>';
    } else {
        echo "Failed";
    }
}
?>
