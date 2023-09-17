<?php

namespace problem;

use ProblemSolver\ProblemResult;

/**
 * @euloer_title Special Pythagorean Triplet
 * @euloer_url https://projecteuler.net/problem=9
 */
class Problem9 implements \ProblemSolver\Problem
{

    public function resolve($value): ProblemResult
    {
        $number = 1;
        while (true) {
            $sum = pow($number, 2) + pow($number + 1, 2);

            if ($sum === $value) {
                break;
            }

            $number++;
        }

        return new ProblemResult([
            $number,
            $number + 1,
            $number + 2,
            $sum
        ]);
    }
}