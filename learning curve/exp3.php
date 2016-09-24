<?php
set_time_limit(200);
include "Snoopy.class.php";

$snoopy->rawheaders["Pragma"] = "no-cache";
$snoopy=new snoopy;
$link='http://jee.iitd.ac.in/JEE2012/resultstatus.php';

for($i=5070000;$i<5071000;$i++){
	$form['regno'] =$i;
	$form['submit'] = "Submit";
	$snoopy->submit($link,$form);
	$page=$snoopy->results;
	if(strpos($page,'Registration Number is Invalid')===true) 	
		echo "Error Invalid $i";
	else{
		if(strpos($page,'Your name does not appear in any of the IIT-JEE 2012 rank lists')!==false)
		echo "'$i' did not qualify<br>"; 
		else
		echo "'$i' may have qualified<br>";
	}
}

function cut_str($str, $left, $right) { $str = substr ( stristr ( $str, $left ), strlen ( $left ) );
	 $leftLen = strlen ( stristr ( $str, $right ) );
	 $leftLen = $leftLen ? - ($leftLen) : strlen ( $str );
	 $str = substr ( $str, 0, $leftLen );
	 return $str;
}
?>
