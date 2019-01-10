<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
$email=$_GET['email'];
$msg=$_GET['msg'];
// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
if(mail($email,"My subject",$msg))
	echo "done";
else
	echo "kya kru ab";
?>