#!/usr/bin/php
<?php

function ft_split($str)
{
	$sep = "/ / ";
	$result = preg_split($sep, $str, -1, PREG_SPLIT_NO_EMPTY);
	return $result;
}
if ($argc == 2)
{
	$my_tab = ft_split($argv[1]);
	$i = 0;
	while ($my_tab[$i])
	{
		echo "$my_tab[$i]";
		if ($my_tab[$i + 1])
			echo " ";
		$i++;
	}
	echo "\n";
}

