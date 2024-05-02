<!DOCTYPE html>
<html lang="en">

<?php include "includes/header.inc"?>
<main>
    <h1 id="hikesHeading">Victoria's Hiking Trails</h1>
    <p id="hikesPara">Whether seeking solace in solitude or the companionship of fellow hikers, Victoria's trails promise an unforgettable experience where the spirit of the land and the joy of hiking converge. Are you ready to explore?</p>

    <ul class="image-list">

        <?php
       $sql = "SELECT * FROM hikes";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<li>';
                echo '<div class="image-container">';
                echo '<img src="' . $row["image"] . '" alt="' . $row["hikename"] . '">';
                echo '<h2>' . $row["hikename"] . '</h2>';
                echo '<div class="overlay-text">';
                echo '<a href="details.php?id=' . $row["id"] . '">Explore more</a>';
                echo '</div>';
                echo '</div>';
                echo '</li>';
            }
        } else {
            echo "<li>No images found.</li>";
        }
        ?>
    </ul>
</main>