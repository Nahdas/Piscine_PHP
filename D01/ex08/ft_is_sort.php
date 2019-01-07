<?php

function ft_is_sort($tab)
{
	$flag = true;
	$clone = $tab;
	sort($clone);
	foreach($clone as $key=>$value)
	{
		if ($value != $tab[$key])
			$flag = false;
	}
	return($flag);
}
