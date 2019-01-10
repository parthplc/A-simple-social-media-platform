<?php
    session_start();
	   ini_set('mysql_connect_timeout', 300);
	   ini_set('default_socket_timeout', 300);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Story</title>
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
    background-color: #00cccc;
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
    background: #00e6e6;
    height: 100vh;
    top: 60px;
}
.column.side img{
	padding: 10px;
	width: 250px;
	height: 190px;
}

/* Middle column */
.column.content {
	 background: white;
    width: 80%;
    display: inline-block;
    position: absolute;
    right: 0;
    top: 60px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
.container {
    position: relative;
    width: 50%;
}

.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 100%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.container:hover .image {
  opacity: 0.3;
}

.container:hover .middle {
  opacity: 1;
}

.text {
  background-color: #4CAF50;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
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
        <a href="poem.php"><div class="container"><img src="poem.jpg" class="image"><div class="middle"><div class="text">Poem</div></div></div></a>
        <a href="Painting.php"><div class="container"><img src="painting.png" class="image"><div class="middle"><div class="text">Painting</div></div></div></a> 
  </div>
  <div class="column content" >
    <h4 style="text-align: center"> STORIES </h4>
    <div style="margin: auto; width: 60%; border: 1px solid black; padding: 10px;">
	 <form method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="image" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
   </form></div><br><br>
   <?php
      if(isset($_POST['submit']))
        {
            if(getImageSize($_FILES['image']['tmp_name'])==FALSE)
            {
                echo "Select an image";
            }
            else
            {
                $image= addslashes($_FILES['image']['tmp_name']);
                $name= addslashes($_FILES['image']['name']);
                $image= file_get_contents($image);
                $image= base64_encode($image);
                saveimage($name, $image);
            }
        }
      displayimage();
      function saveimage($name, $image)
      {
          $con= mysqli_connect("localhost", "root", "","allury");
          $u=$_SESSION['username'];
          $qry= "insert into story_posts (name,image,user_name) values ('$name','$image','$u')";
          $result= mysqli_query($con,$qry);
          if($result)
          {
              echo "<br/>Image uploaded.";
          }
          else
          {
             echo "<br/>Image not uploaded.";
          }
      }
        function displayimage()
        {
            $con= mysqli_connect("localhost", "root", "","allury");
            $qry= "select * from story_posts";
            $result= mysqli_query($con,$qry);
            while($row= mysqli_fetch_array($result))
            {
                $name=$row['user_name'];
				$id=$row['id'];
				$likes=$row['likes'];
				echo '<div class="card">';
				echo "<a href='delete.php?name=$name&id=$id'><i class='fa fa-trash' style='font-size:36px; float: right;'></i></a>";
				echo "<br>";
                echo '<div class="image"><img height="430" width="530" src="data:image;base64,'.$row[2].' "></div>';
                echo '<div class="name">';
                echo "<h4><a href='intro.php?name=$name'><b>$name</b></h4>";
                echo "</div>";
				echo "<a style='padding: 8px; font-size:24px; float: right;' href='like.php?id=$id'><abbr title=$likes><i class='fa fa-thumbs-up'></i></abbr></a>";
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