#!/usr/bin/php
<?php

function ft_split($str, $a)
{
	$sep = "/ / ";
	$result = str_split($str);
	$k = 0;
	$nb1 = 0;
	$nb2 = 0;
	$ops = array("+", "-", "*", "/", "%");
	while ($result[$k] == ' ' || $result[$k] == "\t")
		$k++;
	while (is_numeric($result[$k]))
	{
		$nb1 = $nb1 + $result[$k];
		$k++;
	}
	while ($result[$k] == ' ' || $result[$k] == "\t")
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
		while ($result[$k] == ' ' || $result[$k] == "\t")
			$k++;
		while (is_numeric($result[$k]))
		{
			$nb2 = $nb2 + $result[$k];
			$k++;
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

