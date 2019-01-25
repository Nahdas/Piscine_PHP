#!/usr/bin/php
<?php

function ft_split($str, $a)
{
	$result = str_split($str);
	$plus1 = 0;
	$plus2 = 0;
	$def = 0;
	$k = 0;
	$nb1 = 0;
	$nb2 = 0;
	$pos1 = 1;
	$pos2 = 1;
	$ops = array("+", "-", "*", "/", "%");
	while (($result[$k] === ' ' || $result[$k] === "\t" || $result[$k] == "+") && $plus1 == 0)
	{
		if ($result[$k] == "+")
			$plus1++;
		$k++;
	}
	if ($result[$k] === "-" && $result[$k - 1] != "+")
	{
		$k++;
		$pos1 = -1;
	}
	while (is_numeric($result[$k]))
	{
		$nb1 = $nb1 * 10 + $result[$k];
		$k++;
	}
	$nb1 = $nb1 * $pos1;
	while ($result[$k] === ' ' || $result[$k] === "\t")
		$k++;
	if (in_array($result[$k], $ops))
	{
		$op = $result[$k];
		$k++;
	}
	else
		exit ("Syntax Error\n");
	while ($result[$k])
	{
		while ($result[$k] == " " || $result[$k] == "\t" || ($result[$k] == "+" && $plus2 === 0))
		{
			if ($result[$k] == "+")
				$plus2++;
			$k++;
		}
		if ($result[$k] === "-" && $def === 0 && $result[$k - 1] != "+")
		{
			$pos2 = -1;
			$k++;
		}
		while (is_numeric($result[$k]) && $def === 0)
		{
			$nb2 = $nb2 * 10 + $result[$k];
			$k++;
		}
		if ($def === 0)
		{
			$def = 1;
			$nb2 = $nb2 * $pos2;
		}
		if ($result[$k] && $result[$k] != ' ' && $result[$k] != "\t")
			exit ("Syntax Error\n");
		$k++;
	}
	if ($a == 1)
		return $nb1;
	if ($a == 2)
		return $op;
	if ($a == 3)
		return $nb2;
}

if ($argc != 2)
{
	echo "Incorrect Parameters\n";
	exit();
}

$num1 = ft_split($argv[1], 1);
$op = ft_split($argv[1], 2);
$num2 = ft_split($argv[1], 3);

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

