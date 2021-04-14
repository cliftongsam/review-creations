<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Get And Display Star Rating In PHP with jQuery Ajax</title>
    <!-- CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.2/themes/fontawesome-stars.min.css' rel='stylesheet' type='text/css'>
    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.2/jquery.barrating.min.js" integrity="sha512-nUuQ/Dau+I/iyRH0p9sp2CpKY9zrtMQvDUG7iiVY8IBMj8ZL45MnONMbgfpFAdIDb7zS5qEJ7S056oE7f+mCXw==" crossorigin="anonymous"></script>
    <style>
        .content{
            border: 0px solid black;
            border-radius: 3px;
            padding: 5px;
            margin: 0 auto;
            width: 50%;
        }
        .post{
            border-bottom: 1px solid black;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .post:last-child{
            border: 0;
        }
        .post h1{
            font-weight: normal;
            font-size: 30px;
        }
        .post a.link{
            text-decoration: none;
            color: black;
        }
        .post-text{
            letter-spacing: 1px;
            font-size: 15px;
            font-family: serif;
            color: gray;
            text-align: justify;
        }
        .post-action{
            margin-top: 15px;
            margin-bottom: 15px;
        }
        .like,.unlike{
            border: 0;
            background: none;
            letter-spacing: 1px;
            color: lightseagreen;
        }
        .like,.unlike:hover{
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <?php
        include "db.php";
        session_start();
        $user_id = 10;
        $username = $_SESSION['username'];
        var_dump($username);
        $query = "SELECT * FROM posts,users WHERE posts.user_name= users.username and posts.user_name= '$username'";
        var_dump($query);
        $result = mysqli_query($conn,$query);
        var_dump($result);
        while($row = mysqli_fetch_array($result)){
            $post_id = $row['id'];
            $place = $row['place'];
            $reviews = $row['reviews'];

// User rating
            $query = "SELECT * FROM post_rating WHERE post_id=".$post_id." and user_id=".$user_id;
            $userresult = mysqli_query($conn,$query) or die(mysqli_error());
            $fetchRating = mysqli_fetch_array($userresult);
            $rating = $fetchRating['rating'];
// get average
            $query = "SELECT ROUND(AVG(rating),1) as averageRating FROM post_rating WHERE post_id=".$post_id;
            $avgresult = mysqli_query($conn,$query) or die(mysqli_error());
            $fetchAverage = mysqli_fetch_array($avgresult);
            $averageRating = $fetchAverage['averageRating'];
            if($averageRating <= 0){
                $averageRating = "No rating yet.";
            }
            ?>
            <div class="post">
                <h1><a href='<?php echo $link; ?>' class='link' target='_blank'><?php echo $place; ?></a></h1>
                <div class="post-text">
                    <?php echo $reviews; ?>
                </div>
                <div class="post-action">
                    <!-- Rating -->
                    <select class='rating' id='rating_<?php echo $post_id; ?>' data-id='rating_<?php echo $post_id; ?>'>
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                        <option value="5" >5</option>
                    </select>
                    <div style='clear: both;'></div>
                    Average Rating : <span id='avgrating_<?php echo $post_id; ?>'><?php echo $averageRating; ?></span>
                    <br>
                    <a href="dashboard.php" <button> Here</button> </a> for dashboard
                    <!-- Set rating -->
                    <script type='text/javascript'>
                        $(document).ready(function(){
                            $('#rating_<?php echo $post_id; ?>').barrating('set',<?php echo $rating; ?>);
                        });
                    </script>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        $('.rating').barrating({
            theme: 'fontawesome-stars',
            onSelect: function(value, text, event) {
// Get element id by data-id attribute
                var el = this;
                var el_id = el.$elem.data('id');
// rating was selected by a user
                if (typeof(event) !== 'undefined') {
                    var split_id = el_id.split("_");
                    var post_id = split_id[1]; // post_id
// AJAX Request
                    $.ajax({
                        url: 'store-star-rating-db.php',
                        type: 'post',
                        data: {post_id:post_id,rating:value},
                        dataType: 'json',
                        success: function(data){
// Update average
                            var average = data['averageRating'];
                            $('#avgrating_'+post_id).text(average);
                        }
                    });
                }
            }
        });
    });
</script>
</body>
</html>