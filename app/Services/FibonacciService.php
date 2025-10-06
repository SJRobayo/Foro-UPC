<?php

namespace App\Services;

class FibonacciService
{
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
        // dd($curr, 'aqui');
        $positions = bcmod($curr, "84"); 
        // dump($positions);
        return (int)$positions;
    }
}
