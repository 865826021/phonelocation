<?php

namespace Easthing;

class PhoneLocation 
{
	public static function find($phone) {
		$prefix = substr($phone, 0, 7);
		$idxBuffer = 8;	
		$idxPath = __dir__ . '/phone.idx';
	    $dataPath = __dir__ . '/phone.data';
	    $size = filesize($idxPath);

	    $left = 0;
	    $right = $size / $idxBuffer;
	    $idx = fopen($idxPath, 'r');
	
        while ($left <= $right) {
            $mid = intval(($left + $right) / 2);
            $offset = $mid * $idxBuffer;
            fseek($idx, $offset);
            $buffer = fread($idx, 8);
            $pair = unpack('L2', $buffer);
            $current = $pair[1];
            $dataOffset = $pair[2];

            if ($current > $prefix) {
                $right = $mid - 1;
            } else if ($current < $prefix) {
                $left = $mid + 1;
            } else {
                $data = fopen($dataPath, 'r');
                fseek($data, $dataOffset);
                $line = fgets($data);
                return explode(',', $line);
            }
        }

    	return null;
	}
}
