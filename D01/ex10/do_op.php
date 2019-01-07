#!/usr/bin/php
<?php

function ft_split($str)
{
	$sep = "/ / ";
	$result = preg_split($sep, $str, -1, PREG_SPLIT_NO_EMPTY);
	foreach ($result as $nb)
	{
		if (is_numeric($nb))
			return $nb;
		else if ($nb != " " && $nb != "\t")
			return $nb;
	}
}

if ($argc != 4)
{
	echo "Incorrect Parameters\n";
	exit();
}

$num1 = ft_split($argv[1]);
$op = ft_split($argv[2]);
$num2 = ft_split($argv[3]);

if ($op == "+")
	echo $num1 + $num2."\n";
else if ($op == "-")
	echo $num1 - $num2."\n";
else if ($op == "*")
	echo $num1 * $num2."\n";
else if ($op == "/")
	echo $num1 / $num2."\n";
else if ($op == "%")
	echo $num1 % $num2."\n";

