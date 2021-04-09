<html>
<style type="text/css">
    #mapContainer {
        height: 500px;
        width: 800px;
        border:10px solid #eaeaea;
    }
</style>

<?php
    $conn = mysqli_connect("localhost", "root", "mysql", "review");
    $val = mysqli_query($conn, "SELECT * FROM test");
    var_dump($val->fetch_all());
?>

<script src="http://maps.google.com/maps/api/js?sensor=false">
</script>

<script type="text/javascript">
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position){
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            var coords = new google.maps.LatLng(latitude, longitude);
            var mapOptions = {
                zoom: 15,
                center: coords,
                mapTypeControl: true,
                navigationControlOptions: {
                    style: google.maps.NavigationControlStyle.SMALL
                },
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(
                document.getElementById("mapContainer"), mapOptions
            );
            var marker = new google.maps.Marker({
                position: coords,
                map: map,
                title: "Your current location!"
            });

        });
    }else {
        alert("Geolocation API is not supported in your browser.");
    }
</script>

<div id="mapContainer"></div>
</html>