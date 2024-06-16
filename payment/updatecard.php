<?php
        include_once 'header2.php';
    ?>
<?php
include '../dbh.php';
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $cardno = $_POST['cardno'];
    $holder = $_POST['holder'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $cvv = $_POST['cvv'];


    $sql = "UPDATE carddetails SET cardno='$cardno', name='$holder', month='$month' , year='$year', cvv='$cvv' WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script type="text/javascript">
        window.onload = function () { alert("Data Updated !"); 
            window.location.href = "viewcards.php";}
        </script>';
    } else {
        echo "Failed";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        h1 {
            background-color: #000;
            width: 50%;
            height: 70px;
            text-align: center;
            margin: 20px 0;
            color: white;
            margin-left: 350px;
            border-radius: 8px;
            font-size: 50px;
            margin-top: 100px;
        }

        .container {
            background-image: url('./2148670014.jpg');
            background-size: cover;
            background-repeat: no-repeat;

        }
    </style>

</head>

<body>

    <h1>Update Card Details</h1>

    <div class="container">

        <div class="card-container">

            <div class="front">
                <div class="image">
                    <img src="image/chip.png" alt="">
                    <img src="image/visa.png" alt="">
                </div>
                <div class="card-number-box">################</div>
                <div class="flexbox">
                    <div class="box">
                        <span>card holder</span>
                        <div class="card-holder-name">full name</div>
                    </div>
                    <div class="box">
                        <span>expires</span>
                        <div class="expiration">
                            <span class="exp-month">mm</span>
                            <span class="exp-year">yy</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="back">
                <div class="stripe"></div>
                <div class="box">
                    <span>cvv</span>
                    <div class="cvv-box"></div>
                    <img src="image/visa.png" alt="">
                </div>
            </div>

        </div>



        <?php
        // Include your database connection script (e.g., dbh.php)
        include '../dbh.php';

        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $id = $_GET['id'];

            // Fetch the specific feedback entry from the database
            $query = "SELECT * FROM carddetails WHERE id = $id";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);

            if ($row) {
                echo '<form action="updatecard.php" method="post">
            <div class="inputBox">
            <input type="hidden" name="id" value="' . $row['id'] . '">
                <span>card number</span>
                <input type="text" maxlength="16" minlength="16" pattern="[0-9/s]" title="Numbers only" class="card-number-input" name="cardno" value="' . $row['cardno'] . '">
            </div>
            <div class="inputBox">
                <span>card holder</span>
                <input type="text" class="card-holder-input" name="holder" value="' . $row['name'] . '">
            </div>
            <div class="flexbox">
            <div class="inputBox">
                <span>expiration mn</span>
                <input type="text" class="month-input" name="month" value="' . $row['month'] . '">
            </div>
                <div class="inputBox">
                    <span>expiration yy</span>
                    <input type="text" class="year-input" name="year" value="' . $row['year'] . '">
                </div>
                <div class="inputBox">
                    <span>cvv</span>
                    <input type="text" maxlength="3" minlength="3" pattern="[0-9/s]" title="Numbers only" class="cvv-input" name="cvv" value="' . $row['cvv'] . '">
                </div>
            </div>
            <input type="submit" value="submit" class="submit-btn" name="submit">
        </form>';
            } else {
                echo 'Feedback entry not found.';
            }
        }
        ?>

    </div>

    <?php
        include_once 'footer.php';
    ?>

</body>

</html>