<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>restaurant reviews</title>
    <link rel="stylesheet" href="../styles/style.css" type="text/css" />
</head>
<body>
<div id="body">
    <table width="80%" border="1">
        <tr>
            <td>place</td>
            <td>reviews</td>
        </tr>
        <?php
        include 'db.php';
        session_start();
        $sql = "SELECT place,rev FROM rest_reviews WHERE place='Tony Romas' ";
        $result = $conn->query($sql);
        var_dump($sql);
        var_dump($result);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo " " . $row["place"]." " . $row["reviews"]. "<br>";
            }
        } else {
            echo "0 results";
        }
       ?>

</div>
</body>
</html>
