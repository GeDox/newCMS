<?
if(!defined('IN_SITE')) 
	die("Brak dostêpu!");
	
session_destroy();
echo '<meta HTTP-EQUIV="REFRESH" content="0; url=index.php">';

?>