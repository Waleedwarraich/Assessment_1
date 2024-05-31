<?php include "includes/header.inc" ?>
<div class="container-fluid">
    <?php
    if (isset($_SESSION['message'])) {
        echo '<div class="' . $_SESSION['message']['type'] . '">' . $_SESSION['message']['text'] . '</div>';
        unset($_SESSION['message']);
    }
    ?>

    <div class="row">
        <div class="col-md-6">
            <h1 id="mainHeadingHome">Hikes Victoria</h1>
            <h2 id="welcomeHeading">WELCOME TO VICTORIA</h2>
        </div>
        <div class="col-lg-6">
            <img id="hikesImage" src="images/werribee.jpg" alt="Apostles Image" class="circle-img img-fluid">
        </div>
    </div>
</div>
<?php include "includes/footer.inc" ?>
