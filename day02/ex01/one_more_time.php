#!/usr/bin/php
<?php
function is_valid($str)
{
	$regex = "/(^[a-v]{5,8} [1-3][0-9]|[1-9] [a-v]{3,9} [0-9]{4} \d{2}:\d{2}:\d{2}$)/";
	if (preg_match($regex, $str))
	{
		echo "true"."\n";
		return (true);
	}
	else
	{
		echo "false"."\n";
		return (false);
	}
}

function	ft_day($str)
{
	$reg = "/(^[0-3]\d$)|(^[1-9]$)/";
	if (preg_match($reg, $str) == 1 && $str <= 31)
		return (true);
	return (false);
}

function	ft_months($str)
{
	switch($str){

		case "janvier":
		return 1;

		case "fevrier":
		return 2;

		case "mars":
		return 3;

		case "avril":
		return 4;

		case "mai":
		return 5;

		case "juin":
		return 6;

		case "juillet":
		return 7;

		case "aout":
		return 8;

		case "septembre":
		return 9;

		case "octobre":
		return 10;

		case "novembre":
		return 11;

		case "decembre":
		return 12;
	}
	return 0;
}

function	ft_year($str)
{
	$reg = "/(^[1-9]\d\d\d$)/";
	if (preg_match($reg, $str) == 1 && $str >= 1970)
		return (true);
	return (false);
}

function	ft_time($str)
{
	$reg = "/(^[0-1]\d)|(^2[0-4]):([0-5][0-9]):([0-5][0-9]$)/";
	if (preg_match($reg, $str) == 1)
		return (true);
	return (false);
}

function	ft_test($str)
{
	$tab=explode(" ", $str);
	$day = array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche");
	if (!(in_array($tab[0], $day)))
		return(false);
	if (!(ft_day($tab[1])))
		return(false);
	$mm = ft_months($tab[2]);
	if ($mm === 0)
		return(false);
	if (!(ft_year($tab[3])))
		return(false);
	if (!(ft_time($tab[4])))
		return(false);
	$fin = $mm."/".$tab[1]."/".$tab[3]." ".$tab[4];
	$time = strtotime($fin);
	echo $time."\n";
	return (true);
}

date_default_timezone_set("CET");
if ($argc != 2)
	exit ();
$array = array('é'=>'e', 'û'=>'u');
$str = strtr($argv[1], $array);
$str= strtolower($str);
if (!(ft_test($str)))
	exit ("Wrong Format\n");
