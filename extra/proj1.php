<?php
error_reporting(E_ALL);
set_time_limit(100);
include "Snoopy.class.php";
$snoopy->rawheaders["Pragma"] = "no-cache";
$snoopy=new snoopy;
$link='http://jee.iitd.ac.in/appstatus.php';

for($i=25100000;$i<25101000;$i++)
	{
		$form['appno'] ="d.$i";
		$form['submit'] = "Submit";
		$snoopy->submit($link,$form);
		$page=$snoopy->results;
		
		if(strpos($page,'Registration Number is Invalid')===true) 	
			echo "Error Invalid $i";
		else
		{
			if(strpos($page,'has not been received.')!==false)
				echo "'$i' did not qualify or female<br>"; 
			else
				{
					echo "$i has qualified";
				}	
		}
	}


?>