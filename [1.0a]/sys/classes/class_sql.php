<?
class SQL
{
	function Polacz($host, $login, $pass, $db)
	{
		mysql_connect($host, $login, $pass, $db) or die(mysql_error());
		mysql_select_db($db) or die(mysql_error());
	}
	
	function Zapytanie($zapytanie)
	{
		$a = mysql_query($zapytanie) or die(mysql_error());
		$sQL++;
		mysql_query("SET NAMES utf8");
		return $a;
	}
}

?>