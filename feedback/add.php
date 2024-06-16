<?php
        include_once 'header2.php';
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Feedback Form</title>
    <link rel="stylesheet" type="text/css" href="feedback-form-style.css">
    <style>
        
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

        .container {
            max-width: 1200px;
            margin: 100px auto;
            padding: 20px;
            display: flex;
            justify-content: space-between;
        }

        .form-container {
            flex: 1;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            margin-right: 20px;
        }

        h1 {
            background-color: #0056b3;
            width: 100%;
            height: 70px;
            margin: 20px 0;
            color: #fff;
            border-radius: 8px;
            text-align: center;
            font-size: 40px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 5px;
        }

        textarea {
            resize: vertical;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .image-container {
            flex: 1;
            text-align: center;
        }

        .image-container img {
            max-width: 100%;
            border-radius: 8px;
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
    
    <div class="container">
    
        <div class="form-container">
        <h1>Feedback Form</h1>
            <form action="add.php" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="feedback_type">Feedback Type:</label>
                    <select id="feedback_type" name="feedback_type" required>
                        <option value="compliment">Compliment</option>
                        <option value="suggestion">Suggestion</option>
                        <option value="complaint">Complaint</option>
                        <option value="question">Question</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="comments">Comments:</label>
                    <textarea id="comments" name="comments" rows="4" required></textarea>
                </div>

                <button type="submit" name="submit">Submit Feedback</button>
            </form>
        </div>
        <div class="image-container">
            <img src="ew.png" alt="Feedback Image">
        </div>
    </div>
</body>
<?php
        include_once 'footer.php';
    ?>
</html>


<?php
include '../dbh.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $type = $_POST['feedback_type'];
    $comm = $_POST['comments'];
    

    $sql = "INSERT INTO `feedback` (`name`,`email`,`type`,`comment`)
    VALUES('$name', '$email', '$type', '$comm')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script type="text/javascript">
        window.onload = function () { alert("Data Inserted !"); 
            window.location.href = "viewf.php";}
        </script>';
    } else {
        echo "Failed";
    }
}
?>
