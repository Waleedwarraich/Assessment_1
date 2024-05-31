<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discover Victoria your own way</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your CSS file for styling -->
</head>
<body>
<?php include('includes/header.inc') ?>
<main>
    <h1 id="hikesHeading">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?></h1>
    <hr style="margin-top: 20px">
    <?php
    // Check if there is a message set
    if (isset($_SESSION['message'])) {
        // Display the message
        echo '<div class="alert alert-' . $_SESSION['message']['type'] . '">' . $_SESSION['message']['text'] . '</div>';
        // Unset the session message
        unset($_SESSION['message']);
    }
    ?>
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
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        $user_id = $_SESSION['user_id'];

                        // SQL query to retrieve hikes for the current user
                        $sql = "SELECT * FROM hikes WHERE user_id = $user_id";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo '<td><a href="details.php?id=' . $row["id"] . '">' . $row["hikename"] . '</a></td>';
                                echo "<td>" . $row["distance"] . "K.M" . "</td>";
                                echo "<td>" . $row["level"] . "</td>";
                                echo "<td>" . $row["location"] . "</td>";
                                echo "<td>";
                                echo '<a href="edit.php?id=' . $row["id"] . '">Edit</a> | ';
                                echo "<a href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this hike?')\">Delete</a>";
                                echo "</td>";

                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No hikes found.</td></tr>";
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>



<?php include "includes/footer.inc";?>