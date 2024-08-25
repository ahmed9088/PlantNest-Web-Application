<?php
session_start();
// if (!isset($_SESSION['profile'])) {
//     header('location: login.php');
// }

// Include the database connection file
include 'conn.php';

// Retrieve the data for the currently logged-in user from the database
$query = "SELECT * FROM plantnest"; // Add quotes around the name value
$result = mysqli_query($conn, $query); // Replace $your_db_connection with your actual database connection variable

// Check if the query was successful and if there's data for the logged-in user
if ($result && mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
}

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

// Query to count the total number of plant
$queryTotalplants = "SELECT COUNT(*) as total_plants FROM plants";
$resultTotalplants = mysqli_query($conn, $queryTotalplants);
$totalplants = 0; // Default value

// Check if the query was successful and data was retrieved
if ($resultTotalplants && mysqli_num_rows($resultTotalplants) > 0) {
    // Fetch the count as an associative array
    $rowTotalplants = mysqli_fetch_assoc($resultTotalplants);
    $totalplants = $rowTotalplants['total_plants'];
}

$queryTotalaccessories= "SELECT COUNT(*) as total_accessories FROM accessories";
$resultTotalaccessories = mysqli_query($conn, $queryTotalaccessories);
$totalaccessories = 0; // Default value

// Check if the query was successful and data was retrieved
if ($resultTotalaccessories && mysqli_num_rows($resultTotalaccessories) > 0) {
    // Fetch the count as an associative array
    $rowTotalaccessories = mysqli_fetch_assoc($resultTotalaccessories);
    $totalaccessories = $rowTotalaccessories['total_accessories'];
}
$queryTotalteam= "SELECT COUNT(*) as total_team FROM experts";
$resultTotalteam = mysqli_query($conn, $queryTotalteam);
$totalteam = 0; // Default value

// Check if the query was successful and data was retrieved
if ($resultTotalteam && mysqli_num_rows($resultTotalteam) > 0) {
    // Fetch the count as an associative array
    $rowTotalteam = mysqli_fetch_assoc($resultTotalteam);
    $totalteam = $rowTotalteam['total_team'];
}

// Retrieve the data for the currently logged-in user from the database
$queryUserData = "SELECT * FROM users";
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
                    <img src="Plant Images\logo lg (2).png" alt="">
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
                    <!-- plant link -->
                    <li <?php echo basename($_SERVER['PHP_SELF']) === 'admin-plant.php' ? 'class="active"' : ''; ?>>
                        <a href="admin-plant.php">
                            <i class="uil uil-clapper-board"></i>
                            <span class="link-name">Plants</span>
                        </a>
                    </li>
                    <!-- Animes link -->
                    <li <?php echo basename($_SERVER['PHP_SELF']) === 'admin-accessories.php' ? 'class="active"' : ''; ?>>
                        <a href="admin-category.php">
                            <i class="uil uil-video"></i>
                            <span class="link-name">Catrgories</span>
                        </a>
                    </li>
                    <!-- Dramas link -->
                    <li <?php echo basename($_SERVER['PHP_SELF']) === 'admin-team.php' ? 'class="active"' : ''; ?>>
                        <a href="admin-team.php">
                            <i class="uil uil-flower"></i>
                            <span class="link-name">Spices</span>
                        </a>
                    </li>
                </ul>

                <ul class="logout-mode">
                    <li class="mode">
                        <a href="logout.php">
                            <i class="uil uil-moon"></i>
                            <span class="link-name">Dark Mode</span>
                        </a>
                        <div class="mode-toggle">
                            <span class="switch"> Logout</span>
                        </div>
                    </li>
                </ul>
                <script>
                    
                </script>
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
                            <span class="text">Total Plants</span>
                            <span class="number">
                                <?php echo $totalplants; ?>
                            </span>
                        </div>
                        <div class="box box3">
                            <i class="uil uil-video"></i>
                            <span class="text">Catogories</span>
                            <span class="number">
                            <?php echo $totalaccessories; ?>
                              
                            </span>
                        </div>
                        <div class="box box4">
                            <i class="uil uil-image-broken"></i>
                            <span class="text">Experts</span>
                            <span class="number">
                            <?php echo $totalteam; ?>
                              
                            </span>
                        </div>
                    </div>
                </div>

                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Profiles</span>
                </div>
                <!-- Table to display the data -->
                <table class="table table-dark table-striped-columns">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Joined</th>
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
                                    <?php echo isset($row['email']) ? $row['email'] : 'N/A'; ?>
                                </td>
                                <td>
                                    <?php echo isset($row['joined']) ? $row['joined'] : 'N/A'; ?>
                                </td>
                                <td>
                                    <!-- Display the user's profile image -->
                                    <img id="profileimg" src="Profile Images/<?php echo $row['Image']; ?>"
                                        alt="Profile Picture">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        </section>

        <script src="admin.js"></script>
    </body>

    </html>