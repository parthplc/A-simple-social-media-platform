<?php
session_start();
$conn = mysqli_connect('localhost','root','','allury');
if(isset($_GET["id"])){
$id=$_GET["id"];
}
$user_name=$_SESSION['username'];
$result = mysqli_query($conn, "SELECT * FROM story_posts WHERE id=$id");
$row = mysqli_fetch_array($result);
$n = $row['likes'];
mysqli_query($conn, "INSERT INTO story_likes (id, user_name) VALUES ('$id', '$user_name')");
mysqli_query($conn, "UPDATE story_posts SET likes=$n+1 WHERE id=$id");
header("location:story.php");
?>