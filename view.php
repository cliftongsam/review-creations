
<!DOCTYPE html>
<html>
<head>
    <title>review</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div id="body">
    <table width="80%" border="1">
        <tr>
            <td>user_name</td>
            <td>place</td>
            <td>reviews</td>
        </tr>
        <?php
        include 'db.php';
        session_start();
        $sql = "SELECT id,rev,place from rest_reviews ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo " " . $row["id"]. "  " . $row["rev"]. " " . $row["place"]. " <br>";
            }
        } else {
            echo "0 results";
        }
        ?>

</div>
</body>
</html>