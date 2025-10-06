<?php

namespace App\Services;

use App\Constants\Ascii;

class FibonacciService
{
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
        // dump($curr);
        $positions = bcmod($curr, "83");
        return (int)$positions;
    }

    public static function decrypt(int $position): int
    {
        $map = Ascii::MAP;
        if ($position <= 0) return 0;
        if ($position === 1) return 1;

        $prev = 0;
        $curr = 1;

        foreach($map as $char){
            dump($char);
        }
        return (int)$curr;
    }
}
