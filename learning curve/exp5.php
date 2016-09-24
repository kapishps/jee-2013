
<?php
error_reporting(E_ALL);
$fields = array('regno'=>$i,'submit'=>'submit');
$query = http_build_query($fields);
$result = shell_exec("C:\curl -s -d "regno=5070286&submit=Submit" http://jee.iitd.ac.in/JEE2012/resultstatus.php");
print $result;
echo $result;

/**if(strpos($result,'Your name does not appear in any of the IIT-JEE 2012 rank lists')!==false)
echo "'$i' did not qualify<br>"; 
else
echo "'$i' may have qualified<br>";
}
*/
?>