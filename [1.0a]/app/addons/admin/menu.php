<?
$query = mysql_query('SELECT * FROM `site_menu` ORDER BY `pozycja` ASC') or die(mysql_error());
mysql_query("SET NAMES utf8");
		
$this -> dane['tresc'] = '<table>';

while($menu = mysql_fetch_array($query))
	$this -> dane['tresc'] .= '<tr><td><a href="'.$menu['link'].'">'.$menu['nazwa'].'</a></td><td><a href="">/\</a></td><td><a href="">\/</a></td><td><a href="">Usuń</a></td></tr>';
	
$this -> dane['tresc'] .= '</table>';
?>