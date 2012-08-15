<?
if(!defined('IN_SITE') || !$_SESSION['admin']) 
	die("Brak dostępu!");

$this -> dane['title'] = $this -> ustawienia['Title'].' :: Panel Administracyjny';
$this -> dane['tresc'] = 'Witaj w Panelu Administracyjnym :)<br><br><a href="?app=admin/menu">Edytuj Menu</a><br><a href="?app=admin/users">Zarządzaj Użytkownikami</a>';
	
?>