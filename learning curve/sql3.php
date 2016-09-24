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
		$i=5070286;
		$name='Kapish Prasad Singh';
		$air='9824';
		$cat='OBC(NCL)';
		$catrank=1665;
			$qu="INSERT INTO result1 VALUES ('$i', '$name', '$air', '$cat', '$catrank')";
		mysqli_query($db,$qu);
		}
?>