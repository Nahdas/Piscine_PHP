<?php

function ft_is_sort($tab)
{
	$flag = true;
	foreach($tab as $value)
		$origin[] = $value;
	$clone = $origin;
	sort($clone);
	foreach($clone as $key => $value)
	{
		if ($value != $origin[$key])
			$flag = false;
	}
	return($flag);
}
