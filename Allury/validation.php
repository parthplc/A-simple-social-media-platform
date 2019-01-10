<?php
$log = mysqli_connect('localhost','root','','allury');
if(!$log)
{
	echo "Unable to connect to database";
}
else
{
    $name = $_POST['user'];
    $pass = $_POST['password'];
    $q = "select * from users  where user_name = '$name' and password = '$pass' ";
    $result=mysqli_query($log, $q);
    $num = mysqli_num_rows($result);
    if($num !=0)
    {
	     session_start();
	     $_SESSION['username'] = $name;
	     header("location:home.php");
    }
    else
    {
	     header('location:login_fail.html');
    }
}
?>