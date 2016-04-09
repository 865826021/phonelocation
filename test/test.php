<?php

require '../src/PhoneLocation.php';

$start = microtime(true);
for ($i = 0; $i < 1000; $i++) {
    $number = '186' . mt_rand(11111111, 99999999);
    $number = '17051130181';
    $location = \Easthing\PhoneLocation::find($number);
    var_dump($location);
}

echo microtime(true) - $start;