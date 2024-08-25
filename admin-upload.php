<?php
session_start();
// if (!isset($_SESSION['profile'])) {
//     header('location: login.php');
// }

// Include the database connection file
include 'conn.php';

// Query to count the total number of registered users
$queryTotalUsers = "SELECT COUNT(*) as total_users FROM users";
$resultTotalUsers = mysqli_query($conn, $queryTotalUsers);
$totalUsers = 0; // Default value

// Check if the query was successful and data was retrieved
if ($resultTotalUsers && mysqli_num_rows($resultTotalUsers) > 0) {
    // Fetch the count as an associative array
    $rowTotalUsers = mysqli_fetch_assoc($resultTotalUsers);
    $totalUsers = $rowTotalUsers['total_users'];
}

// Query to count the total number of movies
$queryTotalMovies = "SELECT COUNT(*) as total_movies FROM movies";
$resultTotalMovies = mysqli_query($conn, $queryTotalMovies);
$totalMovies = 0; // Default value

// Check if the query was successful and data was retrieved
if ($resultTotalMovies && mysqli_num_rows($resultTotalMovies) > 0) {
    // Fetch the count as an associative array
    $rowTotalMovies = mysqli_fetch_assoc($resultTotalMovies);
    $totalMovies = $rowTotalMovies['total_movies'];
}

// Query to count the total number of animes
$queryTotalAnimes = "SELECT COUNT(*) as total_animes FROM animes";
$resultTotalAnimes = mysqli_query($conn, $queryTotalAnimes);
$totalAnimes = 0; // Default value

// Check if the query was successful and data was retrieved
if ($resultTotalAnimes && mysqli_num_rows($resultTotalAnimes) > 0) {
    // Fetch the count as an associative array
    $rowTotalAnimes = mysqli_fetch_assoc($resultTotalAnimes);
    $totalAnimes = $rowTotalAnimes['total_animes'];
}

// Query to count the total number of dramas
$queryTotalDramas = "SELECT COUNT(*) as total_dramas FROM dramas";
$resultTotalDramas = mysqli_query($conn, $queryTotalDramas);
$totalDramas = 0; // Default value

// Check if the query was successful and data was retrieved
if ($resultTotalDramas && mysqli_num_rows($resultTotalDramas) > 0) {
    // Fetch the count as an associative array
    $rowTotalDramas = mysqli_fetch_assoc($resultTotalDramas);
    $totalDramas = $rowTotalDramas['total_dramas'];
}

// Retrieve the data for the currently logged-in user from the database
$queryUserData = "SELECT * FROM movies";
$resultUserData = mysqli_query($conn, $queryUserData);

// Check if the query was successful and data was retrieved
if ($resultUserData && mysqli_num_rows($resultUserData) > 0) {
    // Fetch all rows as an array of associative arrays
    $data = mysqli_fetch_all($resultUserData, MYSQLI_ASSOC);
} else {
    // Handle the case when no data is found for the logged-in user
    $data = array(); // Initialize an empty array
}
?>


<style>
    .form-label0 {
        margin-left: 70px;
    }

    .form-label1 {
        margin-left: 140px;
    }

    .form-control1 {
        width: 250px;
        border-radius: 5px;

    }

    .form-control2 {
        width: 250px;
        margin-left: 50px;
        margin-bottom: 10px;
        border-radius: 5px;

    }
</style>



