<?php
// Include the database connection file
include 'plantdb.php';

$errors = array();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the uploaded image
    $targetDir = "Expert Images/";
    $targetFile = basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // ... Rest of the image upload processing ...

    // If $uploadOk is set to 0 by an error, display an error message
    if ($uploadOk == 0) {
        $errors[] = "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";

            // Retrieve other expert details from the form
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $work = mysqli_real_escape_string($conn, $_POST['work']);

            // Insert the expert details into the database
            $sql = "INSERT INTO Experts (Image, Name, Work) VALUES ('$targetFile', '$name', '$work')";
            if (mysqli_query($conn, $sql)) {
                echo "Expert details inserted successfully.";
            } else {
                $errors[] = "Error: " . mysqli_error($conn);
            }
        } else {
            $errors[] = "Sorry, there was an error uploading your file.";
        }
    }
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Upload Expert</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            margin-top: 120px;
        }

        h2 {
            margin-top: 0;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
<div class="container">
        <h2>Upload Expert</h2>
        <!-- Display errors if any -->
        <?php if (!empty($errors)) { ?>
            <div style="color: red;">
                <?php foreach ($errors as $error) {
                    echo $error . "<br>";
                } ?>
            </div>
        <?php } ?>
        <form action="upload_expert.php" method="post" enctype="multipart/form-data">
            <label for="image">Select image to upload:</label>
            <input type="file" name="image" id="image">

            <label for="name">Expert Name:</label>
            <input type="text" name="name" id="name">

            <label for="work">Work Description:</label>
            <textarea name="work" id="work" rows="4"></textarea>

            <input type="submit" value="Upload Expert" name="submit">
        </form>
</body>

</html>
