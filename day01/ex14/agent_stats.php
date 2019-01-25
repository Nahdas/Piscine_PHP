#!/usr/bin/php
<?php

function ft_mean($tab)
{
	$count = 0;
	foreach($tab as $row)
	{
		if ($row[1] !== null && $row[2] !== "moulinette" && $row[1] !== "" && is_numeric($row[1]))
		{
			$sum[] = $row[1];
			$count++;
		}
	}
	$tot = array_sum($sum) / $count;
	return $tot;
}

function ft_user_mean($tab, $k)
{
	$user = $tab[$k][0];
	while ($tab[$k][0] === $user)
	{
		if ($tab[$k][1] !== null && $tab[$k][2] !== "moulinette" && $tab[$k][1] != "")
			$sum[] = $tab[$k][1];
		$k++;
	}
	if ($sum && $sum !== null)
	{
		$tot = array_sum($sum) / count($sum);
		echo $user.":".$tot."\n";
	}
	$k--;
	return $k;
}

function ft_spread($tab, $k)
{
	$user = $tab[$k][0];
	$l = $k;
	while ($tab[$l][2] !== "moulinette" && $tab[$l])
		$l++;
	if ($tab[$l][1] !== null)
		$m_score = $tab[$l][1];
	while ($tab[$k][0] === $user)
	{
		if ($tab[$k][1] !== null && $tab[$k][2] !== "moulinette" && $tab[$k][1] != "")
			$sum[] = $tab[$k][1] - $m_score;
		$k++;
	}
	if ($sum && $sum !== null)
	{
		$tot = array_sum($sum) / count($sum);
		echo $user.":".$tot."\n";
	}
	$k--;
	return $k;
}

function ft_split($tab)
{
	$k = 1;
	while ($tab[$k])
	{
		$str = str_replace("\n", "", $tab[$k]);
		$result[] = explode(";", $str);
		$k++;
	}
	return $result;
}

if ($argc !== 2)
	exit();
while (feof(STDIN) != TRUE)
	$tab[] = fgets(STDIN);
sort($tab, SORT_STRING);
$usable = ft_split($tab);

if ($argv[1] === "moyenne")
	exit(ft_mean($usable)."\n");
if ($argv[1] === "moyenne_user")
{
	$k = 1;
	while ($usable[$k])
	{
		$k = ft_user_mean($usable, $k);
		$k++;
	}
	exit();
}
if ($argv[1] === "ecart_moulinette")
{
	$k = 1;
	while ($usable[$k])
	{
		$k = ft_spread($usable, $k);
		$k++;
	}
	exit();
}
exit();

