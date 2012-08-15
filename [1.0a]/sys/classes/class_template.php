<?php

// by Gh0st

class Template 
{
	var $tmpl;
	var $dane;

	function __construct($name)
	{
		$this->tmpl = implode('', file($name));
		$this->dane = Array();
    }

	function dodaj($name, $value = '')
	{
		if (is_array($name))
			$this->dane = array_merge($this->dane, $name);
		else if (!empty($value))
			$this->dane[$name] = $value;
	}

	function wyswietl() 
	{	
		echo preg_replace('/{([^}]+)}/e', '$this->dane["\\1"]',
		$this->tmpl);
	}
}
?>