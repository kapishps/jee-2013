<?php
error_reporting(E_ALL);
set_time_limit(1000);
include "Snoopy.class.php";
$snoopy->rawheaders["Pragma"] = "no-cache";
$snoopy=new snoopy;
$link='http://www.iitg.ac.in/jee/show_status.php';
$db=mysqli_connect('localhost','root','9824','jee13');
$d="D";
for($i=31203500;$i<31204500;$i++)
	{
	/**$j=rand(10000000,99999999);*/
		$form['appno'] ="$d$i";
		$form['submit'] = "Submit";
		$snoopy->submit($link,$form);
		$page=$snoopy->results;
		
				if(strpos($page,'Application Not Yet Received at IIT Guwahati')!==false)
				{
					echo "$i did not qualify or female<br>";
				}	
				else
				{
					echo "'$i' has qualified <br>"; 
					$name=cut_str($page,'Name:&nbsp;&nbsp;<b style="color:blue;">','</b>');
					echo "$name <br>";
					$qu="INSERT INTO gzone VALUES ('$d$i', '$name')";
					mysqli_query($db,$qu);
				}
	}
function cut_str($str, $left, $right) { $str = substr ( stristr ( $str, $left ), strlen ( $left ) );
 $leftLen = strlen ( stristr ( $str, $right ) );
 $leftLen = $leftLen ? - ($leftLen) : strlen ( $str );
 $str = substr ( $str, 0, $leftLen );
 return $str;
 }

?>