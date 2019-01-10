<?php 
session_start();
$conn = new mysqli("localhost", "root","", "allury");
if(isset($_GET["name"])){
$name=$_GET["name"];
echo $name;
}
$sql = "SELECT user_name,gender,age,email FROM users where user_name='$name'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$gender=$row["gender"];
$age=$row["age"];
$email=$row["email"];

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>User Profile</title>
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
	height: 50px;
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
    font-family: "Comic Sans MS", cursive, sans-serif;
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
  /*text-align: center;*/
  font-family: "Comic Sans MS", cursive, sans-serif;
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
  font-family: "Comic Sans MS", cursive, sans-serif;
}
.container1 {
  text-align: center;
  position: relative;
  top: 30%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100%;
  font-family: "Comic Sans MS", cursive, sans-serif;
}
.container1 span {
  color: white;
  display: block;
  font-family: "Comic Sans MS", cursive, sans-serif;
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
    margin-bottom: -40px;
  }
  30%{
    letter-spacing: 25px;
    margin-bottom: -60px;
  }
}
</style>
</head>
<body>
<div class="header">
  <div class="icon-bar">
  <a href="log_out.php"><i class="fa fa-sign-out"></i></a>
  <a class="active" href="home.php"><i class="fa fa-home"></i></a>
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
  <div class="container1">
   <div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> 
                  <br>
                    <dl>
                    <img src="profile.png">
                    <dt><h2>User-name : <?php echo "$name" ;?> </h2></dt>
                   
                    <dt><h2>Gender: <?php echo "$gender" ;?></h2> </dt>
                  
                    <dt><h2>Age:<?php echo "$age" ;?></h2></dt>
                   
                    <dt><h2>E-mail:<?php echo "$email" ;?></h2></dt>
					
					<dt><h2>Contact me:</h2></dt>
					<form action='send.php' method="get"><textarea id="msg" name="msg" placeholder="Write something.." style="height:200px"></textarea>
										<input type="hidden" id="email" name="email" value="<?php echo $email;?>">
										<input type="submit" value="Submit"></form>
                    
                </div>
  </div>
  </div>
</div>
</body>
</html>