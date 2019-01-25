#!/usr/bin/php
<?php

function starts_with ($string, $start)
{
	$len = strlen($start);
	return (substr($string, 0, $len) === $start);
}

if ($argc != 2)
	exit ();
$url = $argv[1];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$str = curl_exec($ch);

$regex= "/<(img.*?src=['\"])(.*?)(['\"])/i";
preg_match_all($regex, $str, $match);
$name[2] = str_replace("/", "-", str_replace("http://", "", str_replace("https://", "", $url)));
$name[2] = preg_replace("/-$/", "", $name[2]);
$url = preg_replace("/\/$/", "", $url);
if ($match[2] && (!is_dir($name[2])))
{
	if (!(mkdir("$name[2]")))
		exit("failed to create directory");
}
foreach($match[2] as $add)
{
	$add = preg_replace("/^\/+/", "", $add);
	if (starts_with ($add, "http://") || starts_with ($add, "https://"))
		$content = @file_get_contents($add);
	else
		$content = @file_get_contents($url."/".$add);
	if ($content)
	{
	$array = explode('/', $add);
	$file = end($array);
	file_put_contents($name[2]."/".$file, $content);
	}
	unset($content);
}
curl_close ($ch);
