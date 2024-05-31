<?php include "includes/header.inc"; ?>
<main class="container-fluid">
    <?php
    // Fetch hike details from database
    $sql = "SELECT * FROM hikes WHERE id = ?"; // Assuming you have a unique ID for each hike
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_GET['id']); // Assuming you pass the hike ID as a parameter in the URL
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <div class="row justify-content-center">
            <img class="img-fluid" src="<?php echo $row['image']; ?>" alt="<?php echo $row['hikename']; ?>"><br>
        </div>
        <div class="row justify-content-center">
            <div class="detail-container">
                <div class="detail-item">
                    <i class="fas fa-map-marker-alt"></i><br>
                    <span class="detail-value"><?php echo $row['distance']; ?> km</span>
                </div>
                <div class="detail-item">
                    <i class="fas fa-tachometer-alt"></i><br>
                    <span class="detail-value"><?php echo $row['level']; ?></span>
                </div>
                <div class="detail-item">
                    <i class="fas fa-location-arrow"></i><br>
                    <span class="detail-value"><?php echo $row['location']; ?></span>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" style="text-align: center">
            <div class="col-md-12"><?php echo $row['hikename']; ?></div>
            <div class="col-md-12"><?php echo $row['description']; ?></div>
        </div>
        <?php
    } else {
        echo "Hike not found.";
    }
    ?>
</main>
<?php include "includes/footer.inc"; ?>
