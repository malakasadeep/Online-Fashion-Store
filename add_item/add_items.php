<?php
        include_once 'header2.php';
    ?>

<?php
// Include your database connection file (e.g., dbh.php)
include '../dbh.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize user inputs
    $item_code = mysqli_real_escape_string($conn, $_POST['item_code']);
    $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
    $item_price = floatval($_POST['item_price']);
    $item_description = mysqli_real_escape_string($conn, $_POST['item_description']);

    // Check if a file was uploaded
    if (isset($_FILES['item_image'])) {
        $file = $_FILES['item_image'];

        // Check if the file is an image
        if (getimagesize($file['tmp_name'])) {
            // Generate a unique filename
            $image_filename = uniqid() . '_' . $file['name'];

            // Define the upload path
            $upload_path = 'uploads/' . $image_filename; // Change 'uploads/' to your desired directory

            // Move the uploaded file to the specified directory
            if (move_uploaded_file($file['tmp_name'], $upload_path)) {
                // Insert the item data into the database
                $insert_query = "INSERT INTO item (code, name, price, discription, img) VALUES ('$item_code', '$item_name', $item_price, '$item_description', '$upload_path')";

                if (mysqli_query($conn, $insert_query)) {
                    // Item added successfully
                    echo '<script type="text/javascript">
        window.onload = function () { alert("Item Aded !"); 
            window.location.href = "items.php";}
        </script>'; // Redirect to a success page
                    exit;
                } else {
                    // Database insertion failed
                    header('Location: error_page.php'); // Redirect to an error page
                    exit;
                }
            } else {
                // File upload failed
                header('Location: error_page.php'); // Redirect to an error page
                exit;
            }
        } else {
            // The uploaded file is not an image
            header('Location: error_page.php'); // Redirect to an error page
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Item</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            background-image: url('./2148870795.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            margin-top: 100px;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
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
    <h1>Add New Fashion Item</h1>

    <form action="add_items.php" method="post" enctype="multipart/form-data">

        <label for="item_name">Item Code:</label>
        <input type="text" id="item_code" name="item_code" required>

        <label for="item_name">Item Name:</label>
        <input type="text" id="item_name" name="item_name" required>

        <label for="item_price">Price (USD):</label>
        <input type="number" id="item_price" name="item_price" step="0.01" required>

        <label for="item_description">Description:</label>
        <textarea id="item_description" name="item_description" rows="4" required></textarea>

        <label for="item_image">Item Image:</label>
        <input type="file" id="item_image" name="item_image" accept="image/*" required><br><br>

        <button type="submit">Add Item</button>
    </form>
    <?php
        include_once 'footer.php';
    ?>
</body>

</html>