
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../../styles/style.css"/>
<head>
    <title>review</title>
</head>
<body>
<center><H1> REVIEWS</H1></center>
<div id="body">
    <table width="80%" border="1">
        <tr>
            <td>id</td>
            <td>place</td>
            <td>reviews</td>
        </tr>
        <?php
        include 'rdatabase.php';
        session_start();
        $sql = "SELECT id,place,rev from rest_reviews WHERE place= 'Caribou Restaurant'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['place'] ?></td>
                    <td><?php echo $row['rev'] ?></td>
                </tr>
                <?php
            }
        }
        ?>
    </table>

</div>
</body>
<br><br><br><br><br><br><br><br>
<p><a href="../../dashboard.php">Dashboard</a></p>
</html>