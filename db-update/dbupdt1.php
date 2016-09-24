<?php
error_reporting(E_ALL);
set_time_limit(1000);
$db=mysqli_connect('localhost','root','9824','jee13');
$db1=mysqli_connect('localhost','root','9824','iitjee13');
if ($result = mysqli_query($db, "SELECT * FROM result3")) 
	{
		while($row=mysqli_fetch_row($result))
			{
				$rollno=$row[0];
				$name="$row[1]";
				$air=$row[2];
				$cat="$row[3]";
				$catrank=$row[4];
				echo "--$rollno--$name--$air--$cat--$catrank-- <br>";
				if($air==0)
				{
				$qu1="INSERT INTO res1 VALUES ('$rollno', '$name', NULL, '$cat', '$catrank')";
				}
				if($catrank==0)
				{
				$qu1="INSERT INTO res1 VALUES ('$rollno', '$name', '$air', '$cat', NULL)";
				}
				else
				{
				$qu1="INSERT INTO res1 VALUES ('$rollno', '$name', '$air', '$cat', '$catrank')";
				}
				mysqli_query($db1,$qu1);
				}
				}

?>