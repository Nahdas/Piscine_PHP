CU#!/usr/bin/php
<?php
if ($argc != 2)
	exit();
$fd = fopen($argv[1], "r") or die("unable to open file!");
$str = fread($fd, filesize($argv[1]));

$regex = "/(<a[^>]*title=['\"])(.*?)(['\"])/s";
$sol = preg_replace_callback(
	$regex, 
	function ($match) {
		return $match[1].strtoupper($match[2]).$match[3];
	}, $str);
$regex = "/(<a.*title=['\"])(.*?)(['\"])/s";
$sol = preg_replace_callback(
	$regex, 
	function ($match) {
		return $match[1].strtoupper($match[2]).$match[3];
	}, $sol);
$regex = "/(<a.*?)(>.*?<)(\/a\>)/s";
$sol = preg_replace_callback(
	$regex, 
	function ($match) {
		$reg = "/(<?[^>]*?)(>.*?<)([^<]*?>?)/s";
		$match[2] = preg_replace_callback($reg,
		function($double){
			return $double[1].strtoupper($double[2]).$double[3];
		}
		,$match[2]);
		return $match[1].$match[2].$match[3];
	}, $sol);
echo $sol;
fclose($fd);
