<!DOCTYPE html>
<html>
<head>
    <title> Submit Review</title>
    <link rel="stylesheet" href="styles/style.css"/>

    </head>
<body>
<?php
require('db.php');
session_start();
if (isset($_REQUEST['reviews'])) {
    $username = $_SESSION['username'];
    $place = ($_POST['place']);
    $place = mysqli_real_escape_string($conn, $place);
    $reviews = ($_POST['reviews']);
    $reviews = mysqli_real_escape_string($conn, $reviews);
    $datetime = date("Y-m-d H:i:s");

    $query = "INSERT into `feedback` VALUES ('$username','$place', '$reviews', '$datetime')";
    $result = mysqli_query($conn, $query);

    if ($result== TRUE) {
        echo "<div class='form'>
                  <h3>Thank you for the submission.</h3><br/>
                  <p class='link'>Click here to <a href='dashboard.php'>homepage</a></p>
                  </div>";

    }

}else {
    ?>
        <?php
    $username  = $_SESSION['username'];
    echo "WELCOME $username";
    ?>
    <h1>Review submission</h1><br>
    <form  class= "form" action="" method="post">
        Place you visited:
            <input type = "text" class="form" name="place" placeholder="Visited" required >
        <br>Describe your experience :<br>
        <input required type="text" name="reviews" placeholder="Enter your experience" >
        <br>
        <input <button type="submit" name="submit" value="SUBMIT"</button>
        <p class="link"><a href="dashboard.php">Click to dashboard</a></p>
    </form>
    <?php
}
?>
</body>
</html>