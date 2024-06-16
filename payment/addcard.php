<?php
        include_once 'header2.php';
    ?>
<?php
include '../dbh.php';
if (isset($_POST['submit'])) {
    $cardno = $_POST['cardno'];
    $name = $_POST['name'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $cvv = $_POST['cvv'];


    $sql = "INSERT INTO `carddetails` (`cardno`,`name`,`year`,`month`, `cvv`)
    VALUES('$cardno', '$name', '$month', '$year', '$cvv')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script type="text/javascript">
        window.onload = function () { alert("Card Aded !"); 
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
        .container {
            background-image: url('./2148670014.jpg');
            background-size: cover;
            background-repeat: no-repeat;

        }

        h1 {
            
            background-color: #333;
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
    </style>

</head>

<body>
    <h1>Add Card Details</h1>

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

        <form action="addcard.php" method="post">
            <div class="inputBox">
                <span>card number</span>
                <input type="text" maxlength="16" minlength="16" pattern="[0-9/s]" title="Numbers only" class="card-number-input" name="cardno">
            </div>
            <div class="inputBox">
                <span>card holder</span>
                <input type="text" class="card-holder-input" name="name">
            </div>
            <div class="flexbox">
                <div class="inputBox">
                    <span>expiration mn</span>
                    <select class="month-input" name="month">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>expiration yy</span>
                    <select class="year-input" name="year">
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>cvv</span>
                    <input type="text" maxlength="3" minlength="3" pattern="[0-9/s]" title="Numbers only" class="cvv-input" name="cvv">
                </div>
            </div>
            <input type="submit" value="submit" class="submit-btn" name="submit">
        </form>

    </div>
    <?php
        include_once 'footer.php';
    ?>
</body>

</html>