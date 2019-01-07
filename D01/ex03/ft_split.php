#!/user/bin/php
<?php

function ft_split($str)
{
	$sep = "/ / ";
	$result = preg_split($sep, $str, -1, PREG_SPLIT_NO_EMPTY);
	if ($result != NULL)
		sort ($result);
	return $result;
}

