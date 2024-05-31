<?php include "includes/header.inc"; ?>
<main class="container-fluid">
    <h1 id="hikesHeading" class="mt-5">Add a new hike</h1>
    <p id="hikesPara">You can add a new hike here</p>
    <?php
    // Check if there is a message set
    if (isset($_SESSION['message'])) {
        // Display the message
        echo '<div class="alert alert-' . $_SESSION['message']['type'] . '">' . $_SESSION['message']['text'] . '</div>';
        // Unset the session message
        unset($_SESSION['message']);
    }
    ?>
    <form id="hike-form" action="form-submit.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="hike-name" class="form-label">Hike Name</label>
            <input type="text" id="hike-name" name="hikeName" class="form-control" placeholder="Provide a name for the hike" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control" placeholder="Describe the hike briefly" required></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Select Image:</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/*">
            <p id="imageNotifier" class="form-text">Max size 500px</p>
        </div>

        <div class="mb-3">
            <label for="image-caption" class="form-label">Image Caption</label>
            <input type="text" id="image-caption" name="imageCaption" class="form-control" placeholder="Describe the image in one word" required>
        </div>

        <div class="mb-3">
            <label for="distance" class="form-label">Distance</label>
            <input type="number" step="0.0" id="distance" name="distance" class="form-control" placeholder="Enter the distance" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" id="location" name="location" class="form-control" placeholder="Enter the location" required>
        </div>

        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <select id="level" name="level" class="form-select" required>
                <option value="">--Choose an option--</option>
                <option value="Easy">Easy</option>
                <option value="Medium">Medium</option>
                <option value="Hard">Hard</option>
            </select>
        </div>

        <div>
            <button id="submissionBtn" class="btn btn-primary">Submit <i class="fa fa-check"></i></button>
            <a href="index.php" id="cancelBtn" class="btn btn-secondary">Cancel <i class="fa fa-close"></i></a>
        </div>
    </form>
</main>

<?php include "includes/footer.inc"; ?>
