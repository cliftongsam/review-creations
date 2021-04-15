<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="styles/styler.css"/>
</head>
<body>
<?php
require('db.php');
if (isset($_REQUEST['username'])) {
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn, $username);
    $email    = stripslashes($_REQUEST['email']);
    $email    = mysqli_real_escape_string($conn, $email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    $create_datetime = date("Y-m-d H:i:s");
    $query    = "INSERT into `users` (username, password, email, timestamp )
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
    $result   = mysqli_query($conn, $query);
    if ($result) {
        echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='Login.php'>Login</a></p>
                  </div>";
    }
} else {
    ?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <label>
            <input type="text" class="login-input" name="username" placeholder="Username" required />
            <input type="email" class="login-input" name="email" placeholder="Email Address" required>
            <input type="password" class="login-input" name="password" placeholder="Password" required>
            <input type="submit" name="submit" value="Register" class="login-button">
        </label>
        <p class="link"><a href="Login.php">Click to Login</a></p>
    </form>
    <?php
}
?>
</body>
</html>
