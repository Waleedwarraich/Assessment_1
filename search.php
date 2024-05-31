<?php
// Include database connection
include "includes/header.inc";
?>
<main>
    <!--<h1>Search Hikes</h1>-->
    <!--<form action="search.php" method="GET">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search" placeholder="Enter name or description">
        <button type="submit">Search</button>
    </form>-->

    <?php
    // Include database connection
    include "includes/db_connect.inc"; ?>


    <div class="container-fluid">
        <?php
        if (isset($_GET['search'])) {
            // Get the search term and sanitize it
            $searchTerm = mysqli_real_escape_string($conn, $_GET['search']);

            // SQL query to search for hikes by name or description
            $sql = "SELECT * FROM hikes WHERE hikename LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%' OR level LIKE '%$searchTerm%'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<h2>Search Results:</h2>";
                echo "<div class='row'>";
                // Output each result
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='mb-2 col-md-6'>";
                    echo "<div class='card'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'><a href='details.php?id=" . $row['id'] . "'>" . $row['hikename'] . "</a></h5>";
                    echo "<p class='card-text'>" . $row['description'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
                echo "</div>";
            } else {
                echo "<p>No results found.</p>";
            }
        }
        ?>
    </div>

</main>
<?php include "includes/footer.inc" ?>
