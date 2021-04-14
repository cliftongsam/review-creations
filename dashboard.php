<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <style>
        h1{
            text-align: center;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="form">
    <p style="contain: layout">Hey, <?php echo $_SESSION['username']; ?>!</p>


    <h1>WELCOME TO REVIEW CREATIONS</h1><br><br>
    <h2> What would you like to do today?</h2><br><br>
    <a href="userchoice2.php">
        <div style="text-align: center;"><button >HERE</button></div><br><br>
    </a>
    <h2> Where have you been?</h2><br><br>
    <a href="userchoice1.php">
        <div style="text-align: center;"><button>HERE</button></div>
    </a>

    <p><a href="logout.php">Logout</a></p>
</div>
</body>
</html>