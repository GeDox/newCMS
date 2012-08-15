<?
class User
{
	public function SprawdzPoprawnosc($nick, $haslo)
	{
		$nick = mysql_real_escape_string(addslashes($nick));
		$haslo = $this -> koduj($nick, mysql_real_escape_string(addslashes($haslo)));
	
		if(!empty($nick) && !empty($haslo))
			return 1;
		
		return 0;
	}
	
	public function Loguj($nick, $haslo)
	{
		$nick = mysql_real_escape_string(addslashes($nick));
		$haslo = $this -> koduj($nick, mysql_real_escape_string(addslashes($haslo)));
		
		$query = mysql_query("SELECT * FROM `site_users` WHERE `nick` = '$nick' AND `password` = '$haslo'") or die(mysql_error());
		
		if(mysql_num_rows($query))
		{
			$data = mysql_fetch_array($query);
				
			$_SESSION['logged'] = true;
			$_SESSION['nick'] = $data['nick'];
			$_SESSION['admin'] = $data['admin'];
				
			echo '<meta HTTP-EQUIV="REFRESH" content="0; url=index.php">';
		}
		
		return 0;
	}
	
	public function Rejestruj($nick, $haslo)
	{
		$nick = mysql_real_escape_string(addslashes($nick));
		$haslo = $this -> koduj($nick, mysql_real_escape_string(addslashes($haslo)));
		
		$query = mysql_query("SELECT 1 FROM `site_users` WHERE `nick` = '$nick'") or die(mysql_error());
		
		if(!mysql_num_rows($query))
		{
			if(!empty($nick) && !empty($haslo))
			{
				$query = mysql_query("INSERT INTO `site_users` (`nick`, `password`, `admin`) VALUES ('$nick', '$haslo', 0);") or die(mysql_error());
				
				$_SESSION['logged'] = true;
				$_SESSION['nick'] = $nick;
				$_SESSION['admin'] = 0;
					
				echo '<meta HTTP-EQUIV="REFRESH" content="0; url=index.php">';
			}
			else
				die('Pola nie mog¹ byæ puste.');
		}
		else
			die('Taki u¿ytkownik ju¿ istnieje.');
	}
	
	public function koduj($nick, $haslo)
	{
		return hash('sha512', $this -> _Nick.$this -> _Haslo.SOL);
	}
}
?>