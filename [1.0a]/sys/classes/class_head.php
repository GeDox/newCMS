<?
if(!defined('IN_SITE')) 
	die("Brak dostępu!");

$SQL;
$sQL = 0;
	
require_once 'class_template.php';
require_once 'class_sql.php';
require_once 'class_user.php';

class CMS
{
	public $dane = array();
	public $ustawienia = array();
	
	public function Start()
	{
		$CMS = new CMS();
		$CMS -> PolaczZBaza();
		$CMS -> WczytajUstawieniaDynamiczne();
		$CMS -> BudujStrone();
		$CMS -> ZakonczBudowe();
	}
	
	public function PolaczZBaza()
	{
		$SQL = new SQL();
		$SQL -> Polacz('127.0.0.1', 'root', '', 'www');
	}
	
	public function WczytajUstawieniaDynamiczne()
	{
		$SQL -> Zapytanie('SELECT * FROM `site_ustawienia');
		
		while($config = mysql_fetch_array($query))
			$this -> ustawienia[$config['nazwa']] = $config['wartosc'];
	}
	
	public function BudujStrone()
	{
		/* Wczytywanie Menu */
		$query = mysql_query('SELECT * FROM `site_menu` ORDER BY `pozycja` ASC') or die(mysql_error());
		mysql_query("SET NAMES utf8");
		
		$this -> dane['menu'] = '<ul>';
		while($menu = mysql_fetch_array($query))
			$this -> dane['menu'] .= '<li><a href="'.$menu['link'].'">'.$menu['nazwa'].'</a></li>';
		$this -> dane['menu'] .= '</ul>';
		
		/* Wczytywanie Treści */
		
		$modul = $_GET['app'];
		
		if(!file_exists('app/addons/'.$modul.'.php'))
			$modul = 'default';
		
		include('app/addons/'.$modul.'.php');
		
		if($_SESSION['logged'])
			$this -> dane['user'] = 'Zalogowano jako '.$_SESSION['nick'].' (<a href="?app=logout">Wyloguj</a>)';
		else
			$this -> dane['user'] = '<a href="?app=login">Kliknij tutaj, by się zalogować!</a>';
			
		/* Wczytywanie Stopki */
		$this -> dane['author'] = 'Wersja silnika: '.SITE_VER.' &copy; GeDox';
		$this -> dane['stats'] = 'Załadowano w <div style="float: left;" id="czas"></div>! SQL: '.$sQL.'.';
	}
	
	public function ZakonczBudowe()
	{
		if(!file_exists('app/templates/'.$this -> ustawienia['Styl']))
			$this -> ustawienia['Styl'] = 'default';
		
		$this -> dane['index'] = 'app/templates/'.$this -> ustawienia['Styl'];
		
		$template = new Template('app/templates/'.$this -> ustawienia['Styl'].'/index.html');
		
		foreach($this -> dane as $name => $value)
			$template -> dodaj($name, $value);
		
		$template -> wyswietl();
	}
}

?>