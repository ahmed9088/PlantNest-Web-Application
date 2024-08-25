<?php
session_start();
if (!isset($_SESSION['profile'])) {
    header('location: login.php');
}

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
$queryUserData = "SELECT * FROM dramas";
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


<!-- Rest of the HTML code -->

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

        <title>Admin Dashboard Panel</title>
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
                    <span class="text">Dramas</span>
                </div>
                <!-- Table to display the data -->
                <table class="table table-dark table-striped-columns">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">File Name</th>
                            <th scope="col">Released</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row): ?>
                            <tr>
                                <td>
                                    <?php echo isset($row['name']) ? $row['name'] : 'N/A'; ?>
                                </td>
                                <td>
                                    <?php echo isset($row['file_name']) ? $row['file_name'] : 'N/A'; ?>
                                </td>
                                <td>
                                    <?php echo isset($row['Year']) ? $row['Year'] : 'N/A'; ?>
                                </td>
                                <td>
                                    <?php echo isset($row['image']) ? $row['image'] : 'N/A'; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        </section>

        <script src="script.js"></script>
    </body>

    </html>