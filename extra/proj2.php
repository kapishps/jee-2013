<?php
/*-------------For Application form no-----------*/
error_reporting(E_ALL);
set_time_limit(1000);
include "Snoopy.class.php";
$snoopy->rawheaders["Pragma"] = "no-cache";
$snoopy=new snoopy;
$link='http://jee.iitd.ac.in/appstatus.php';
$db=mysqli_connect('localhost','root','9824','jee13');
$d="D";
for($i=50200883;$i<50203020;$i++)
	{
		$form['appno'] ="$d$i";
		$form['submit'] = "Submit";
		$snoopy->submit($link,$form);
		$page=$snoopy->results;
		
		if(strpos($page,'Registration Number is Invalid')===true) 	
			echo "Error Invalid $i";
		else
		{
			if(strpos($page,'Journal Number ')!==false)
				{
					echo "'$i' has qualified <br>"; 
					$tdat=cut_str($page,'Transaction Date','</tr>');
					$tdate=cut_str($tdat,'<td class="bodytext">','</td>');
					$tam=cut_str($page,'Transaction Amount ','</tr>');
					$tamt=cut_str($tam,'<td class="bodytext">','</td>');
					echo "--$tdate--$tamt--<br>";
					if(strcmp($tamt,'0925')==0)
					$qu="INSERT INTO appno VALUES ('$d$i', '$tdate', 'SC/ST/PD')";
					else
					$qu="INSERT INTO appno VALUES ('$d$i', '$tdate', 'GEN/OBC')";
					mysqli_query($db,$qu);
				}
			else
				{
					echo "$i did not qualify or female<br>";
				}	
		}
	}
function cut_str($str, $left, $right) { $str = substr ( stristr ( $str, $left ), strlen ( $left ) );
 $leftLen = strlen ( stristr ( $str, $right ) );
 $leftLen = $leftLen ? - ($leftLen) : strlen ( $str );
 $str = substr ( $str, 0, $leftLen );
 return $str;
 }

?>