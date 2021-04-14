<?php
include "db.php";
$user_id = 10; // User id
$post_id = $_POST['post_id'];
$rating = $_POST['rating'];
// Check entry within table
$query = "SELECT COUNT(*) AS postCount FROM post_rating WHERE post_id=".$post_id." and user_id=".$user_id;
$result = mysqli_query($conn,$query);
$fetchdata = mysqli_fetch_array($result);
$count = $fetchdata['postCount'];
if($count == 0){
    $insertquery = "INSERT INTO post_rating(user_id,post_id,rating) values(".$user_id.",".$post_id.",".$rating.")";
    mysqli_query($conn,$insertquery);
}else {
    $updatequery = "UPDATE post_rating SET rating=" . $rating . " where user_id=" . $user_id . " and post_id=" . $post_id;
    mysqli_query($conn,$updatequery);
}
// get average
$query = "SELECT ROUND(AVG(rating),1) as averageRating FROM post_rating WHERE post_id=".$post_id;
$result = mysqli_query($conn,$query) or die(mysqli_error());
$fetchAverage = mysqli_fetch_array($result);
$averageRating = $fetchAverage['averageRating'];
$return_arr = array("averageRating"=>$averageRating);
echo json_encode($return_arr);