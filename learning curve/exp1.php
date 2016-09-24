<?php
include "Snoopy.class.php";
$snoopy->rawheaders["Pragma"] = "no-cache";
$snoopy=new snoopy;
$link='http://jee.iitd.ac.in/JEE2012/resultstatus.php';
$form['regno'] ="5070286";
$form['submit'] = "Submit";
$snoopy->submit($link,$form);
print $snoopy->results;
?>