
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>File Uploading With PHP and MySql</title>
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