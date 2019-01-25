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
$my_tab = ft_split($argv[1]);
$i = 1;

foreach ($my_tab as $value)
{
	if ($i != 1)
		echo "$value"." ";
	else
		$last = $value;
	$i++;

}
echo "$last"."\n";

