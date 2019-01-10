<?php
    session_start();
	ini_set('mysql_connect_timeout', 300);
	ini_set('default_socket_timeout', 300);
?>
<?php 
$conn = new mysqli("localhost", "root","", "allury");
$user_name=$_SESSION['username'];
if(isset($_GET["name"])&&isset($_GET["id"])){
$name=$_GET["name"];
$id=$_GET["id"];
}
if($name==$user_name){
	$sql = "DELETE FROM story_posts WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
}
else
	echo "maine tera kaata";
$conn->close();
?>