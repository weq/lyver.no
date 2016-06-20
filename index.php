<?php
/*
echo "Self: ";
echo $_SERVER['PHP_SELF'];
echo "<br>Server Name: ";
echo $_SERVER['SERVER_NAME'];
echo "<br>HTTP HOST: ";
echo $_SERVER['HTTP_HOST'];
echo "<br>REFERER: ";
echo $_SERVER['HTTP_REFERER'];
echo "<br>USER AGENT: ";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>SCRIPT NAME: ";
echo $_SERVER['SCRIPT_NAME'];
*/

function ucfirst_utf8($stri){ 
if($stri{0}>="\xc3") 
     return (($stri{1}>="\xa0")? 
     ($stri{0}.chr(ord($stri{1})-32)): 
     ($stri{0}.$stri{1})).substr($stri,2); 
else return ucfirst($stri); 
} 

function check_exception($arr) {
}

include("idna/idna_convert.class.php");
$IDN = new idna_convert();


$fullName = str_replace(".lyver.no","",$_SERVER['HTTP_HOST']);
$fullName = explode(".",$fullName); 
$decodedFullName = array();
foreach ($fullName as $name) {
	$decodedName = $IDN->decode($name);
	array_push($decodedFullName,$decodedName);
}

foreach ($decodedFullName as $name) {
	$returnName .= ucfirst_utf8($name) . " ";
}
$subdomain = rtrim($returnName, " ");

if (strtolower($subdomain) == "raymond" || strtolower($subdomain) == "weq" || strtolower($subdomain) == "far" || strpos(strtolower($subdomain), "siring") !== false) {
   $subdomain = "Du";
   $person = true;
} elseif (strtolower($subdomain) == "jeg") {
   $person = false;
   $sometimes = true;
} elseif (strtolower($subdomain) == "www" || strtolower($subdomain) == "lyver" || strtolower($subdomain) == "lyver no") {
   $person = false;
} else {
   $person = true;
}
header('Content-Type: text/html; charset=utf-8');

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

 <html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 <title>
 <?php 
 if ($person == true) {
    echo "{$subdomain} lyver!";
 } else {
    echo "Lyver.no";
 }
 ?>
 </title>
 </head>

 <body>
<?php
if ($person == true) {
	echo "<h1>{$subdomain} lyver!</h1>";
} elseif ($sometimes == true) {
	echo "<h1>{$subdomain} lyver litt iblant.. xD<h1>";
} else {
	echo "<h1>Ingen lyver akkurat n&aring;, tror jeg.</h1>";
}
include_once("analyticstracking.php");
?> 
 </body>

 </html>
