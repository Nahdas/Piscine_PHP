#!/usr/bin/php
<?php

$funcs = get_defined_functions();

foreach ($funcs['internal'] as $func) {
	$f = new ReflectionFunction($func);
	$line = '';

	$line .= $func . ' ( ';

	$params = '';
	$optional = 0;
	foreach ($f->getParameters() as $param) {
		if ($param->isOptional()) {
			$params .= '[ ';
			$optional++;
		}

		$params .= ($param->isPassedByReference() ? '&' : '')
			. '$' . $param->getName()
			. ', ';
	}

	$line .= substr($params, 0, -2) . str_repeat(' ]', $optional) . " )\n";
	echo $line;
}
