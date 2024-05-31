
<head>
    <style>
        .image-container {
            position: relative;
            width: 100%;
            padding-bottom: 100%; /* This ensures a square aspect ratio */
            overflow: hidden;
        }

        .image-container img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* This ensures the image fills the container without distortion */
        }
    </style>
    <?php include "includes/header.inc" ?>
</head>
<main>
    <h1 id="hikesHeading">Victoria's Hiking Trails</h1>
    <p id="hikesPara">Whether seeking solace in solitude or the companionship of fellow hikers, Victoria's trails promise an unforgettable experience where the spirit of the land and the joy of hiking converge. Are you ready to explore?</p>

    <div class="row">
        <?php
        $sql = "SELECT * FROM hikes";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $count = 0;
            while ($row = $result->fetch_assoc()) {
                if ($count % 4 == 0) {
                    echo '</div><div class="row">';
                }
                echo '<div class="col-md-3">';
                echo '<div class="image-container">';
                echo '<img src="' . $row["image"] . '" alt="' . $row["hikename"] . '">';
                echo '<h2>' . $row["hikename"] . '</h2>';
                echo '<div class="overlay-text">';
                echo '<a href="details.php?id=' . $row["id"] . '">Explore more</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                $count++;
            }
        } else {
            echo "<p>No images found.</p>";
        }
        ?>
    </div>
</main>

 <?php include "includes/footer.inc" ?>