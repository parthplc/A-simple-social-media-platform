<?php
$res_id=MySQli_connect('localhost','root',"",'allury');
if(!$res_id)
{
	echo "Unable to connect to database";
}
else
{
   $name = $_POST['user'];
   $pass = $_POST['password'];
   $age = $_POST['age'];
   $gender = $_POST['gender'];
   $email = $_POST['email'];
   $q1 = "select email from users where email = '$email'";
   $result1 = MySQli_Query($res_id, $q);
   $q2 = "select user_name from users where user_name='$name'";
   $result2 = MySQli_Query($res_id,$q2);
   if(mysqli_num_rows($result1)>0 || mysqli_num_rows($result2)>0)
   {
	   header("location:reg_fail.html");
   }
   else
   {
	   $q = "insert into users values('$name','$pass','$gender','$age','$email')";
      MySQli_Query($res_id,$q);
	   header("location:reg_success.html");
   }
}
?>