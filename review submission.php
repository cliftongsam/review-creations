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
    $username=$_SESSION['username'];
    $place = ($_POST['place']);
    $place = mysqli_real_escape_string($conn, $place);
    $reviews = ($_POST['reviews']);
    $reviews = mysqli_real_escape_string($conn, $reviews);

    $query = "INSERT into `posts` VALUES (NULL ,'$username', '$place', '$reviews')";
    $result = mysqli_query($conn, $query);
    var_dump($result);
    if ($result== TRUE) {
        echo "<div class='form'>
                  <h3>Thank you for the submission.</h3><br/>
                  <p class='link'>Click here to <a href='display-star-rating.php'>rate</a></p>
                  </div>";

    }

}else {
    ?>
    <br><br><br><center><h1>
        <p><?php
    $username  = $_SESSION['username'];
    echo "Username: $username";
    ?></p>
        </h1></center>
    <br><br><br><br><br>
    <center><h2 >Submit your Review Here:</h2><br></center>
    <center><form  class= "form" action="" method="post">
        Place you visited:
            <input type = "text" class="form" name="place" placeholder="Visited" required >
        <p style="position: absolute;
width: 267px;
height: 34px;
left: 282px;
top: 375px;
"><br>Describe your experience :<br></p>
            <input required type="text" name="reviews" placeholder="Enter your experience" style="position: absolute;
width: 386px;
height: 141px;
left: 518px;
top: 375px;">
        <input <button type="submit" name="submit" value="SUBMIT" style="position: absolute;
width: 172px;
height: 34px;
left: 605px;
top: 549px;
"></button>
        <p class="link" style="position: absolute;
width: 213px;
height: 29px;
left: 584px;
top: 652px;"><a href="dashboard.php">Click to dashboard</a></p>
    </form></center>
    <?php
}
?>
</body>
</html>