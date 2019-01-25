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

if ($argc == 2)
{
	$my_tab = ft_split($argv[1]);
	$i = 1;
	$count = count($my_tab);
	foreach ($my_tab as $value)
	{
		if ($i != $count)
			echo $value." ";
		else
			echo $value;
		$i++;
	}
	echo "\n";
}

