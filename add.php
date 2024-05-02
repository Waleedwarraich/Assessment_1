<?php include "includes/header.inc" ?>
<main>
    <h1 id="hikesHeading">Add a new hike</h1>
    <p id="hikesPara">You can add a new hike here</p>
    <?php
    session_start();

    // Check if there is a message set
    if (isset($_SESSION['message'])) {
        // Display the message
        echo '<div class="alert alert-' . $_SESSION['message']['type'] . '">' . $_SESSION['message']['text'] . '</div>';
        // Unset the session message
        unset($_SESSION['message']);
    }
    ?>
    <form id="hike-form" action="form-submit.php" method="post" enctype="multipart/form-data">
        <label for="hike-name">Hike Name</label>
        <input type="text" id="hike-name" name="hikeName" placeholder="Provide a name for the hike" required>

        <label for="description">Description</label>
        <textarea id="description" name="description" placeholder="Describe the hike briefly" required></textarea>

        <label for="image">Select Image:</label>
        <input type="file" id="image" name="image" accept="image/*">
        <p id="imageNotifier">Max size 500px</p>

        <label for="image-caption">Image Caption</label>
        <input type="text" id="image-caption" name="imageCaption" placeholder="Describe the image in one word" required>

        <label for="distance">Distance</label>
        <input type="number"  step="0.0" id="distance" name="distance" placeholder="Enter the distance" required>

        <label for="location">Location</label>
        <input type="text" id="location" name="location" placeholder="Enter the location" required>

        <label for="level">Level</label>
        <select id="level" name="level" required>
            <option value="">--Choose an option--</option>
            <option value="Easy">Easy</option>
            <option value="Medium">Medium</option>
            <option value="Hard">Hard</option>
        </select>

        <div class="btns">
            <button id="submissionBtn">Submit <i class="fa fa-check"></i></button>
                <a href="index.php" id="cancelBtn">Cancel <i class="fa fa-close"></i></a>
        </div>
    </form>


</main>

<?php include "includes/footer.inc" ?>
