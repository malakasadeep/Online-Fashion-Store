<?php
// Include your database connection script (e.g., dbh.php)
include '../dbh.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the item data before deleting (optional, for confirmation)
    $query = "SELECT * FROM carddetails WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $item_data = mysqli_fetch_assoc($result);

    if ($item_data) {
        // Perform the item deletion
        $delete_query = "DELETE FROM carddetails WHERE id = $id";

        if (mysqli_query($conn, $delete_query)) {
            // Item deleted successfully
            echo '<script type="text/javascript">
        window.onload = function () { alert("Card Deleted !"); 
            window.location.href = "viewcards.php";}
        </script>'; // Redirect to a success page
            exit;
        } else {
            // Database deletion failed
            header('Location: delete_error.php'); // Redirect to an error page
            exit;
        }
    } else {
        // Item not found
        header('Location: delete_error.php'); // Redirect to an error page
        exit;
    }
} else {
    // Invalid request
    header('Location: delete_error.php'); // Redirect to an error page
    exit;
}
?>
