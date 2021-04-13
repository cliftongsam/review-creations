<html>
<head>
    <link rel="stylesheet" href="styles/style.css"/>
    <style>
        div
        {
            padding: 10px 0;
        }
    </style>
    <head>
<body>

</body>
<?php
require('db.php');
session_start();
if (isset($_REQUEST['reviews'])) {
    $username  = $_SESSION['username'] ;
    $username = mysqli_real_escape_string($conn, $username);
    $place = stripcslashes($_POST['place']);
    $place = mysqli_real_escape_string($conn, $place);
    $reviews  = stripslashes($_POST['reviews']);
    $reviews= mysqli_real_escape_string($conn, $reviews);
    $datetime = date("Y-m-d H:i:s");

$query    = "INSERT into `feedback` VALUES ('$username','$place', '$reviews', '$datetime')";
$result   = mysqli_query($conn, $query);
 if ($result) {
        echo "<div class='form'>
                  <h3>Thank you for the submission.</h3><br/>
                  <p class='link'>Click here to <a href='dashboard.php'>homepage</a></p>
                  </div>";
    } else {
        echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='review%20submission.php'>submit the review</a> again.</p>
                  </div>";
    }
} else {
    ?>
    <?php
    $username  = $_SESSION['username'];
    echo "WELCOME $username";
    ?>
    <form class="form" action="" method="post">
        <h1>Review submission</h1>
        <br>
        Place you visited: <input type = "text" class="form" name="place" >
        <br>
        Describe your experience :
        <br>
        <textarea
                cols="60" rows="5" <input type="text" class = "form" name="reviews" placeholder="Enter your experience">
        </textarea>
        <br>
        <input <button type="submit" name="submit" value="SUBMIT"  class="" SUBMIT </button>
        <p class="link"><a href="dashboard.php">Click to dashboard</a></p>
    </form>
    <?php
}
?>

</html>