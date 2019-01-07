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

$i = 0;
$j = 0;
$l = 0;
foreach ($final as $value)
{
	if (ctype_alpha($value))
	{
		$alpha[$i] = $value;
		$i++;
	}
	else if (is_numeric($value))
	{
		$num[$j] = $value;
		$j++;
	}
	else
	{
		$else[$l] = $value;
		$l++;
	}
}
natcasesort($alpha);
foreach($alpha as $x){
	echo "$x"."\n";
}
sort($num, SORT_NUMERIC);
foreach($num as $x){
	echo "$x"."\n";
}
sort($else, SORT_REGULAR);
foreach($else as $x){
	echo "$x"."\n";
}
