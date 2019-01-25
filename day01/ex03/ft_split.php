<?php

function ft_filter($var){
	return ($var !== null && $var !== FALSE && $var !== '');
}

function ft_split($str)
{
	$result = explode(" ", $str);
	$result = array_filter($result, 'ft_filter');
	if ($result != null)
		sort ($result, SORT_STRING);
	return $result;
}

