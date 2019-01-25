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

if ($argc < 2)
	exit();
$j = 1;
$k = 0;
while ($argv[$j] != null)
{
	$my_tab = ft_split($argv[$j]);
	$i = 0;
	foreach ($my_tab as $value)
	{
		$final[$k] = $value;
		$k++;
	}
	$j++;
}

sort($final, SORT_STRING);
$k = 0;

foreach ($final as $value)
	echo $value."\n";

