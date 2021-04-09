<html>
<head>
    <link rel="stylesheet" href="styles/style.css"/>
    <style>
        h1{
            color: black;
            font-size: 500%;
            text-align: center;
        }

        h2{
            color: black;
            font-size: 200%;
            text-align: center;
        }

        form{
            color: darkblue;
            text-align: left;
            font-size: 150%;
            text-align: center;
        }

    </style>

    <body>
<h1>HOMEPAGE</h1>
<h2>SIGN UP / LOG IN</h2>

<form action="login.php" method="post">
    E-mail: <input type="text" name="email"><br>
    Password: <input type="password" name="password"><br><br>
    <input type="submit"><br><br>
</form>
<form action="Sign up.php" method="post">
    Sign Up:<br><br>
    <input type="submit" name="sign">

</form>

<h2 style=>GUEST</h2>

<form action="Guest.php" method="post">
    Name: <input type="Text" name="name"><br><br>
    <input type="submit">
</form>
</body>
</head>
</html>


