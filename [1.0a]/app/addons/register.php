<?
if(!defined('IN_SITE')) 
	die("Brak dostępu!");
	
if($_POST['dalej'])
{
	$user = new User;
	
	if($user->SprawdzPoprawnosc($_POST['nick'], $_POST['haslo']))
		$user->Rejestruj($_POST['nick'], $_POST['haslo']);
}

$this -> dane['title'] = $this -> ustawienia['Title'].' :: Rejestracja';
$this -> dane['tresc'] .= '
Witaj w sekcji \'rejestracja\'. Wpisz poniżej swoje dane, by się zarejestrować.<br>Rejestracja wiąże się z dodatkową akceptacją reglaminu.<br>
<form action="?app=register" method="post">
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
</form>';
?>