<?php

namespace problem;

use ProblemSolver\Problem;
use ProblemSolver\ProblemResult;

/**
 * @euloer_title Smallest Multiple
 * @euloer_url https://projecteuler.net/problem=5
 */
class Problem5 implements Problem
{
    public function resolve($value): ProblemResult
    {
        $max = (int)$value;
        $number = 1;
        while (true) {
            if($this->divideWithoutReminded($number, $max)) {
                break;
            }
            $number++;
        }

        return new ProblemResult($number);
    }

    private function divideWithoutReminded($number, $max): bool
    {
        for ($i = 1; $i <= $max; $i++) {
            if($number % $i > 0) {
                return false;
            }
        }

        return true;
    }
}

