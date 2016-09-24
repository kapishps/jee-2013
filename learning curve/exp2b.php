<?php
include "Snoopy.class.php";
$snoopy->rawheaders["Pragma"] = "no-cache";
$snoopy=new snoopy;
for($i=80;$i<100;$i++)
{
	$i=str_pad($i,4,"0",STR_PAD_LEFT);
	$link='http://www.biharboard.net/inter2013/matricresult.aspx';
	$form['__VIEWSTATE'] ="/wEPDwULLTE0MTgzMTg1NjYPZBYCAgMPZBYKAgUPD2QWAh4Hb25rZXl1cAUecmV0dXJuIENoa0RlY1ZhbHVlKHR4dF9yY29kZSk7ZAIHDw9kFgIfAAUccmV0dXJuIENoa0RlY1ZhbHVlKHR4dF9ybm8pO2QCCw8PFgIeB1Zpc2libGVoZGQCDQ88KwANAGQCDw8PFgIfAWhkZBgCBR5fX0NvbnRyb2xzUmVxdWlyZVBvc3RCYWNrS2V5X18WAQUKV2ViVmlld2VyMQUJR3JpZFZpZXcxD2dkMor0jjhyhguPDuwAsJEqocySkAI=";
	$form['__EVENTVALIDATION'] ="/wEWBAL27+q5BALKkrO+BQL5+9ZGAoznisYGSl3wMMf2d/XE/+zpkoCP2KBXQyY=";
	$form['txt_rcode'] ="85008";
	$form['txt_rno'] =$i;
	$form['Button1'] = "Get Result";
	$snoopy->submit($link,$form);
	print $snoopy->results;
}
?>