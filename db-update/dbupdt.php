<?php
error_reporting(E_ALL);
set_time_limit(1000);
include "Snoopy.class.php";
$snoopy->rawheaders["Pragma"] = "no-cache";
$snoopy=new snoopy;
$link='http://jee.iitd.ac.in/appstatus.php';
$db=mysqli_connect('localhost','root','9824','jee13');
if ($result = mysqli_query($db, "SELECT appno FROM appno LIMIT 52, 252")) 
	{
		while($row=mysqli_fetch_row($result))
			{
				echo "--$row[0]-- <br>";
				$form['appno'] ="$row[0]";
				$form['submit'] = "Submit";
				$snoopy->submit($link,$form);
				$page=$snoopy->results;
				$i=$row[0];

				if(strpos($page,'Registration Number is Invalid')===true) 	
				echo "Error Invalid $i";
				else
					{
						if(strpos($page,'Journal Number ')!==false)
							{
								echo "'$row[0]' has qualified <br>"; 
								$tdat=cut_str($page,'Transaction Date','</tr>');
								$tdate=cut_str($tdat,'<td class="bodytext">','</td>');
								$tam=cut_str($page,'Transaction Amount ','</tr>');
								$tamt=cut_str($tam,'<td class="bodytext">','</td>');
								echo "--$tdate--$tamt--<br>";
								if(strcmp($tamt,'0925')==0)
								$qu="UPDATE appno SET tdate='$tdate', cat='SC/ST/PD' where appno='$i'";
								else
								$qu="UPDATE appno SET tdate='$tdate', cat='GEN/OBC' where appno='$i'";
								mysqli_query($db,$qu);
							}
						else
							{
								echo "$row[0] did not qualify or female<br>";
							}	
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