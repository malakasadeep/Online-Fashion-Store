<?php
        include_once 'header.php';
    ?>

<?php
include 'dbh.php';


$Invalid = "";
if (isset($_POST['btnlogin'])) {
    if (isset($_POST['btnlogin'])){

        $email = mysqli_real_escape_string($conn,$_POST['user_email']);
        $pass = mysqli_real_escape_string($conn,$_POST['user_password']);

        $select = mysqli_query($conn,"SELECT * from `user` WHERE email = '$email'
        AND password = '$pass'");

    if (mysqli_num_rows($select) > 0) {
        session_start();
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['id'];
        header('Location: dashboard.php');
        exit;
    } else {
        $Invalid = "Invalid Email or Password!";
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b3ca95fff7.js" crossorigin="anonymous"></script>
    <title>Bizen/Login page</title>
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

.fromebox {
    background-color: #333;
    padding: 20px;
    width: 45%;
    margin: 100px auto;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

.errorbox {
    color: red;
    text-align: center;
    margin-bottom: 10px;
}

.login {
    text-align: center;
    margin-bottom: 20px;
    color: #fff;
}

.form1 {
    display: flex;
    flex-direction: column;
}

.input {
    position: relative;
    margin-bottom: 20px;
}

.input i {
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translateY(-50%);
    color: #aaa;
}

.input input {
    width: 100%;
    padding: 10px 30px 10px 30px;
    border: none;
    background-color: #444;
    color: #fff;
    border-radius: 5px;
}

button {
    background-color: #555;
    color: #fff;
    border: none;
    padding: 10px 0;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #777;
}

.p1 {
    text-align: center;
}

.click {
    color: #fff;
    text-decoration: underline;
}

/* Animation */
@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.fromebox {
    animation: slideIn 0.5s ease;
}

footer {
    background-color: #333;
    color: #fff;
    padding: 20px 0;
    text-align: center;
    margin-top: auto; /* Push the footer to the bottom */
}

    </style>
</head>
<body>

    <div class = "fromebox">
    <p class = "errorbox"> <?php echo $Invalid?></p>
    <h1 class = "login">Log In</h1>

    <form class = "form1" method = "post" action = "login.php">

            <div class = "input">
            <i class="fa-solid fa-envelope"></i>
                <input type = "email" placeholder  = "Enter E-mail" name = "user_email">
            </div>

            
            <div class = "input">
            <i class="fa-solid fa-lock"></i>
                <input type = "password" placeholder  = "Enter password" id = "firstpas" name = "user_password">
            </div>

            <button  onclick = "btnclick ()" name = "btnlogin">Log In </button>

            <p class = "p1">Don't have an account? <a class = "click" href = "Sign_up.php">Sign Up</a></P>


    </div>

<?php
        include_once 'footer.php';
    ?>

</body>

</html>

