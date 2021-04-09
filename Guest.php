<html>



<?php
    $conn = mysqli_connect("localhost", "root", "mysql", "review");
    $val = mysqli_query($conn, "SELECT * FROM test");
?>


</html>