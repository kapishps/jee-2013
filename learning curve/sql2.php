<?php
set_time_limit(100);
include "Snoopy.class.php";
$snoopy->rawheaders["Pragma"] = "no-cache";
$snoopy=new snoopy;
$link='http://jee.iitd.ac.in/JEE2012/resultstatus.php';
$db=mysqli_connect('localhost','root','9824','jee2012');
if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else
		{
			$qu="INSERT INTO result1 VALUES ('5070286', 'kapish', '9824', 'obc', '1665')";
		mysqli_query($db,$qu);
		}
?>