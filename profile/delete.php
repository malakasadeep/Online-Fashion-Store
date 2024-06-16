<?php
session_start();
include '../dbh.php';

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    // Perform the deletion of the user's profile (this is a critical operation)
    $query = "DELETE FROM `user` WHERE id = $userId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Successful deletion, log the user out and redirect to a confirmation page
        session_destroy();
        echo '<script type="text/javascript">
        window.onload = function () { alert("Account Deleted !"); 
            window.location.href = "../index.html";}
        </script>';
        exit;
    }
}
?>
