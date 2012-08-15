<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Instalacja SKLEP DM</title>
	</head>
	
	<body>
<?

switch($_GET['step'])
{
	case 1: // Sprawdzenie PLIK�W
	{
		echo 'Trwa sprawdzanie poprawności plików...<br><br>';
		echo '<b>sys/classes/class_head.php</b> - ';
		if(!file_exists('sys/classes/class_head.php'))
		{
			echo 'Nie istnieje (BŁĄD!)';
			return;
		}
		else
			echo 'Istnieje';
			
		echo '<br><b>sys/classes/class_template.php</b> - ';
		if(!file_exists('sys/classes/class_template.php'))
		{
			echo 'Nie istnieje (BŁĄD!)';
			return;
		}
		else
			echo 'Istnieje';
			
		echo '<br><b>sys/config.php</b> - ';
		if(file_exists('sys/config.php'))
		{
			echo 'Istnieje (BŁĄD!)';
			return;
		}
		else
			echo 'Nie istnieje';
			
		echo '<br><b>app/templates/</b> - ';
		if(!file_exists('app/templates/'))
		{
			echo 'Nie istnieje (BŁĄD!)';
			return;
		}
		else
			echo 'Istnieje';
			
		echo '<br><b>app/addons/</b> - ';
		if(!file_exists('app/addons/'))
		{
			echo 'Nie istnieje (BŁĄD!)';
			return;
		}
		else
			echo 'Istnieje';
		
		echo '<br><br>Sprawdzenie plików gotowe. Zapraszam <a href="?step=2">dalej</a>.';
		break;
	}
	
	case 2: // Pr�ba po��czenia z baz�
	{
		if($_POST['dalej'])
		{
		}
		
		echo 'Wpisz dane, by połączyć się z bazą danych.<br>
		<form action="?step=2" method="POST">
			<table>
				<></>
				<></>
			</table>
		</form>';
			
		break;
	}
	
	case 3: // Podstawowe informacje
	{
		break;
	}
	
	case 4: // Login i has�o admina
	{
		break;
	}
	
	default:
		if(file_exists('sys/config.php'))
			echo 'By zainstalować owy sklep, musisz usunąć plik <b>sys/config.php</b>!';
		else
			echo 'Witaj w instalatorze SAMP-Panel. Kliknij <a href="?step=1">Tutaj</a>, by kontynuować.';
}

?>
	</body>
<html>