#!/usr/bin/php
<?php

$x = 0;
while ($x === 0)
{
	echo "Entrez un nombre: ";
	$nbr = trim(fgets(STDIN));
	if (feof(STDIN))
		exit("\n");
	if ((!(is_numeric($nbr))) && $x === 0)
	{
		echo "'$nbr' n'est pas un chiffre\n";
		$x = 1;
	}
	if (($nbr % 2) === 0 && $x === 0)
		echo "Le chiffre $nbr est Pair\n";
	else if ((($nbr % 2) === 1 || ($nbr % 2) === -1) && $x === 0)
		echo "Le chiffre $nbr est Impair\n";
	$x = 0;
}

