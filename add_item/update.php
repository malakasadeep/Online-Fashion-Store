
<?php
        include_once 'header2.php';
    ?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Item</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            background-image: url('./2148870795.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            
        }

        h1 {
            text-align: center;
            margin-top: 100px;
            color: #fff;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #444;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #aaa;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 90%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
            
        }

        input[type="file"] {
            margin-bottom: 20px;
        }

        textarea {
            resize: none;
        }

        button[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #555;
            color: #fff;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #777;
        }
    </style>
</head>

<body>
    <h1>Update Item</h1>

    <?php
    // Include your database connection script (e.g., dbh.php)
    include '../dbh.php';

    if (isset($_GET['id'])) {
        $item_id = $_GET['id'];

        // Fetch item details from the database
        $query = "SELECT * FROM item WHERE itemId = $item_id";
        $result = mysqli_query($conn, $query);

        if ($row = mysqli_fetch_assoc($result)) {
            echo '<form action="update.php" method="post" enctype="multipart/form-data">';
            echo '<input type="hidden" name="item_id" value="' . $item_id . '">';

            echo '<label for="item_name">Item Code:</label>';
            echo '<input type="text" id="item_name" name="item_code" value="' . $row['code'] . '" required>';

            echo '<label for="item_name">Item Name:</label>';
            echo '<input type="text" id="item_name" name="item_name" value="' . $row['name'] . '" required>';

            echo '<label for="item_price">Price (USD):</label>';
            echo '<input type="number" id="item_price" name="item_price" value="' . $row['price'] . '" step="0.01" required>';

            echo '<label for="item_description">Description:</label>';
            echo '<textarea id="item_description" name="item_description" rows="4" required>' . $row['discription'] . '</textarea>';

            echo '<label for="item_image">Item Image:</label>';
            echo '<input type="file" id="item_image" name="item_image" accept="image/*">';

            echo '<button type="submit">Update Item</button>';
            echo '</form>';
        } else {
            echo '<p>Item not found.</p>';
        }
    } else {
        echo '<p>Item ID not provided.</p>';
    }

    mysqli_close($conn);
    ?>
    <?php
        include_once 'footer.php';
    ?>
</body>

</html>

<?php
// Include your database connection script (e.g., dbh.php)
include '../dbh.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['item_id'], $_POST['item_name'], $_POST['item_price'], $_POST['item_description'])) {
        $item_id = $_POST['item_id'];
        $item_code = mysqli_real_escape_string($conn, $_POST['item_code']);
        $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
        $item_price = floatval($_POST['item_price']);
        $item_description = mysqli_real_escape_string($conn, $_POST['item_description']);

        // Check if a new image has been uploaded
        if (isset($_FILES['item_image']) && $_FILES['item_image']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['item_image'];

            if (getimagesize($file['tmp_name'])) {
                // Generate a unique filename
                $image_filename = uniqid() . '_' . $file['name'];

                // Define the upload path
                $upload_path = 'uploads/' . $image_filename; // Change 'uploads/' to your desired directory

                // Move the uploaded file to the specified directory
                if (move_uploaded_file($file['tmp_name'], $upload_path)) {
                    // Update the item data with the new image path
                    $update_query = "UPDATE item SET code = '$item_code ', name = '$item_name', price = $item_price, discription = '$item_description', img = '$upload_path' WHERE itemId = $item_id";

                    if (mysqli_query($conn, $update_query)) {
                        // Item updated successfully
                        echo '<script type="text/javascript">
        window.onload = function () { alert("Item Updated !"); 
            window.location.href = "items.php";}
        </script>'; // Redirect to a success page
                        exit;
                    } else {
                        // Database update failed
                        header('Location: update_error.php'); // Redirect to an error page
                        exit;
                    }
                } else {
                    // File upload failed
                    header('Location: update_error.php'); // Redirect to an error page
                    exit;
                }
            } else {
                // The uploaded file is not an image
                header('Location: update_error.php'); // Redirect to an error page
                exit;
            }
        } else {
            // No new image uploaded, update other item data
            $update_query = "UPDATE item SET code = '$item_code ', name = '$item_name', price = $item_price, discription = '$item_description' WHERE itemId = $item_id";

            if (mysqli_query($conn, $update_query)) {
                // Item updated successfully
                echo '<script type="text/javascript">
        window.onload = function () { alert("Item Updated !"); 
            window.location.href = "items.php";}
        </script>'; // Redirect to a success page
                exit;
            } else {
                // Database update failed
                header('Location: update_error.php'); // Redirect to an error page
                exit;
            }
        }
    }
}
?>