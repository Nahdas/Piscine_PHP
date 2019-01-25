#!/usr/bin/php
<?php
function ft_filter($var){
	return ($var !== null && $var !== FALSE && $var !== '');
}

function ft_split($str)
{	    
	$result = explode(" ", $str);
	$result = array_filter($result, 'ft_filter');
	foreach ($result as $nb)
	{
		if (is_numeric($nb))
			return $nb;
		else if ($nb !== " " && $nb !== "\t")
			return $nb;
	}
}

if ($argc !== 4)
{
	echo "Incorrect Parameters\n";
	exit();
}

$num1 = ft_split($argv[1]);
$op = ft_split($argv[2]);
$num2 = ft_split($argv[3]);

if ($op === "+")
	echo $num1 + $num2."\n";
else if ($op === "-")
	echo $num1 - $num2."\n";
else if ($op === "*")
	echo $num1 * $num2."\n";
else if ($op === "/")
	echo $num1 / $num2."\n";
else if ($op === "%")
	echo $num1 % $num2."\n";

