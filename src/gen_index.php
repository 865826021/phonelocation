<?php
$fp = fopen(__dir__ .'/phone.data', 'r');
$idx = fopen(__dir__ . '/phone.idx', 'w');

$position = 0;
while (($line = fgets($fp)) !== false) {	
	$pair = explode(',', $line);	
	$buffer = pack('LL', $pair[1], $position);
	fwrite($idx, $buffer);
	$position += strlen($line);
}


