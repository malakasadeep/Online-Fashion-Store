<?php
        include_once 'header2.php';
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-image: url('./2147915820.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            background-color: #000;
            margin: 0;
            padding: 0;
            color: #fff;
        }

        h1 {
            text-align: center;
            margin: 100px 0;
            background-color: #000;
            width: 60%;
            height: 50px;
            border-radius: 8px;
            margin-left: 270px;
            padding-top: 10px;
            font-size: 24px;
        }

        .contact-form {
            width: 70%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #333;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            margin-bottom: 200px;
        }

        .contact-form:hover {
            transform: translateY(-5px);
        }

        .form-group {
            margin: 10px 0;
        }

        label {
            display: block;
            font-weight: bold;
            color: #fff;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        textarea {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #444;
            border-radius: 4px;
            font-size: 16px;
            background-color: #555;
            color: #fff;
            transition: border-color 0.3s ease, background-color 0.3s ease, color 0.3s ease;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus {
            border-color: #007bff;
            background-color: #666;
            color: #fff;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <h1>Contact Us</h1>

    <div class="contact-form">
        <form action="contactUs.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="daye">Date:</label>
                <input type="date" id="date" name="date" required min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>">
            </div>

            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>
            </div>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>

    

    <?php
        include_once 'footer.php';
    ?>
</body>
</html>


<?php
include '../dbh.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $msg = $_POST['message'];
    

    $sql = "INSERT INTO `contact` (`name`,`email`,`date`,`message`)
    VALUES('$name', '$email', '$date', '$msg')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script type="text/javascript">
        window.onload = function () { alert("Data Inserted !"); 
            window.location.href = "viewc.php";}
        </script>';
    } else {
        echo "Failed";
    }
}
?>