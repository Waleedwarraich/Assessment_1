<?php include "includes/header.inc" ?>
<main>
    <h1 id="loginHeading">Login</h1>
    <p id="loginPara">Please login to your account</p>
    <?php
   if (isset($_SESSION['message'])) {
        // Display the message
        echo '<div class="alert alert-' . $_SESSION['message']['type'] . '">' . $_SESSION['message']['text'] . '</div>';
        // Unset the session message
        unset($_SESSION['message']);
    }
    ?>
    <form id="login-form" action="login-submit.php" method="post">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>

        <div class="btns">
            <button id="submissionBtn">Login <i class="fa fa-check"></i></button>
            <a href="index.php" id="cancelBtn">Cancel <i class="fa fa-close"></i></a>
        </div>
    </form>
</main>
<?php include "includes/footer.inc" ?>
