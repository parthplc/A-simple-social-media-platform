<?php
    session_start();
	ini_set('mysql_connect_timeout', 300);
	ini_set('default_socket_timeout', 300);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Welocme to Allury</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif; margin:0;
}

/* Style the header */
.header {
	height: 60px;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background: black;
    color: white;
    z-index: 3;
}

.icon-bar {
    width: 100%;
    background-color: #292F33;
    overflow: auto;
}

.icon-bar a {
    float: right;
    width: 20%;
    text-align: center;
    padding: 12px 0;
    transition: all 0.3s ease;
    color: white;
    font-size: 36px;
}

.icon-bar a:hover {
    background-color: #66757F;
}

.active {
    background-color: #CCD6DD;
}
/* Create three unequal columns that floats next to each other */
.column {
    float: left;
    padding: 10px;
    height: 800px; /* Should be removed. Only for demonstration */
}

/* Left and right column */
.column.side {
	left: 0px;
	width: 20%;
    float: left;
    position: fixed;
    background: #ffff4d;
    height: 100vh;
    top: 60px;
}
.column.side img{
	padding: 10px;
	width: 250px;
	height: 190px;
}
.column.content 
{
    background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%); 
    width: 80%;
    display: inline-block;
    position: absolute;
    right: 0;
    top: 60px;
}
.row:after 
{
    content: "";
    display: table;
    clear: both;
}
.container 
{
    position: relative;
    width: 50%;
}
.image 
{
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}
.middle 
{
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 100%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}
.container:hover .image 
{
  opacity: 0.3;
}
.container:hover .middle 
{
  opacity: 1;
}

.text {
  background-color: #4CAF50;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}
.container1 {
  text-align: center;
  position: relative;
  top: 30%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100%;
}
.container1 span {
  color: white;
  display: block;
}
.text1 {
  font-size: 80px;
  font-weight: 700;
  letter-spacing: 8px;
  margin-bottom: 20px;
  position: relative;
  animation: text 3s 1;
}
.text2 {
  font-size: 50px;
  text-shadow: 2px 1px black;
}
@keyframes text {
  0%{
    color: black;
    margin-bottom: -20px;
  }
  30%{
    letter-spacing: 25px;
    margin-bottom: -40px;
  }
}
.card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 50%;
  height: 530px;
  position: relative;
  left: 250px;
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.name {
	width: 100px;
	float: left;
    padding: 2px 16px;
}
text {
  text-align: center;
}
.image {
  -webkit-transition: width .1s, height .1s, -webkit-transform .1s; /* Safari */
  transition: width .1s, height .1s, transform 1s;
}

.image:hover {
  width: 630px;
  height: 530px;
  -webkit-transform: rotate(360deg); /* Safari */
  transform: rotate(360deg);
}
</style>
</head>
<body>
<div class="header">
  <div class="icon-bar">
  <a href="log_out.php"><i class="fa fa-sign-out"></i></a>
  <a style="float: left" href="profile.php"><?php if(isset($_SESSION['username'])){echo $_SESSION["username"];} else{echo "User";}?> </a>
  </div>
</div>
<div class="row">
  <div class="column side" style="background-color:#aaa;">
		    <a href="Story.php"><div class="container"><img src="story.png" class="image"><div class="middle"><div class="text">Story</div></div></div></a>
        <a href="Poem.php"><div class="container"><img src="poem.jpg" class="image"><div class="middle"><div class="text">Poem</div></div></div></a>
        <a href="Painting.php"><div class="container"><img src="painting.png" class="image"><div class="middle"><div class="text">Painting</div></div></div></a> 
  </div>
  <div class="column content">
  <?php //container1 
  //<div class="">
  //<span class="text1">WELCOME TO</span>
  //<span class="text2" style="color: #66757F"><b>A</b>LLURY</span>
  //</div>
  ?>
  <?php
  displayimage();
  function displayimage()
        {
			$user_name=$_SESSION['username'];
            $con= mysqli_connect("localhost", "root", "","allury");
            $qry= "select * from story_posts where user_name='$user_name'";
            $result= mysqli_query($con,$qry);
            while($row = mysqli_fetch_array($result))
            {
				$name=$row['user_name'];
				$id=$row['id'];
				echo '<div class="card">';
				echo "<a href='delete.php?name=$name&id=$id'><i class='fa fa-trash' style='font-size:36px; float: right;'></i></a>";
				echo "<br>";
                echo '<div class="image"><img height="430" width="530" src="data:image;base64,'.$row[2].' "></div>';
                echo "</div>";
                echo "<hr>";
            }
            mysqli_close($con);
        }
	?>
  </div>
</div>
</body>
</html>