<div class="activity-data">


    <!DOCTYPE html>
    <!-- Coding By CodingNepal - codingnepalweb.com -->
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!----======== CSS ======== -->
        <link rel="stylesheet" href="admin.css">

        <!----======== CSS ======== -->
        <script src="admin.js"></script>

        <!----===== Iconscout CSS ===== -->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

        <!----===== Bootstrap ===== -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
            crossorigin="anonymous"></script>

        <title>Flexify Admin Panel</title>
    </head>

    <body>
        <nav>
            <div class="logo-name">
                <div class="logo-image">
                <img src="Flexify Images/logo.jpeg" alt="">
                </div>

            </div>

            <div class="menu-items">
                <ul class="nav-links">
                    <!-- Dashboard link -->
                    <li <?php echo basename($_SERVER['PHP_SELF']) === 'admin.php' ? 'class="active"' : ''; ?>>
                        <a href="admin.php">
                            <i class="uil uil-estate"></i>
                            <span class="link-name">Dashboard</span>
                        </a>
                    </li>
                    <!-- Content link -->
                    <li <?php echo basename($_SERVER['PHP_SELF']) === 'admin-upload.php' ? 'class="active"' : ''; ?>>
                        <a href="admin-upload.php">
                            <i class="uil uil-upload"></i>
                            <span class="link-name">Upload</span>
                        </a>
                    </li>
                    <!-- Analytics link -->
                    <li <?php echo basename($_SERVER['PHP_SELF']) === '#' ? 'class="active"' : ''; ?>>
                        <a href="#">
                            <i class="uil uil-chart"></i>
                            <span class="link-name">Analytics</span>
                        </a>
                    </li>
                    <!-- Movies link -->
                    <li <?php echo basename($_SERVER['PHP_SELF']) === 'admin-movies.php' ? 'class="active"' : ''; ?>>
                        <a href="admin-movies.php">
                            <i class="uil uil-clapper-board"></i>
                            <span class="link-name">Movies</span>
                        </a>
                    </li>
                    <!-- Animes link -->
                    <li <?php echo basename($_SERVER['PHP_SELF']) === 'admin-animes.php' ? 'class="active"' : ''; ?>>
                        <a href="admin-animes.php">
                            <i class="uil uil-video"></i>
                            <span class="link-name">Animes</span>
                        </a>
                    </li>
                    <!-- Dramas link -->
                    <li <?php echo basename($_SERVER['PHP_SELF']) === 'admin-dramas.php' ? 'class="active"' : ''; ?>>
                        <a href="admin-dramas.php">
                            <i class="uil uil-image-broken"></i>
                            <span class="link-name">Dramas</span>
                        </a>
                    </li>
                </ul>

                <ul class="logout-mode">
                    <li><a href="#">
                            <i class="uil uil-signout"></i>
                            <span class="link-name">Logout</span>
                        </a></li>

                    <li class="mode">
                        <a href="#">
                            <i class="uil uil-moon"></i>
                            <span class="link-name">Dark Mode</span>
                        </a>

                        <div class="mode-toggle">
                            <span class="switch"></span>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <section class="dashboard">
            <div class="top">
                <i class="uil uil-bars sidebar-toggle"></i>

                <div class="search-box">
                    <i class="uil uil-search"></i>
                    <input type="text" placeholder="Search here...">
                </div>

                <!--<img src="images/profile.jpg" alt="">-->
            </div>

            <div class="dash-content">
                <div class="overview">
                    <div class="title">
                        <i class="uil uil-tachometer-fast-alt"></i>
                        <span class="text">Dashboard</span>
                    </div>

                    <div class="boxes">
                        <div class="box box1">
                            <i class="uil uil-user-plus"></i>
                            <span class="text">Total Users</span>
                            <span class="number">
                                <?php echo $totalUsers; ?>
                            </span>
                        </div>
                        <div class="box box2">
                            <i class="uil uil-clapper-board"></i>
                            <span class="text">Movies</span>
                            <span class="number">
                                <?php echo $totalMovies; ?>
                            </span>
                        </div>
                        <div class="box box3">
                            <i class="uil uil-video"></i>
                            <span class="text">Animes</span>
                            <span class="number">
                                <?php echo $totalAnimes; ?>
                            </span>
                        </div>
                        <div class="box box4">
                            <i class="uil uil-image-broken"></i>
                            <span class="text">Dramas</span>
                            <span class="number">
                                <?php echo $totalDramas; ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Movies</span>
                </div>


                <form style="width: 1100px; margin:0 auto; border: 6px solid black; padding: 20px; border-radius: 20px;"
                    method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Video name</label>
                        <input type="text" class="form-control" name="videoname" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label0">Video Quality</label>
                        <input type="text" class="form-control1" name="videoquality" id="exampleInputEmail1"
                            aria-describedby="emailHelp">


                        <label for="exampleInputEmail1" class="form-label1">Video Year</label>

                        <input type="text" class="form-control2" name="videoyear" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Image file</label>
                        <input type="file" name="imagefile" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Video file</label>
                        <input type="file" name="videofile" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Select Table</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="tableSelection">
                            <option value="animes">Animes</option>
                            <option value="movies">Movies</option>
                            <option value="dramas">Dramas</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>



                <?php
                $uploadSuccess = false;

                if (isset($_POST['submit'])) {
                    $table = $_POST['tableSelection']; // Get the selected table name from the dropdown
                    $name = $_POST['videoname'];
                    $quality = $_POST['videoquality'];
                    $year = $_POST['videoyear'];
                    $imagename = basename($_FILES['imagefile']['name']);
                    $videoname = basename($_FILES['videofile']['name']);
                    $imageTarget = "images/";
                    $videoTarget = "videos/";
                    $imageTargetFilePath = $imageTarget . $imagename;
                    $videoTargetFilePath = $videoTarget . $videoname;

                    try {
                        if (move_uploaded_file($_FILES['videofile']['tmp_name'], $videoTargetFilePath)) {
                            if (move_uploaded_file($_FILES['imagefile']['tmp_name'], $imageTargetFilePath)) {
                                $videoname = mysqli_real_escape_string($conn, $videoname);
                                $sql = "INSERT INTO $table (name, image, file_name, Quality, Year) VALUES ('$name', '$imagename', '$videoname', '$quality', '$year')";
                                mysqli_query($conn, $sql);

                                // Set the flag to indicate successful upload and insertion
                                $uploadSuccess = true;
                            }
                        }
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                }
                ?>


                <script src="script.js"></script>


                <!-- The Modal -->
                <div class="modal fade" id="successModal" tabindex="-1" role="dialog"
                    aria-labelledby="successModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="successModalLabel">Success!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Your files have been uploaded and saved successfully!</p>
                                <p>Image file: <span id="modalImageName"></span></p>
                                <p>Video file: <span id="modalVideoName"></span></p>
                            </div>
                        </div>
                    </div>
                </div>



                <script>
                    // Update the modal content with the image and video filenames
                    document.getElementById("modalImageName").textContent = imageName;
                    document.getElementById("modalVideoName").textContent = videoName;
                </script>
                <script>
                    <?php if ($uploadSuccess): ?>
                        // Show the success modal
                        $(document).ready(function () {
                            $('#successModal').modal('show');
                        });
                    <?php endif; ?>
                </script>


    </body>

    </html>