<?php include "includes/header.inc" ?>
<main>
    <h1 id="registerHeading">Register</h1>
    <p id="registerPara">Create a new account</p>
    <?php
    // Check if there is a message set
    if (isset($_SESSION['message'])) {
        // Display the message
        echo '<div class="alert alert-' . $_SESSION['message']['type'] . '">' . $_SESSION['message']['text'] . '</div>';
        // Unset the session message
        unset($_SESSION['message']);
    }
    ?>
    <form id="register-form" action="register-submit.php" method="post" enctype="multipart/form-data">
        <label for="full-name">Full Name</label>
        <input type="text" id="full-name" name="fullName" placeholder="Enter your full name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>

        <label for="gender">Gender</label>
        <select id="gender" name="gender" required>
            <option value="">--Choose an option--</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
        <br>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>

        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" name="confirmPassword" placeholder="Confirm your password" required>

        <div>
            <button id="submissionBtn">Register <i class="fa fa-check"></i></button>
            <a href="index.php" id="cancelBtn">Cancel <i class="fa fa-close"></i></a>
        </div>
    </form>
</main>
<?php include "includes/footer.inc" ?>
