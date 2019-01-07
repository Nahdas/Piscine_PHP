#!/usr/bin/php
<?php

function ft_split($str)
{
	$sep = "/ / ";
	$result = preg_split($sep, $str, -1, PREG_SPLIT_NO_EMPTY);
	return $result;
}

if ($argc <= 2)
	exit();
$my_tab = ft_split($argv[1]);
$i = 1;

while ($my_tab[$i])
{
	echo "$my_tab[$i]"." ";
	$i++;
}
echo "$my_tab[0]"."\n";

