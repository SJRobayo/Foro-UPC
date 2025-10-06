<?php

namespace App\Services;

use App\Constants\Ascii;

class FibonacciService
{
    public static $asciiMap = Ascii::class;
    public $map = Ascii::MAP;
    public static function getNumberFromSecuence(int $position): int
    {
        if ($position <= 0) return 0;
        if ($position === 1) return 1;

        $prev = 0;
        $curr = 1;

        for ($i = 2; $i <= $position; $i++) {
            $next = bcadd($prev, $curr);
            $prev = $curr;
            $curr = $next;
        }
        $positions = bcmod($curr, "84");
        return (int)$positions;
    }

    public static function decrypt(String $message)
    {

        $splitted = str_split($message);
        $counter = 0;
        $decryptedArray = [];
        foreach ($splitted as $char) {
            $code = static::$asciiMap::getCode($char);
            $positionsMoved = self::getNumberFromSecuence($counter) % 84;
            $positionsToMove = ($code - $positionsMoved);
            if ($positionsToMove < 0) {
                $positionsToMove = 84 + $positionsToMove;
            }
            $char = Ascii::MAP[$positionsToMove];
            $decryptedArray[] = $char;
            $counter++;
        }
        return implode('', $decryptedArray);
    }
}
