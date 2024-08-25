<?php
// getData.php

include 'db.php';

if (isset($_POST['search']) && isset($_POST['category'])) {
    $search = $_POST['search'];
    $category = $_POST['category'];

    // Use a prepared statement to avoid SQL injection
    // The $category variable will be used to choose the correct table based on the category (Movies, Animes, Dramas)
    $sql = "SELECT name, image, file_name FROM $category WHERE name LIKE ?"; // Adjust the query to your database schema
    $stmt = $conn->prepare($sql);

    // Bind the search parameter with wildcards to search for partial matches
    $stmt->bindValue(1, '%' . $search . '%', PDO::PARAM_STR);

    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Generate the movie card elements based on the fetched data
    $output = '';
    foreach ($data as $row) {
        $output .= '
        <div class="col-lg-3 col-md-6 mb-4">
            <img class="movie-image card-img-top" src="Flexify Images/' . $row['image'] . '" alt="">
            <div class="card-body">
                <a href="#p1">
                    <!-- Movie / Video  -->
                    <div class="card-title" vidUrl="videos/' . $row['file_name'] . '" type="video/mp4">
                        <!-- Movie Name -->
                        <span id="name">' . $row['name'] . '</span><br>
                        <!-- Additional movie information can be added here -->
                    </div>
                </a>
            </div>  
        </div>';
    }
    

    // If there are no results, show a message
    if (empty($data)) {
        $output = '<div class="col-12">No results found.</div>';
    }

    echo $output;
}
?>
