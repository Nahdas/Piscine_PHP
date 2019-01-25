#!/usr/bin/php
<?php

function ft_filter($var){
	return ($var !== null && $var !== FALSE && $var !== '');
}

function ft_split($str)
{
	$result = explode(" ", $str);
	$result = array_filter($result, 'ft_filter');
	return $result;
}

function my_sort($a, $b)
{
	$key = "abcdefghijklmnopqrstuvwxyz0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
	$a = strtolower($a);
	$b = strtolower($b);
//	echo "ARGUMENT1 "."$a","\n";
//	echo "ARGUEMTN2 "."$b","\n";
	$tab = str_split($key);
	$arg1 = str_split($a);
	$arg2 = str_split($b);
	foreach($arg1 as $key1 => $x1)
	{
		foreach($tab as $key => $x)
		{
			 if ($x1 == $x)
				 $i[] = $key;
		}
	}
	foreach($arg2 as $key2 => $x2)
	{
		foreach($tab as $key => $x)
		{
			 if ($x2 == $x)
				 $j[] = $key;
		}
	}
	$k = 0;
	while ($i != null || $j != null)
	{
		if ($i[$k] != $j[$k])
			return ($i[$k] - $j[$k]);
		$k++;
	}
	return 0;
}

if ($argc < 2)
	exit();
$j = 1;
$k = 0;
while ($argv[$j] !== null)
{
	$my_tab = ft_split($argv[$j]);
	foreach ($my_tab as $value)
	{
		$final[$k] = $value;
		$k++;
	}
	$j++;
}
//print_r($final);
usort($final, "my_sort");
//print_r($final);
foreach($final as $x)
	echo "$x"."\n";

