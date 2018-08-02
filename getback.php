<?php
	
	session_start();

	$uname = $_POST['uname'];
	$uemail = $_POST['uemail'];
	$utel = $_POST['utel'];
	$umsg = $_POST['umsg'];

	if(mail("amit.trakkerz@gmail.com", "TRAKKERZ_WEBSITE", $umsg."phone:".$utel."Name:".$uname)) 
	{
	    echo "Message successfully sent!";
	}
	else
	{
	    echo "Message delivery failed...";
	}

	//$_SESSION['submitted'] = 1;

	header("Location:index.html");
?>