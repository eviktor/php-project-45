<?php

namespace BrainGames\GCD;

function calcGCD(int $a, int $b): int
{
    while ($a !== 0 && $b !== 0) {
        if ($a > $b) {
            $a %= $b;
        } else {
            $b %= $a;
        }
    }
    return $a + $b;
}
