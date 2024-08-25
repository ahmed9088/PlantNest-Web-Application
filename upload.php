<?php
// Include database connection
include 'plantdb.php';

// Process form data
if (isset($_POST['submit'])) {
    $table = $_POST['table'];
    $product = $_POST['product'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_path = $image; // Store images in a folder named 'images'

    move_uploaded_file($image_tmp, $image_path);

    $sql = "INSERT INTO $table (Product, product_description, product_image, price) 
            VALUES ('$product', '$description', '$image_path', '$price')";

    if ($conn->query($sql) === TRUE) {
        header("Location:  upload.php");
        exit();
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Image Upload Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .upload-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .upload-form h2 {
            margin: 0 0 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
        }

        select,
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            resize: vertical;
        }

        input[type="file"] {
            display: none;
        }


        .file-input-label {
            display: inline-block;
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .file-input-label:hover {
            background-color: #0056b3;
        }
        .image-preview {
            margin-top: 20px;
            text-align: center;
            width: 100%;
        }

        .image-preview img {
            width: 100%;
            max-height: 200px;
            margin-top: 10px;
        }
        .submit-btn {
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #218838;
        }
       .success-message {
            margin-top: 20px;
            text-align: center;
            color: #28a745;
            font-weight: bold;
            padding: 10px;
            border: 2px solid #28a745;
            border-radius: 4px;
            background-color: #d4edda;
        }
    </style>
</head>
<body>
<div class="upload-form">
        <h2>Image Upload Form</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="table">Select Table:</label>
                <select name="table" id="table">
                    <?php
                    // Include database connection
                    $conn = mysqli_connect('localhost', 'root', '', 'plantnest');

                    // Fetch table names from the database
                    $result = mysqli_query($conn, "SHOW TABLES");
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='{$row[0]}'>{$row[0]}</option>";
                    }

                    mysqli_close($conn);
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Product Image:</label>
                <label class="file-input-label" for="image">Choose Image</label>
                <input type="file" name="image" accept="image/*" id="image" required>
            </div>
           
            <div class="image-preview">
                <label for="image">Image Preview:</label>
                <img id="image-preview" src="#" alt="Image Preview" style="display: none;">
            </div>
            <div class="form-group">
                <label for="product">Product Name:</label>
                <input type="text" name="product" required>
            </div>
            <div class="form-group">
                <label for="description">Product Description:</label>
                <textarea name="description" rows="4" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="price">Product Price:</label>
                <input type="number" name="price" step="0.01" required>
            </div>
            <button class="submit-btn" type="submit" name="submit">Upload</button>
        </form>

        <?php
        // Display success message after successful insertion
        if (isset($_GET['success']) && $_GET['success'] == 'true') {
            echo '<div class="success-message">Record inserted successfully</div>';
        }
        ?>
    </div>

    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            const imagePreview = document.getElementById('image-preview');
            const selectedImage = event.target.files[0];
            
            if (selectedImage) {
                imagePreview.style.display = 'block';
                imagePreview.src = URL.createObjectURL(selectedImage);
            } else {
                imagePreview.style.display = 'none';
                imagePreview.src = '#';
            }
        });
    </script>