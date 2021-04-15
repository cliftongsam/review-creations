<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> To access user's location </title>
    <script>
        function showPosition()
        {
            if(navigator.geolocation)
            {
                navigator.geolocation.getCurrentPosition(function(position)
                {
                    const positionInfo= "Your current position is - <br>" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " + position.coords.longitude + " ,<br> THUNDER BAY";
                    document.getElementById("result").innerHTML = positionInfo;
                });

            } else {
                alert("Sorry, your browser does not support HTML5 geolocation.");
            }

        }
    </script>
</head>
<body>
<div id="result">
    <!--Position information will be inserted here-->
</div>
<button type="button" onclick="showPosition();">Show Position</button>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</body>


<form action="dashboard.php" method="post">
    <input type="submit" value="Dashboard">


</html>

