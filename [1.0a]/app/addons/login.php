<?
if(!defined('IN_SITE')) 
	die("Brak dostępu!");
	
if($_POST['dalej'])
{
	$user = new User;
	
	if($user->SprawdzPoprawnosc($_POST['nick'], $_POST['haslo']))
		$user->Loguj($_POST['nick'], $_POST['haslo']);
}

$this -> dane['title'] = $this -> ustawienia['Title'].' :: Logowanie';
$this -> dane['tresc'] .= '
Witaj w sekcji \'logowanie\'. Wpisz poniżej swoje dane, by się zalogować.<br><br>
<form action="?app=login" method="post">
	<table>
		<tr>
			<td>Nick:</td>
			<td><input type="text" name="nick"/></td>
		</tr>
		<tr>
			<td>Hasło:</td>
			<td><input type="password" name="haslo"/></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="dalej"/></td>
		</tr>
	</table>
	
	Brak konta? <a href="?app=register">Kliknij tutaj, by się zarejestrować.</a>
</form>';
?>