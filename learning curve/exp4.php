<?php
set_time_limit(100);
include "Snoopy.class.php";
$snoopy->rawheaders["Pragma"] = "no-cache";
$snoopy=new snoopy;
$link='http://jee.iitd.ac.in/JEE2012/resultstatus.php';

for($i=5070200;$i<5071000;$i++)
	{
		$form['regno'] =$i;
		$form['submit'] = "Submit";
		$snoopy->submit($link,$form);
		$page=$snoopy->results;
		
		if(strpos($page,'Registration Number is Invalid')===true) 	
			echo "Error Invalid $i";
		else
		{
			if(strpos($page,'Your name does not appear in any of the IIT-JEE 2012 rank lists')!==false)
				echo "'$i' did not qualify<br>"; 
			else
				{
					$name=cut_str($page,'Name  :','<br>Regis');
					$air=cut_str($page,'India Rank is  <span class=style7>','</span><br>');
					if(strpos($page,'Your Rank in the')!==false)
						{
							$cat=cut_str($page,'Your Rank in the','List is');
							$catrank=cut_str($page,'List is  <span class=style7>','</span><br><br>');
							echo "$name---$i---AIR---$air---$cat--rank---$catrank <br>";
						}
					else
						echo "$name---$i----AIR----$air <br>";
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