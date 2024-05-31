<?php
include "includes/header.inc";
include "includes/db_connect.inc";
if(isset($_GET['id'])) {
    $hike_id = $_GET['id'];

    // Retrieve the existing hike data from the database
    $sql = "SELECT * FROM hikes WHERE id = $hike_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Assign existing data to variables
        $hikeName = $row['hikename'];
        $description = $row['description'];
        $image = $row['image'];
        $imageCaption = $row['caption'];
        $distance = $row['distance'];
        $location = $row['location'];
        $level = $row['level'];
    } else {
        $_SESSION['message'] = array('type' => 'error', 'text' => 'Hike not found.');
        header("Location: index.php");
        exit();
    }
} else {
    $_SESSION['message'] = array('type' => 'error', 'text' => 'Hike ID not provided.');
    header("Location: index.php");
    exit();
}
?>

<main>
    <h1 id="hikesHeading">Edit Hike</h1>
    <p id="hikesPara">Edit the details of the hike</p>
    <?php
    if (isset($_SESSION['message'])) {
        // Display the message
        echo '<div class="alert alert-' . $_SESSION['message']['type'] . '">' . $_SESSION['message']['text'] . '</div>';
        // Unset the session message
        unset($_SESSION['message']);
    }
    ?>
    <form id="hike-form" action="edit-submit.php" method="post" enctype="multipart/form-data">
        <!-- Hidden input field to store the hike ID -->
        <input type="hidden" name="hike_id" value="<?php echo $hike_id; ?>">

        <label for="hike-name">Hike Name</label>
        <input type="text" id="hike-name" name="hikeName" value="<?php echo $hikeName; ?>" required>

        <label for="description">Description</label>
        <textarea id="description" name="description" required><?php echo $description; ?></textarea>

        <!-- Display the existing image below the image input -->
        <label for="image">Current Image:</label>
        <img src="<?php echo $image; ?>" alt="Current Image">
        <label for="new-image">Select New Image:</label>
        <input type="file" id="new-image" name="image" accept="image/*">
        <p id="imageNotifier">Max size 500px</p>

        <label for="image-caption">Image Caption</label>
        <input type="text" id="image-caption" name="imageCaption" value="<?php echo $imageCaption; ?>" required>

        <label for="distance">Distance</label>
        <input type="number" step="0.0" id="distance" name="distance" value="<?php echo $distance; ?>" required>

        <label for="location">Location</label>
        <input type="text" id="location" name="location" value="<?php echo $location; ?>" required>

        <label for="level">Level</label>
        <select id="level" name="level" required>
            <option value="">--Choose an option--</option>
            <option value="Easy" <?php if($level == 'Easy') echo 'selected'; ?>>Easy</option>
            <option value="Medium" <?php if($level == 'Medium') echo 'selected'; ?>>Medium</option>
            <option value="Hard" <?php if($level == 'Hard') echo 'selected'; ?>>Hard</option>
        </select>

        <div>
            <button id="submissionBtn" type="submit">Submit <i class="fa fa-check"></i></button>
            <a href="index.php" id="cancelBtn">Cancel <i class="fa fa-close"></i></a>
        </div>
    </form>
</main>

<?php include "includes/footer.inc" ?>
