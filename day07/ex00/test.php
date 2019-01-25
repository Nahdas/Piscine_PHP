<?php

class Lannister {
	public function __construct() {
		print("Let's fuck a duck" . PHP_EOL); 
	}
	public function getSize() {
		return "BIG";
	}
	public function houseMotto() {
		return "I'll pay what I owe";
	}
}

include('Tyrion.class.php');

$tyrion = new Tyrion();

print($tyrion->getSize() . PHP_EOL);
print($tyrion->houseMotto() . PHP_EOL);
?>