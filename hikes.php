<?php include('includes/header.inc') ?>
<main>
    <h1 style="text-align: center">Discover Victoria your own way</h1>
    <p id="hikesPara">NESTLED IN THE VIBRANT LANDSCAPE OF VICTORIA, AUSTRALIA, HIKING ENTHUSIASTS CAN DISCOVER A REALM OF DIVERSE TERRAINS AND BREATHTAKING VISTAS. FROM THE RUGGED COASTLINE OF THE GREAT OCEAN WALK TO THE MAJESTIC PEAKS OF THE GRAMPIANS NATIONAL PARK, VICTORIA OFFERS A MOSAIC OF TRAILS THAT CATER TO ADVENTURERS OF ALL SKILL LEVELS. HIKERS CAN TRAVERSE THROUGH LUSH RAINFORESTS IN THE OTWAYS, WHERE THE AIR IS FRESH AND THE SOUND OF CASCADING WATERFALLS ACCOMPANIES THE RUSTLE OF FERNS AND TOWERING EUCALYPTUS TREES. EACH STEP REVEALS THE STATE'S NATURAL SPLENDOR, WHETHER IT'S THE WILDFLOWERS BLOOMING IN THE ALPINE NATIONAL PARK OR THE DRAMATIC ROCK FORMATIONS DOTTING THE LANDSCAPE OF THE MORNINGTON PENINSULA.</p>

    <div class="row">
        <div class="col-md-4">
            <img src="./images/falls.jpg" alt="No Image to preview" class="img-fluid">
        </div>
        <div class="col-md-8">
            <strong>List of Hikes</strong>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Hike</th>
                        <th scope="col">Distance</th>
                        <th scope="col">Difficulty</th>
                        <th scope="col">Location</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = "SELECT * FROM hikes";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo '<td><a href="details.php?id=' . $row["id"] . '">' . $row["hikename"] . '</a></td>';
                            echo "<td>" . $row["distance"] . "K.M" . "</td>";
                            echo "<td>" . $row["level"] . "</td>";
                            echo "<td>" . $row["location"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No hikes found.</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php include "includes/footer.inc";?>
