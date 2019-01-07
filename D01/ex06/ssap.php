#!/usr/bin/php
<?php

function ft_split($str)
{
	$sep = "/ / ";
	$result = preg_split($sep, $str, -1, PREG_SPLIT_NO_EMPTY);
	return $result;
}


if ($argc < 2)
	exit();
$j = 1;
$k = 0;
while ($argv[$j])
{
	$my_tab = ft_split($argv[$j]);
	$i = 0;
	while ($my_tab[$i])
	{
		$final[$k] = $my_tab[$i];
		$i++;
		$k++;
	}
	$j++;
}

sort($final);
$k = 0;

while ($final[$k])
{
	echo"$final[$k]"."\n";
	$k++;
}

