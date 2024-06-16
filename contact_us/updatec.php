<?php
        include_once 'header2.php';
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Contact</title>
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
    color: #ffffff;
    margin-top: 100px;
}

form {
    width: 70%;
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 100px;
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
input[type="date"],
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
    background-image: url('./2147915820.jpg');
    background-size: cover;
    background-repeat: no-repeat;
}

    </style>
</head>
<body>
    <h1>Update Contact</h1>

    <?php
    // Include your database connection script (e.g., dbh.php)
    include '../dbh.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        $id = $_GET['id'];

        // Fetch the specific feedback entry from the database
        $query = "SELECT * FROM contact WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            echo '<form action="updatec.php" method="post">
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
                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" value="' . $row['date'] . '" required>
                </div>

                

                <div class="form-group">
                    <label for="comments">Message:</label>
                    <textarea id="comments" name="message" rows="4" required>' . $row['message'] . '</textarea>
                </div>

                <button type="submit" name ="submit">Update </button>
            </form>';
        } else {
            echo 'Feedback entry not found.';
        }
    }
    ?>
    <script>
        // Get today's date in YYYY-MM-DD format
        var today = new Date().toISOString().split('T')[0];

        // Set the max attribute of the date input field to today's date
        document.getElementById("date").setAttribute("max", today);

        // Add event listener to validate the selected date
        document.getElementById("date").addEventListener("change", function() {
            var selectedDate = this.value;
            if (selectedDate !== today) {
                document.getElementById("dateError").innerText = "Please select today's date.";
                this.value = ''; // Clear the input field
            } else {
                document.getElementById("dateError").innerText = ""; // Clear error message
            }
        });
    </script>
</body>
<?php
        include_once 'footer.php';
    ?>
</html>

<?php
include '../dbh.php';
if (isset($_POST['submit'])) {
    $id = $_POST['feedback_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $msg = $_POST['message'];
    

    $sql = "UPDATE contact SET name='$name', email='$email', date='$date', message='$msg' WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script type="text/javascript">
        window.onload = function () { alert("Data Updated !"); 
            window.location.href = "viewc.php";}
        </script>';
    } else {
        echo "Failed";
    }
}
?>
