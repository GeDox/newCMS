<?
if(!defined('IN_SITE')) 
	die("Brak dost�pu!");
	
session_destroy();
echo '<meta HTTP-EQUIV="REFRESH" content="0; url=index.php">';

?>