#!/usr/bin/php
<?php
function ft_filter($var){
	return ($var !== null && $var !== FALSE && $var !== '');
}

function ft_split($str)
{
	$result = explode(":", $str);
	$result = array_filter($result, 'ft_filter');
	return $result;
}

if ($argc < 3)
	exit();
$sol = $argv[1];

$k = 2;
while ($argv[$k])
{
	$temp=ft_split($argv[$k]);
	foreach($temp as $value)
		$tab[] = $value;
	$k++;
}
foreach($tab as $key=>$value)
{
	if ($value === $sol)
		$pr = $tab[$key + 1];
}
if ($pr)
	echo $pr."\n";

