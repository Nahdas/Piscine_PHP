#!/usr/bin/php
<?php

if ($argc <= 1)
	exit();
$arg = preg_replace("/ +|\t+/", " ", $argv[1]);
$arg = preg_replace("/ +|\t+/", " ", $arg);
$arg = preg_replace("/^ | $/", "", $arg);
echo $arg."\n";
