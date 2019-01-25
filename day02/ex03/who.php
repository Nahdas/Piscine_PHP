#!/usr/bin/php
<?php

date_default_timezone_set("CET");

$fd = fopen("/var/run/utmpx","r") or die ("unable to open file!");
$str = file_get_contents("/var/run/utmpx");
$str = substr($str, 1256);

$format = "a256user/a4term/a32tty/Ipid/ilogin/Itime";
while ($str)
{
	$read[] = unpack($format, $str);
	$str = substr($str, 628);
}
sort($read);

foreach ($read as $key => $cell)
{
	if ($cell["login"] === 7)
	{
		$user = $cell["user"];
		$tty = $cell["tty"];
		$date = date("M d H:i", $cell["time"]);
		echo $user."\t ".$tty."  ".$date."\n";
	}
}
