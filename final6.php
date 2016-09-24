<?php
set_time_limit(99999);
error_reporting(E_ALL);
include "Snoopy.class.php";
$snoopy->rawheaders["Pragma"] = "no-cache";
$snoopy=new snoopy;
$link='http://jee.iitd.ac.in/resultstatus.php';
$db=mysqli_connect('localhost','root','9824','jee13');
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else
	{
	for($i=6001001;$i<6100000;$i++)
	{
		$form['regno'] ="$i";
		$form['submit'] = "Submit";
		$snoopy->submit($link,$form);
		$page=$snoopy->results;
		if(strpos($page,'Roll Number is invalid')!==false) 	
			{
			echo "Invalid $i <br>";
			$j=$i%1000;
			$k=1000-$j;
			$i=$i+$k;
			}
		else
		{
			if(strpos($page,'not qualified in JEE (Advan')!==false)
				echo "'$i' did not qualify<br>"; 
			else
				{
					$name=cut_str($page,'Name  :','<br>JEE (Adva');
					$air=cut_str($page,'India Rank is  <span class=style7>','</span><br>');
					if(strpos($page,'Your Rank in the')!==false)
						{
							$cat=cut_str($page,'Your Rank in the ','List is');
							$catrank=cut_str($page,'List is  <span class=style7>','</span><br><br>');
							if(is_numeric($air))
							{
							echo "$name---$i---AIR---$air---$cat--rank1---$catrank-- <br>";
							$query="INSERT INTO result6 VALUES ('$i', '$name', '$air', '$cat', '$catrank')";
							mysqli_query($db,$query);
							}
							else
							{
							echo "$name---$i---AIR---$air---$cat--rank---$catrank-- <br>";
							$quey="INSERT INTO result6 VALUES ('$i', '$name', NULL, '$cat', '$catrank')";
							mysqli_query($db,$query);
							}
						}
					else
					{
						echo "$name---$i----AIR----$air <br>";
						$query="INSERT INTO result6 VALUES ('$i', '$name', '$air', 'GEN', NULL)";
						mysqli_query($db,$query);
					}
				}	
		}
	}
	}

function cut_str($str, $left, $right) 
{ 
$str = substr ( stristr ( $str, $left ), strlen ( $left ) );
$leftLen = strlen ( stristr ( $str, $right ) );
$leftLen = $leftLen ? - ($leftLen) : strlen ( $str );
$str = substr ( $str, 0, $leftLen );
return $str;
}
?>