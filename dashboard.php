<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="styles/style.css"/>
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
    <?php ;
                $name=$_SESSION['username'];
    ?>


    <h1>WELCOME TO REVIEW CREATIONS</h1><br><br>
    <h2> Hey <?php echo $name; ?>, what would you like to do today?</h2><br><br>
    <a href="userchoice2.php">
        <div style="text-align: center;"><button >HERE</button></div><br><br>
    </a>
    <h2> Where have you been <?php echo $name; ?>  ?</h2><br><br>
    <a href="userchoice1.php">
        <div style="text-align: center;"><button>HERE</button></div>
    </a>

    <p><a href="logout.php">Logout</a></p>
</div>
</body>
</html>