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
include("idna/idna_convert.class.php");
$IDN = new idna_convert();


$fullName = str_replace(".lyver.no","",$_SERVER['HTTP_HOST']);
$fullName = explode(".",$fullName); 
$decodedFullName = array();
foreach ($fullName as $name) {
	$decodedName = $IDN->decode($name);
	array_push($decodedFullName,$name);
}

foreach ($decodedFullName as $name) {
	$returnName .= ucfirst($name) . " ";
}

$var = explode(".",$_SERVER['HTTP_HOST']);
$input = $var[0];
$output = $IDN->decode($input);
$subdomain = ucfirst($output);


if (strtolower($subdomain) == "raymond" || strtolower($subdomain) == "weq") {
   $subdomain = "Du";
   $person = true;
} elseif (strtolower($subdomain) == "far") {
   $subdomain = "Du";
   $person = true;
} elseif (strtolower($subdomain) == "jeg") {
   $person = false;
   $sometimes = true;
} elseif (strtolower($subdomain) == "www" || strtolower($subdomain) == "lyver") {
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
 <title><?php echo "{$subdomain} lyver!"; ?></title>
 </head>

 <body>
<?php
include_once("analyticstracking.php");


if ($person == true) {
	echo "<h1>{$subdomain} lyver!</h1>";
} elseif ($sometimes == true) {
	echo "<h1>{$subdomain} lyver litt iblant.. xD<h1>";
} else {
	echo "<h1>Ingen lyver akkurat n&aring;, tror jeg.</h1>";
}
?> 

<br />
<?php
echo $name;
echo "<br />";
echo $returnName;
?>
 </body>

 </html>
